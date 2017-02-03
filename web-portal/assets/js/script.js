/* Author: Matthias Krijgsman */

var waterstand = 0;
var windkracht = 0;

//  Ophalen en verversen van gegevens uit de database
function updateCycle(){
    getServerStatus();
    getWaterstand();
    getDeur();
    getWeer();
}

//  Het resetten van de tabview (van de weerberichten)
function resetTabView(){
    $(".single-tab").each(function(){
        $(this).removeClass('active');
    });
    $(".weerrapport-menu > li").each(function(){
        $(this).removeClass('active');
    });
}
//  Het ophalen van de server status en het updaten daarvan op de front end
function getServerStatus(){
    $.ajax({
        url: '../../update/getServerStatus.php', success: function(result){
            var x = result.split(',');
            if(x[0] == "OFFLINE"){
                veranderServerStatus(1, false);
            }else{
                veranderServerStatus(1, true);
            }
            if(x[1] == "OFFLINE"){
                veranderServerStatus(2, false);
            }else{
                veranderServerStatus(2, true);
            }
        }});
}

//  Het ophalen van de waterstand en het updaten van de tekst labels
function getWaterstand(){
    $.ajax({
        url: '../../update/getWaterstand.php', success: function(result){

            veranderWaterstand(parseInt(result));

            var w = parseInt(result);
            waterstand = w;
            if(w == 0){
                $("#waterstand-status-text").text("Das pech, water weg");
            }

            if(w > 0){
                $("#waterstand-status-text").text("Zeer Laag");
            }

            if(w > 500){
                $("#waterstand-status-text").text("Laag");
            }

            if(w > 1000){
                $("#waterstand-status-text").text("Normaal");
            }

            if(w > 1500){
                $("#waterstand-status-text").text("Hoog");
            }

            if(w > 2000){
                $("#waterstand-status-text").text("Extreem hoog");
            }

            if(w > 9000){
                $("#waterstand-status-text").text("R.I.P. Nederland");
            }

        }});
}

//  Het ophalen van de deur status en het updaten van de tekst/button
function getDeur(){
    $.ajax({
        url: '../../update/getDeur.php', success: function(result){
            if(result == "OPEN"){
                $("#status-deur").text("Open");
                $("#button-deur").text("Close");
                $('#button-deur').removeClass("button-disabled");
            }
            if(result == "CLOSED"){
                $("#status-deur").text("Closed");
                $("#button-deur").text("Open");
                $('#button-deur').removeClass("button-disabled");
            }
        }});
}

//  Status updaten van de deur
function setDeur(){
    $.ajax({
        url: '../../update/setDeur.php', success: function(result){
            getDeur();
        }});
}

//  De windkracht van de KNMI website scrapen
function getWeer(){
    $.ajax({
        url: '../../update/getWeer.php', success: function(result){
            windkracht = parseFloat(result)*3.6;
            $("#windkracht-status-text").text(windkracht + " (km/u)");
        }});
}

// Veranderen Waterstand in CM:
function veranderWaterstand(cm){
    $("#waterstand").text(parseFloat(cm)/100);
}

// Veranderen front end status server
function veranderServerStatus(server, status){
    if(server == 1){
        if(status){
            $("#serverstatus1").attr('src', '../assets/img/server-on.png');
            $("#server1").text('Server Online');
            $("#server1").addClass('server-on');
            $("#server1").removeClass('server-off');
        }else{
            $("#serverstatus1").attr('src', '../assets/img/server-off.png');
            $("#server1").text('Server Offline');
            $("#server1").addClass('server-off');
            $("#server1").removeClass('server-on');
        }
    }else{
        if(status){
            $("#serverstatus2").attr('src', '../assets/img/server-on.png');
            $("#server2").text('Server Online');
            $("#server2").addClass('server-on');
            $("#server2").removeClass('server-off');
        }else{
            $("#serverstatus2").attr('src', '../assets/img/server-off.png');
            $("#server2").text('Server Offline');
            $("#server2").addClass('server-off');
            $("#server2").removeClass('server-on');
        }
    }
}

/*
 *   Handlen van de inputs
 */
$(document).ready(function(){
    var globalRefresher = setInterval(updateCycle, 3000);
    $(".login-container").css('left', '0');

    $(".weerrapport-menu > li").click(function(){
        resetTabView();
        $(this).addClass('active');
        $(".single-tab[tab='"+$(this).attr('tab')+"']").addClass('active');
    });

    $(".button-close-open").click(function(){
        setDeur();
    });
});