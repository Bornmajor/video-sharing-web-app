<?php
include('../includes/functions.php');

$history_id = $_POST['history_id'];
$history_id = escapeString($history_id);

$query = "DELETE FROM history WHERE history_id = $history_id";
$delete_history = mysqli_query($connection,$query);
checkQuery($delete_history);

?>