<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){

$usr_token  = $_POST['usr_token'];
$subscriber_id = $_SESSION['usr_id'];

$$usr_token  = escapeString($usr_token );

$query = "SELECT * FROM users WHERE usr_token = $usr_token ";
$select_usr_token = mysqli_query($connection,$query);
checkQuery($select_usr_token);

while($row = mysqli_fetch_assoc($select_usr_token)){
  $usr_id  = $row['usr_id'];

}

$query = "SELECT * FROM subscribers WHERE usr_subscriber_id = '$subscriber_id' AND usr_channel_id = '$usr_id'";
$check_subscriber = mysqli_query($connection,$query);
checkQuery($check_subscriber);
while($row = mysqli_fetch_assoc($check_subscriber)){
    $db_subscriber_id = $row['usr_subscriber_id'];

}
if(!isset($db_subscriber_id)){

    $query = "INSERT INTO subscribers(usr_subscriber_id,usr_channel_id)VALUES('$subscriber_id','$usr_id')";
    $insert_video = mysqli_query($connection,$query);
    checkQuery($insert_video);



}else{
    $query = "DELETE FROM subscribers WHERE usr_subscriber_id =  '$subscriber_id' AND usr_channel_id =  '$usr_id'";
    $delete_query = mysqli_query($connection,$query);
    checkQuery($delete_query);
}

}else{
    //not login
    failMsg('Login required');

    

}


?>