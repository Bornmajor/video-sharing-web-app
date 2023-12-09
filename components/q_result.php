<?php
if(isset($_GET['q'])){

$q = $_GET['q'];

$q = escapeString($q);
$query = "SELECT * FROM videos WHERE video_title = '$q'"; 
$select_q_videos = mysqli_query($connection,$query); 
checkQuery($select_q_videos );
while($row = mysqli_fetch_assoc($select_q_videos )){
$video_id = $row['video_id'];
$video_url = $row['video_url'];
$video_title = $row['video_title'];
$video_desc  = $row['video_desc'];
$thumbnail = $row['thumbnail'];
$usr_id = $row['usr_id'];
$date_published = $row['date_published'];

include('components/video_card.php');
  
}
echo emptyTableRowMsg($select_q_videos ,'No results');
  echo "<hr>";
}
?>