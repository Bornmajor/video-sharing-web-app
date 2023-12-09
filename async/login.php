<?php
include('../includes/functions.php');

$usr_mail = $_POST['usr_mail'];
$pwd = $_POST['pwd'];

$usr_mail = escapeString($usr_mail);
$pwd = escapeString($pwd);

$query = "SELECT * FROM users WHERE usr_mail = '$usr_mail'";
$select_usr = mysqli_query($connection,$query);
checkQuery($select_usr);

while($row = mysqli_fetch_assoc($select_usr)){
$db_usr_id = $row['usr_id'];
$db_usr_mail = $row['usr_mail'];
$db_pwd =  $row['pwd'];

}
if(!isset($db_usr_mail)){
    failMsg('Email not available!!');
}else{

if(password_verify($pwd,$db_pwd)){
successMsg('Login successfully!!');
successMsg('Redirecting home...');
getUserSession($db_usr_id);   

//redirecting
echo "<script type='text/javascript'>
window.setTimeout(function() {
window.location = '?page=home';
}, 2000);
</script>";


}else{
failMsg('Verification failed!!');
}
}
?>