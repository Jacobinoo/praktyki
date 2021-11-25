<?php
    session_start();
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
        header('Location: index.php');
        exit();
    }
    require_once("constants.php");
    if(isset($_POST['port']) && isset($_POST['action'])) {
        $port_number = $_POST['port']; 
        $action = $_POST['action'];
    } else {
        exit();
    }
    if ($action=="on"){
        gpioToggle($port_number, "1");
    }
    if ($action=="off"){
        gpioToggle($port_number, "0");
    }