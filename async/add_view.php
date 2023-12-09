<?php
include('../includes/functions.php');

$video_id = $_POST['video_id'];
$video_id = escapeString($video_id);

$query = "INSERT INTO views(video_id)VALUES('$video_id')";
$insert_view = mysqli_query($connection,$query);
checkQuery($insert_view);

if(isset($_SESSION['usr_id'])){
$usr_id = $_SESSION['usr_id'];

//add login usr views(most videos watched by usr)
$query = "INSERT INTO login_usr_views(video_id,usr_id)VALUES('$video_id','$usr_id')";
$insert_login_view = mysqli_query($connection,$query);
checkQuery($insert_login_view);


//tags user is mostly interested
$cat_id = getCategory($video_id);

$query = "INSERT INTO usr_tags(video_id,usr_id,cat_id)VALUES('$video_id','$usr_id',$cat_id)";
$insert_usr_tag = mysqli_query($connection,$query);
checkQuery($insert_usr_tag);




}

//redirecting
echo "<script type='text/javascript'>
clearInterval(timerInterval);
</script>";


?>