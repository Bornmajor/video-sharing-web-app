<?php
include('../includes/functions.php');

$usr_id = $_SESSION['usr_id'];
$the_video_id = $_POST['video_id'];


$the_video_id = escapeString($the_video_id);
$usr_id = escapeString($usr_id);
$query = "SELECT * FROM user_likes WHERE usr_id = '$usr_id' AND video_id = '$the_video_id'";
$select_likes = mysqli_query($connection,$query);
checkQuery($select_likes);
while($row = mysqli_fetch_assoc($select_likes)){
   $likes_id =  $row['likes_id'];

}
if(!isset($likes_id)){

    $query = "INSERT INTO user_likes(usr_id,video_id)VALUES('$usr_id','$the_video_id')";
    $insert_like = mysqli_query($connection,$query);
    checkQuery($insert_like);
    
}else{
    $query = "DELETE FROM user_likes WHERE usr_id = '$usr_id' AND video_id = '$the_video_id'";
    $delete_user_like = mysqli_query($connection,$query);
    checkQuery($delete_user_like);
}
?>