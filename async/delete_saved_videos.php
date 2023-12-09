<?php
include('../includes/functions.php');

$saved_id = $_POST['saved_id'];
$saved_id = escapeString($saved_id);

$query = "DELETE FROM saved_videos WHERE saved_id = $saved_id";
$delete_saved_video = mysqli_query($connection,$query);
checkQuery($delete_saved_video);

?>