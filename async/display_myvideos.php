<?php
include('../includes/functions.php');
require '../vendor/autoload.php';
use Vimeo\Vimeo;

$client_id = "d1ba848b282e8a111fd3e73197ef13165113c39e";
$client_secrets = "2suMWGZWEgMmbczL+0RQdhmIsNgpX7tQyDhmjeqDCoVnIzdpSSexBeKNeWzDTXFb7qhGKpe9vL7JPmsKX2JlovMd3nQ7BSPCobtXULTe6i0v68PcUEkpl4ZY5mCvRxCf";
$access_token = "54a0b59aa7921ddb850d0faba191d369";
$client = new Vimeo($client_id,$client_secrets,$access_token);

?>
<?php
$usr_id = $_SESSION['usr_id'];
$query = "SELECT * FROM videos WHERE usr_id = '$usr_id'";
$select_videos = mysqli_query($connection,$query); 
checkQuery($select_videos);
while($row = mysqli_fetch_assoc($select_videos)){
  $video_id = $row['video_id'];
  $video_url = $row['video_url'];
  $video_title = $row['video_title'];
  $video_desc  = $row['video_desc'];
  $thumbnail = $row['thumbnail'];
  $usr_id = $row['usr_id'];
  $date_published =$row['date_published'];
  ?>
 
 <?php include('../components/video_card.php') ?>


  <?php
}
?>
<script>
    $('.delete_video').click(function(){
      let video_id = $(this).attr('video-id');
      let del_url = $(this).attr('video-url');

      //  alert(del_url);
        if (confirm('Are you sure you want to delete this?')) {
     
      
          $.ajax({
            url:'https://api.vimeo.com/videos/'+del_url,
            type:'DELETE',
            headers:{
              accept:'application/vnd.vimeo.*+json;version=3.0',
              authorization: 'Bearer fc4b21c65db8500ae6c48a9a15933948',
            },
            success:function(data){
              //  console.log('Ok');
            }
          })

          $.post('async/delete_video.php',{video_id:video_id},function(data){           
              loadMyVidoes();
            });

        }
    })

    $('.edit_video').click(function(){
      let video_id = $(this).attr('video-id');

      $.post('async/display_update_video_form.php',{video_id:video_id},function(data){
        $('.load_edit_video').html(data);
      })

    })

</script>