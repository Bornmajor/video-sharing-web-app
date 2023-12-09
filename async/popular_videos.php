<?php
include('../includes/functions.php');

echo "<div class='group_video_title'>Popular videos</div>";
$query = "SELECT video_id, COUNT(video_id)  FROM views  GROUP BY video_id ORDER BY COUNT(video_id) DESC LIMIT 6";
$run_query = mysqli_query($connection,$query);
checkQuery($run_query);
while($row = mysqli_fetch_assoc($run_query)){
$pop_videos_id  =  $row['video_id'];


$query = "SELECT *  FROM videos WHERE video_id = '$pop_videos_id'";

$select_popular_videos = mysqli_query($connection,$query);
checkQuery($select_popular_videos);
while($row = mysqli_fetch_assoc($select_popular_videos)){
 $video_id = $row['video_id'];
 $video_title = $row['video_title'];
 $video_desc = $row['video_desc'];
 $cat_id = $row['cat_id'];
 $thumbnail = $row['thumbnail'];
 $usr_id = $row['usr_id'];
 $date_published = $row['date_published'];


}

include('../components/video_card.php');

}






?>
<script>
clearInterval(lazyInterval);
</script>