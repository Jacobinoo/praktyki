<?php
session_start();
if (!isset($_POST['username']) || !isset($_POST['password'])){
    echo "Nieustawione zmienne"; 
    exit();
}

$user = $_POST['username'];
$password = $_POST['password'];

require_once ("connect.php");

MYSQLI_REPORT_STRICT;
try {
    $connection = @new mysqli($database['host'], $database['username'], $database['password'], $database['db_name']);
    if(mysqli_connect_error()) {
        throw new Exception();
    }
    $query = $connection->prepare("SELECT * FROM users WHERE username=?");
    $query->bind_param('s', $user);
    $query->execute();
    $query->store_result();
    $rows = $query->num_rows;

    $query->execute();
    $result = $query->get_result();
    $userData = $result->fetch_assoc();

    if($rows>0) {
        $dbPassword = $userData['password'];
        if(password_verify($password, $dbPassword)) {
            $_SESSION['firstname'] = $userData['firstname'];
            //...

            $_SESSION['logged_in'] = true;
            header('Location: panel.php');
        } else {
            echo "Niepoprawne login lub hasło";
        }
    } else {
        echo "Niepoprawne login lub hasło";
    }
    $connection->close();
}
catch(Exception $e) {
    echo "Błąd łączenia z bazą danych";
}