/* Author: Matthias Krijgsman */

var waterstand = 1500;
var serverStatus = [1, 1];
var doorStatus = 'OPEN';
var updater = setInterval(updateCycle, 3000);
updateCycle();
$(document).ready(function(){
    $("#waterstand-slider").change(function(){
        waterstand = parseInt($(this).val());
        $(".sim-water-stand").text("Huidige waterstand: "+(waterstand/100)+"m");
        $.ajax({
            url: '../../simulation/setWaterstand.php',
            data: {data: waterstand},
            type: "POST"
        });
    });
});

function setDeur(status){
    $.ajax({
        url: '../../simulation/setDeur.php',
        data: {data: status},
        type: "POST"
    });
}

function updateCycle(){

    $.ajax({
        url: '../../simulation/update.php',
        data: {data: serverStatus},
        type: "POST",
        success: function(result){
            doorStatus = result;
        }
    });
    $(".sim-deur-status").text(doorStatus);
}

$(".sim-server-1-on").click(function(){
    serverStatus[0] = 1;
    updateServerLabel();
});

$(".sim-server-1-off").click(function(){
    serverStatus[0] = 0;
    updateServerLabel();
});

$(".sim-server-2-on").click(function(){
    serverStatus[1] = 1;
    updateServerLabel();
});

$(".sim-server-2-off").click(function(){
    serverStatus[1] = 0;
    updateServerLabel();
});

$("#sim-deur-button").click(function(){
    $(".troll-glasses").css('top', '58px');
    setDeur('CLOSED');
    $(".sim-deur-status").text('CLOSED');
});

function updateServerLabel(){
    if(serverStatus[0]){
        $(".sim-server-status-1").text("Status: Online");
    }else{
        $(".sim-server-status-1").text("Status: Offline");
    }

    if(serverStatus[1]){
        $(".sim-server-status-2").text("Status: Online");
    }else{
        $(".sim-server-status-2").text("Status: Offline");
    }
}