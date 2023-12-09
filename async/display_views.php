<?php
include('../includes/functions.php');

$video_id = $_POST['video_id'];
$video_id = escapeString($video_id);


$query =  "SELECT * FROM views WHERE video_id = '$video_id'";
$select_views = mysqli_query($connection,$query);
checkQuery($select_views);

$total_views =  mysqli_num_rows($select_views);

echo $total_views.' views';
?>