<?php 

include 'ecomm_connect.php';
$pdo = Database::connect();
session_start();
session_unset();


Database::disconnect();
header('Location: login.php');

?>