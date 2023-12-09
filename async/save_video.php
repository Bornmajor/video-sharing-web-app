<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){
$video_id= $_POST['video_id'];
$video_id = escapeString($video_id);

$usr_id = $_SESSION['usr_id'];

$query = "SELECT * FROM saved_videos WHERE usr_id = '$usr_id' AND video_id = '$video_id'";
$select_saved_video = mysqli_query($connection,$query);
checkQuery($select_saved_video);
while($row = mysqli_fetch_assoc($select_saved_video)){
    $saved_id = $row['saved_id'];

}
if(!isset($saved_id)){
 $query = "INSERT INTO saved_videos(usr_id,video_id)VALUES('$usr_id','$video_id')";
 $insert_saved_video = mysqli_query($connection,$query);
 checkQuery($insert_saved_video);
}else{
 $query = "DELETE FROM saved_videos WHERE usr_id = '$usr_id' AND video_id = '$video_id'";
 $delete_save = mysqli_query($connection,$query);
 checkQuery($delete_save);
}

}else{
    failMsg('Login required');
}

?>