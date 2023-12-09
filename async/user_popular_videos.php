<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){

$usr_id = $_SESSION['usr_id'];



$query = "SELECT video_id, COUNT(video_id)  FROM login_usr_views  WHERE usr_id = '$usr_id' GROUP BY video_id ORDER BY COUNT(video_id)  DESC LIMIT 6";
$usr_popular = mysqli_query($connection,$query);
checkQuery($usr_popular);

if(mysqli_num_rows($usr_popular) != 0){
echo "<div class='group_video_title'>My playlists</div>";
}


while($row = mysqli_fetch_assoc($usr_popular)){
$usr_pop_videos_id  =  $row['video_id'];

if(isset($usr_pop_videos_id)){

$query = "SELECT *  FROM videos WHERE video_id = '$usr_pop_videos_id'";
$select_usr_popular_videos = mysqli_query($connection,$query);
checkQuery($select_usr_popular_videos);
while($row = mysqli_fetch_assoc($select_usr_popular_videos)){
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



}

}

?>