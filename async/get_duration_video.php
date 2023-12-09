<?php
include('../includes/functions.php');

$duration = $_POST['duration'];

echo format_time($duration,$f=':'); 
?>