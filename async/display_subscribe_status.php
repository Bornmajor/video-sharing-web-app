<?php
include('../includes/functions.php');



$usr_token = $_POST['usr_token'];
$subscriber_id = $_SESSION['usr_id'];

$usr_token = escapeString($usr_token);

$query = "SELECT * FROM users WHERE usr_token = $usr_token";
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
?>
<a  class='btn btn-primary subscribe_video' title='Click to subscribe'> <i class="fas fa-bell"></i> Subscribe</a>
<?php
}else{
?>
<a  class='btn btn-primary subscribe_video' title='Your already subscribed'> <i class="fas fa-check"></i> Subscribed</a>
<?php
}
?>
<!-- <a  class='btn btn-primary subscribe_video'> <i class="fas fa-bell"></i> Subscribe</a> -->
<?php




?>


<script>
    $('.subscribe_video').click(function(){
        // alert();
        let usr_token  = '<?php echo $usr_token; ?>';

        $.post('async/add_subscriber.php',{usr_token:usr_token},function(data){

            $('.load_subscribe_status').html(data);

            const loadSubscribeTimeout = setTimeout(loadSubscribeStatus,500);
            
            // setTimeout(() => {
              
            // },1);
              
        })


    })
</script>