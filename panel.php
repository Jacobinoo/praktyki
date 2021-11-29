<?php
    session_start();
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inteligentny Dom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="scripts.js" defer></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body>
        <div class="nav">
            <div class="logo">Inteligentny Dom</div>
            <div class="separator"></div>
            <div class="links">
                <a href="panel.php" class="link">Panel</a>
                <a href="raspberry.php" class="link">Raspberry</a>
                <a href="logout.php" class="link">Wyloguj się</a>
            </div>
        </div>
        <div class="devicesParent">
            <span class="devicesTitle">Akcesoria</span>
            <div class="devices">
                <div class="block" id="light1" data-status="off">
                    <div class="block_icon_div"><span class="material-icons" id="icon" style="font-size: 30px;">lightbulb</span></div>
                    <div class="block_name">Lampka czerwona</div>
                    <div class="block_status" id="status">Wył.</div>
                </div>
                <div class="block" id="light2" data-status="off">
                    <div class="block_icon_div"><span class="material-icons" id="icon" style="font-size: 30px;">lightbulb</span></div>
                    <div class="block_name">Lampka niebieska</div>
                    <div class="block_status" id="status">Wył.</div>
                </div>
                <div id="cam1" class="block" data-status="off">
                    <div class="block_icon_div"><span class="material-icons" id="icon" style="font-size: 30px;">photo_camera</span></div>
                    <div class="block_name" id="name">Kamera</div>
                    <div class="block_status" id="status">Ukryte</div>
                </div>
            </div>
        </div>

            <!--<div class="panel">
            <input type="number" class="input" id="port" placeholder="Wpisz numer portu"><br>
            <div class="buttonParent">
                <button id="on" class="button">On</button>
                <button id="off" class="button">Off</button>
            </div>
            17-czerwona, 14 niebieska
            </div>
            <div class="panel"><img class="camera" id="camera" src="http://192.168.111.5:5000/video_feed"></div>
        </div>-->
    </body>
</html>