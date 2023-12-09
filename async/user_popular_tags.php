<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){



// echo "<div class='group_video_title'>My playlists</div>";

$query = "SELECT cat_id, COUNT(cat_id)  FROM usr_tags  GROUP BY cat_id ORDER BY COUNT(cat_id) DESC LIMIT 6";
$usr_popular_tags = mysqli_query($connection,$query);
checkQuery($usr_popular_tags);
while($row = mysqli_fetch_assoc($usr_popular_tags)){
$usr_pop_cat_id  =  $row['cat_id'];

if(isset($usr_pop_cat_id)){

$query = "SELECT *  FROM videos WHERE cat_id = $usr_pop_cat_id";
$select_usr_popular_cats = mysqli_query($connection,$query);
checkQuery($select_usr_popular_cats);
while($row = mysqli_fetch_assoc($select_usr_popular_cats)){
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

}//usr_i

?>