<?php
include('../includes/functions.php');



if(isset($_SESSION['usr_id'])){

$usr_id = $_SESSION['usr_id'];   

$username = $_POST['username'];
$username = escapeString($username);

$query = "UPDATE users SET username = '$username' WHERE usr_id = '$usr_id'";
$update_profile = mysqli_query($connection,$query);

checkQuery($update_profile);
if($update_profile){
    SuccessMsg('Profile updated');
}

}

?>