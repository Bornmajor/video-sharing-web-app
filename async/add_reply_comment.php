<?php
include('../includes/functions.php');

$reply = $_POST['reply'];
$comment_id = $_POST['comment_id'];
$usr_token = $_POST['usr_token'];

$reply = escapeString($reply);
$comment_id = escapeString($comment_id);
$usr_token = escapeString($usr_token);

$query = "SELECT * FROM users WHERE usr_token = $usr_token";
$select_usr_id = mysqli_query($connection,$query);
checkQuery($select_usr_id);

while($row = mysqli_fetch_assoc($select_usr_id)){
  $usr_id = $row['usr_id'];

}
$reply_time = time();

$query = "INSERT INTO reply_comments(comment_id,reply,usr_id,reply_time)VALUES('$comment_id','$reply','$usr_id','$reply_time')"; 
$insert_reply = mysqli_query($connection,$query);
checkQuery($insert_reply);


?>