/* Author: Matthias Krijgsman */


$(document).ready(function(){
    $(".login-container").css('left', '0');
});

$(".weerrapport-menu > li").click(function(){
    resetTabView();
    $(this).addClass('active');
    $(".single-tab[tab='"+$(this).attr('tab')+"']").addClass('active');
});

function resetTabView(){
    $(".single-tab").each(function(){
        $(this).removeClass('active');
    });
    $(".weerrapport-menu > li").each(function(){
        $(this).removeClass('active');
    });
}


// Veranderen Waterstand in CM:
function veranderWaterstand(cm){
    $("#waterstand").text(parseFloat(cm)/100);
}

// Veranderen Status Server
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
