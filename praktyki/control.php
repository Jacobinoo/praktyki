<?php
    require_once("constants.php");
    if(isset($_POST['port']) && isset($_POST['action'])) {
        $port_number = $_POST['port']; 
        $action = $_POST['action'];
    } else {
        exit();
    }
    if($port_number !== "14") {
        exit();
    }
    if ($action=="on"){
        gpioToggle($port_number, "1");
    }
    if ($action=="off"){
        gpioToggle($port_number, "0");
    }