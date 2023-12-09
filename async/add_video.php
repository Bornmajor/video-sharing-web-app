<?php
include('../includes/functions.php');

if(!isset($_SESSION['usr_id'])){
failMsg('Login to add video');
//redirecting
echo "<script type='text/javascript'>
window.setTimeout(function() {
window.location = '?page=home';
}, 2000);
</script>";
}else{


$usr_id = $_SESSION['usr_id'];

$video_id = $_POST['video_id'];
$img_link = $_POST['img_link'];
$video_title = $_POST['video_title'];
$video_desc = $_POST['video_desc'];
$cat_id = $_POST['cat_id'];
$date_published = time();

$img_link = escapeString($img_link);
$video_title = escapeString($video_title);
$video_desc = escapeString($video_desc);
$cat_id = escapeString($cat_id);

$query = "UPDATE videos SET usr_id = '$usr_id',video_title = '$video_title', video_desc = '$video_desc', cat_id = $cat_id ,thumbnail = '$img_link', date_published = '$date_published' WHERE video_id = '$video_id' ";
$update_video = mysqli_query($connection,$query);

if($update_video){
    successMsg('Video is now live!!');
}

}
?>