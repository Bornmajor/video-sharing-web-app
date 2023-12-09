<?php
include('../includes/functions.php');

$the_video_id = $_POST['video_id'];
$video_title = $_POST['video_title'];
$video_desc = $_POST['video_desc'];
$cat_id = $_POST['cat_id'];

$the_video_id = escapeString($the_video_id);
$video_title = escapeString($video_title);
$video_desc = escapeString($video_desc);
$cat_id = escapeString($cat_id);

$query = "UPDATE videos SET video_title = '$video_title',video_desc = '$video_desc',cat_id = $cat_id WHERE video_id = '$the_video_id'";
$update_video = mysqli_query($connection,$query);
checkQuery($update_video);
if($update_video){
    successMsg('Video content updated!!');
}
?>