<?php
$connection = mysqli_connect("localhost","root","","sharetube");

//connection check
if($connection === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
ob_start(); 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
error_reporting(0);
?>