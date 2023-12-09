<?php
session_start();
$_SESSION['usr_id'] = null;

header("location: ?page=home");
?>