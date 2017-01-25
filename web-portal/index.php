<?php
/* Author: Matthias Krijgsman */
require_once 'config.php';
require_once 'sessionController.php';

?>

<html>

    <head>
        <title>Maeslantkering - Web Portaal</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body class="login-wallpaper">
        <div class="login-container">
            <form action="#" method="post" >
                <ul class="login-elements">
                    <li class="logo">Maeslantkering <label>Webportaal</label></li>
                    <li><label>Gebruikersnaam:</label></li>
                    <li><input type="text" name="username" required></li>
                    <li><label>Wachtwoord:</label></li>
                    <li><input type="password" name="password" required></li>
                    <li><div class="login-warning">Gegevens zijn incorrect</div></li>
                    <li><button type="submit">Login</button></li>
                </ul>
            </form>
        </div>
    </body>

    <script src="assets/js/jq.js"></script>
    <script src="assets/js/script.js"></script>

</html>