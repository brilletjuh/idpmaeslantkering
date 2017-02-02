<?php
/* Author: Matthias Krijgsman */
session_start();
require_once '../sessionController.php';

?>

<html>

<head>
    <title>Maeslantkering - Simulation</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
</head>

<body>
    <div class="card simulation-container">
        <h2 class="simulation-title">Maeslantkering i/o Simulatie</h2>

        <div class="sim-card sim-server">
            <div class="sim-server-title">Server 1</div>
            <div class="sim-server-status-1">Status: Online</div>
            <div class="sim-server-control">
                <button class="sim-server-1-on">Turn On</button>
                <button class="sim-server-1-off">Turn Off</button>
            </div>
        </div>

        <div class="sim-card sim-server">
            <div class="sim-server-title">Server 2</div>
            <div class="sim-server-status-2">Status: Online</div>
            <div class="sim-server-control">
                <button class="sim-server-2-on">Turn On</button>
                <button class="sim-server-2-off">Turn Off</button>
            </div>
        </div>

        <div class="sim-card sim-deur">
            <div class="sim-deur-title">Maeslantkering deur</div>
            <div class="sim-deur-timer">Status:</div>
            <div class="sim-deur-status">Open</div>

        </div>

        <button id="sim-deur-button">
            <img src="../assets/img/glasses.png" class="troll-glasses">
            Noodknop
        </button>

        <div class="sim-card sim-water">
            <div class="sim-water-title">Waterstand Sensor</div>
            <div class="sim-water-stand">Huidige waterstand: 15m</div>
            <input type="range" id="waterstand-slider" min="0" max="3000">
        </div>

    </div>
</body>

<script src="../assets/js/jq.js"></script>
<script src="../assets/js/scriptSim.js"></script>

</html>