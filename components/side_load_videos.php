<?php
$query = "SELECT * FROM videos ORDER BY RAND()";
$select_videos = mysqli_query($connection,$query); 
checkQuery($select_videos);
while($row = mysqli_fetch_assoc($select_videos)){
  $video_id = $row['video_id'];
  $video_url = $row['video_url'];
  $video_title = $row['video_title'];
  $video_desc  = $row['video_desc'];
  $thumbnail = $row['thumbnail'];
  $usr_id = $row['usr_id'];
  ?>
  
  <?php include('video_card.php'); ?>

<?php
}
?>






