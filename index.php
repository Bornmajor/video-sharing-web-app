
<?php
if(isset($_GET['page'])){
    $source = $_GET['page'];

}else{
    $source = '';

}
switch($source){
case 'home';
include('includes/home.php');
break; 
case 'video';
include('includes/video.php');
break;
case 'logout';
include('includes/signout.php');
break;
case 'history';
include('includes/history.php');
break;
case 'later';
include('includes/watch_later.php');
break;
case 'myvideo';
include('includes/myvideos.php');
break;
case 'channel';
include('includes/channel.php');
break;
default:
include('includes/home.php');
}

include('components/modals.php');
?>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


</body>

<?php include('includes/footer.php'); ?>


<!-- <div class="toast_feedback">Please wait...</div> -->




