
<?php

if(isset($_GET['tag'])){
$tag = $_GET['tag'];

$tag = escapeString($tag);
$query = "SELECT * FROM videos WHERE cat_id = $tag ORDER BY RAND()";  
$select_tags_videos = mysqli_query($connection,$query); 
checkQuery($select_tags_videos);

if(mysqli_num_rows($select_tags_videos) != 0){
 $title_grp = getCatTitle($tag);
 echo "<div class='group_video_title'>$title_grp</div>";
}

while($row = mysqli_fetch_assoc($select_tags_videos)){
$video_id = $row['video_id'];
$video_url = $row['video_url'];
$video_title = $row['video_title'];
$video_desc  = $row['video_desc'];
$thumbnail = $row['thumbnail'];
$usr_id = $row['usr_id'];
$date_published = $row['date_published'];

include('components/video_card.php');
  
}
// echo emptyTableRowMsg($select_tags_videos ,'No results');
  echo "<hr>";

}


 



?>