<?php
/* Author: Matthias Krijgsman */
session_start();
require_once '../sessionController.php';

if($_GET['a'] == 'logout'){
    $sessionController->logout();
    header("Location: ../");
}

//  Checken of de gebruiker ingelogd is
if(!$sessionController->checkAuthorization()){
    header("Location: ../");
}

?>

<html>

<head>
    <title>Maeslantkering - Web Portaal</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
</head>

<body class="dashboard">


    <div class="dashboard-container">

        <div class="card card-small">
            <div class="card-title">Server 1 status</div>
            <img id="serverstatus1" src="../assets/img/server-off.png" class="server-icon">
            <label id="server1" class="server-status server-off">Loading...</label>
        </div>

        <div class="card card-small">
            <div class="card-title">Server 2 status</div>
            <img id="serverstatus2" src="../assets/img/server-off.png" class="server-icon">
            <label id="server2" class="server-status server-off">Loading...</label>
        </div>

        <div class="card card-medium">
            <div class="card-title">Sensor 1 status</div>
            <div class="waterstand-container">WATERSTAND: <label id="waterstand">xx.xx</label><label> meter</label></div>
        </div>

        <div class="card card-small buienradar">
            <div class="card-title">Weerrapporten</div>
            <ul class="weerrapport-menu">
                <li tab="0" class="active">Windsnelheid</li>
                <li tab="1">Windkracht</li>
                <li tab="2">Windstoten</li>
                <li tab="3">Zicht</li>
                <li tab="4">Buienradar</li>
                <li tab="5">Temperatuur</li>
                <li tab="6">Gevoelstemperatuur</li>
            </ul>
        </div>

        <div class="card card-medium buienradar">
            <div class="card-title">Weerrapport</div>
            <div class="weerrapport-container">
                <div class="single-tab active" tab="0"><img src="http://cdn.knmi.nl/knmi/map/page/weer/actueel-weer/windsnelheid.png"></div>
                <div class="single-tab" tab="1"><img src="http://cdn.knmi.nl/knmi/map/page/weer/actueel-weer/windkracht.png"></div>
                <div class="single-tab" tab="2"><img src="http://cdn.knmi.nl/knmi/map/page/weer/actueel-weer/maxwindkm.png"></div>
                <div class="single-tab" tab="3"><img src="http://cdn.knmi.nl/knmi/map/page/weer/actueel-weer/zicht.png"></div>
                <div class="single-tab" tab="4"><iframe class="buienradar-info" SRC="http://api.buienradar.nl/image/1.0/RadarMapNL?w=460&h=502" NORESIZE SCROLLING=NO HSPACE=0 VSPACE=0 FRAMEBORDER=0 MARGINHEIGHT=0 MARGINWIDTH=0 WIDTH=460 HEIGHT=502></iframe></div>
                <div class="single-tab" tab="5"><img src="http://cdn.knmi.nl/knmi/map/page/weer/actueel-weer/temperatuur.png"></div>
                <div class="single-tab" tab="6"><img src="http://cdn.knmi.nl/knmi/map/page/weer/actueel-weer/gevoelstemperatuur.png"></div>
            </div>
        </div>

        <div class="card card-small buienradar">
            <div class="card-title">Informatie</div>
            <ul class="informatie-lijst">
                <li class="text-center"><a href="?a=logout" class="informatie-uitloggen">Uitloggen<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                <li><label>Status deuren:</label></li>
                <li><div class="informatie-status" id="status-deur">Loading...</div></li>
                <li><label>Windkracht:</label></li>
                <li><div class="informatie-status" id="windkracht-status-text">Loading...</div></li>
                <li><label>Waterstand:</label></li>
                <li><div class="informatie-status" id="waterstand-status-text">Loading...</div></li>
                <li style="margin-top: 40px;"><label>Handmatig Sluiten:</label></li>
                <li><div class="button-close-open" id="button-deur">Close</div></li>
            </ul>
        </div>



    </div>
</body>

<script src="../assets/js/jq.js"></script>
<script src="../assets/js/script.js"></script>

</html>