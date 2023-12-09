<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){


$video_id = $_POST['video_id'];

$query = "SELECT * FROM user_likes WHERE video_id = '$video_id'";
$select_likes = mysqli_query($connection,$query);
checkQuery($select_likes);
$total_likes = mysqli_num_rows($select_likes);
?>
 <span class='interaction_icon like-video' video-id='<?php echo $video_id?>'  title='like'> <i onclick='toggleLikes();'   class="fas fa-thumbs-up "></i> <?php echo $total_likes?> </span>
  <?php
  }
  ?>

<script>
  $(document).ready(function(){
    $('.like-video').click(function(){
        $().toggle();
        let video_id = $(this).attr('video-id');


        $.post('async/add_likes.php',{video_id:video_id},function(data){
            loadLikes();

        })


    })
    
  


  })//ready




</script>
 