<?php 
include('../includes/functions.php');

$usr_id = $_SESSION['usr_id'];
$the_comment_id = $_POST['comment_id'];


$the_comment_id= escapeString($the_comment_id);
$usr_id = escapeString($usr_id);

$query = "SELECT * FROM like_comments WHERE usr_id = '$usr_id' AND comment_id = '$the_comment_id'";
$select_comments_likes = mysqli_query($connection,$query);
checkQuery($select_comments_likes);
while($row = mysqli_fetch_assoc($select_comments_likes)){
   $likes_comment_id =  $row['like_comment_id'];

}
if(!isset($likes_comment_id)){

    $query = "INSERT INTO like_comments(usr_id,comment_id)VALUES('$usr_id','$the_comment_id')";
    $insert_like = mysqli_query($connection,$query);
    checkQuery($insert_like);
    
}else{
    $query = "DELETE FROM like_comments WHERE usr_id = '$usr_id' AND comment_id = '$the_comment_id'";
    $delete_comment_like = mysqli_query($connection,$query);
    checkQuery($delete_comment_like);
}

?>