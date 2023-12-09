<?php
include('../includes/functions.php');

$usr_id = $_POST['usr_id'];
$pwd = $_POST['pwd'];

$usr_id = escapeString($usr_id);
$pwd = escapeString($pwd);

// password encryption
$pwd = password_hash($pwd,PASSWORD_BCRYPT,array('cost' => 12));

$query = "UPDATE users SET pwd = '$pwd' WHERE usr_id =  '$usr_id'";
$add_pwd = mysqli_query($connection,$query);
checkQuery($add_pwd);

if($add_pwd){
  successMsg('Account setup successfully!!');
  successMsg('Logging in...');

  getUserSession($usr_id);

//redirecting
echo "<script type='text/javascript'>
window.setTimeout(function() {
    window.location = '?page=home';
}, 2000);
</script>";


}

?>