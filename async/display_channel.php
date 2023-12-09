<?php
include('../includes/functions.php');


?>
<?php
$usr_token = $_POST['usr_token'];

$query = "SELECT * FROM users WHERE usr_token = $usr_token";
$select_token = mysqli_query($connection,$query);
checkQuery($select_token);
while($row = mysqli_fetch_assoc($select_token)){
   $channel_id = $row['usr_id'];

}
$query = "SELECT * FROM videos WHERE usr_id = '$channel_id'";
$select_videos = mysqli_query($connection,$query); 
checkQuery($select_videos);
while($row = mysqli_fetch_assoc($select_videos)){
  $video_id = $row['video_id'];
  $video_url = $row['video_url'];
  $video_title = $row['video_title'];
  $video_desc  = $row['video_desc'];
  $thumbnail = $row['thumbnail'];
  $usr_id = $row['usr_id'];
  $date_published =$row['date_published'];
  ?>
 
 <?php include('../components/video_card.php') ?>


  <?php
}
?>
