<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){

$usr_id = $_SESSION['usr_id'];
$the_video_id = $_POST['video_id'];
$comment =$_POST['comment'];

$the_video_id = escapeString($the_video_id);
$usr_id = escapeString($usr_id);
$comment = escapeString($comment);

$comment_time = time();


$query = "INSERT INTO comments(usr_id,video_id,comment,comment_time)VALUES('$usr_id','$the_video_id','$comment','$comment_time')";
$insert_comment = mysqli_query($connection,$query);

checkQuery($insert_comment);


}else{
    failMsg('Login required');
     
//redirecting
echo "<script type='text/javascript'>
window.setTimeout(function() {
    window.location = '?page=login';
}, 2000);
</script>";


}

?>