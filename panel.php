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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body id="panel">
        <div class="nav">
            <div class="logo">Dom</div>
            <div class="separator"></div>
            <div class="links">
                <a href="panel.php" class="link">Panel</a>
                <a href="raspberry.php" class="link">Raspberry</a>
                <a href="logout.php" class="link">Wyloguj się</a>
            </div>
            <div class="account"><span class="material-icons" style="    font-size: 32px">account_circle</span></div>
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
                <div class="block" id="esp1" data-status="off">
                    <div class="block_icon_div"><span class="material-icons" id="icon" style="font-size: 30px;">flash_on</span></div>
                    <div class="block_name">ESP - dioda</div>
                    <div class="block_status" id="status">Wył.</div>
                </div>
                <div class="block" id="buzz1" data-status="off">
                    <div class="block_icon_div"><span class="material-icons" id="icon" style="font-size: 30px;">volume_up</span></div>
                    <div class="block_name">Głośniczek</div>
                    <div class="block_status" id="status">Wył.</div>
                </div>
            </div>
        </div>
        <div class="devicesParent">
            <span class="devicesTitle">Kamery</span>
            <div class="devices cameras">
            </div>
        </div>
    </body>
    <script>
$(document).ready(function () {
    $("#light1").click(function () {
        if($(this).attr("data-status") == "off") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "17",
                        action: "on"
                }
            });
        }
        if($(this).attr("data-status") == "on") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "17",
                        action: "off"
                }
            });
        }
        if($(this).attr("data-status") == "off") {
            $("#light1").attr("data-status", "on");
            $('#light1 #status').text("Wł.");
            $('#light1 #icon').css("color", "rgb(235, 181, 3)")
        } else {
            $("#light1").attr("data-status", "off");
            $('#light1 #status').text("Wył.");
            $('#light1 #icon').css("color", "rgb(170, 170, 170)")
        }
    });
    $("#light2").click(function () {
        if($(this).attr("data-status") == "off") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "14",
                        action: "on"
                }
            });
        }
        if($(this).attr("data-status") == "on") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "14",
                        action: "off"
                }
            });
        }
        if($(this).attr("data-status") == "off") {
            $("#light2").attr("data-status", "on");
            $('#light2 #status').text("Wł.");
            $('#light2 #icon').css("color", "rgb(235, 181, 3)")
        } else {
            $("#light2").attr("data-status", "off");
            $('#light2 #status').text("Wył.");
            $('#light2 #icon').css("color", "rgb(170, 170, 170)")
        }
    });
    $("#buzz1").click(function () {
        if($(this).attr("data-status") == "off") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "16",
                        action: "on"
                }
            });
        }
        if($(this).attr("data-status") == "on") {
            $.ajax({
                type: "POST",
                url: "control.php",
                dataType: "json",
                data: {port: "16",
                        action: "off"
                }
            });
        }
        if($(this).attr("data-status") == "off") {
            $("#buzz1").attr("data-status", "on");
            $('#buzz1 #status').text("Wł.");
            $('#buzz1 #icon').css("color", "rgb(66, 135, 245)")
        } else {
            $("#buzz1").attr("data-status", "off");
            $('#buzz1 #status').text("Wył.");
            $('#buzz1 #icon').css("color", "rgb(170, 170, 170)")
        }
    });
    $("#esp1").click(function () {
        if($(this).attr("data-status") == "off") {
            $.ajax({
                url: "http://192.168.111.28/LED=ON"
            });
        }
        if($(this).attr("data-status") == "on") {
            $.ajax({
                url: "http://192.168.111.28/LED=OFF"
            });
        }
        if($(this).attr("data-status") == "off") {
            $("#esp1").attr("data-status", "on");
            $('#esp1 #status').text("Wł.");
            $('#esp1 #icon').css("color", "rgb(235, 181, 3)")
        } else {
            $("#esp1").attr("data-status", "off");
            $('#esp1 #status').text("Wył.");
            $('#esp1 #icon').css("color", "rgb(170, 170, 170)")
        }
    });
    //Kamery
    $(".cameras").append("<a target='_blank' href='http://<?=$_SERVER['SERVER_ADDR']?>:5000'><img class='camera_block' src='http://<?=$_SERVER['SERVER_ADDR']?>:5000/video_feed'></a>");
});
</script>
</html>