<?php  
include('../includes/functions.php');


$video_id  = $_POST['video_id'];
$video_id = escapeString($video_id);

$usr_id = $_SESSION['usr_id'];
$usr_id = escapeString($usr_id);

//delete from other tables
//views
$query = "DELETE FROM views WHERE video_id = '$video_id'";
$delete_views = mysqli_query($connection,$query);
checkQuery($delete_views);

//usr_tags
$query = "DELETE FROM usr_tags WHERE video_id = '$video_id'";
$delete_tags = mysqli_query($connection,$query);
checkQuery($delete_tags);

//user_likes
$query = "DELETE FROM user_likes WHERE video_id = '$video_id'";
$delete_user_likes = mysqli_query($connection,$query);
checkQuery($delete_user_likes);

//saved_videos
$query = "DELETE FROM saved_videos WHERE video_id = '$video_id'";
$delete_saved_videos = mysqli_query($connection,$query);
checkQuery($delete_saved_videos);

//login_usr_views
$query = "DELETE FROM login_usr_views WHERE video_id = '$video_id'";
$delete_login_usr_views = mysqli_query($connection,$query);
checkQuery($delete_login_usr_views);

//history
$query = "DELETE FROM history WHERE video_id = '$video_id'";
$delete_history = mysqli_query($connection,$query);
checkQuery($delete_history);

//comments
$query = "DELETE FROM comments WHERE video_id = '$video_id'";
$delete_comments = mysqli_query($connection,$query);
checkQuery($delete_comments);



//final delete of video
$query = "DELETE FROM videos WHERE video_id = '$video_id' AND usr_id = '$usr_id'";
$delete_video = mysqli_query($connection,$query);
checkQuery($delete_video);

?>