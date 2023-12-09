<?php
include('../includes/functions.php');

?>
<?php
if(isset($_SESSION['usr_id'])){
$usr_id = $_SESSION['usr_id'];

$usr_id = escapeString($usr_id);

$query = "SELECT * FROM saved_videos WHERE usr_id = '$usr_id' ORDER BY saved_id DESC";
$select_saved = mysqli_query($connection,$query); 
checkQuery($select_saved );
while($row = mysqli_fetch_assoc($select_saved)){
   $saved_id = $row['saved_id'];
   $video_id = $row['video_id'];

$query = "SELECT * FROM videos WHERE video_id = '$video_id'";
$select_videos = mysqli_query($connection,$query); 
checkQuery($select_videos);
while($row = mysqli_fetch_assoc($select_videos)){
  $video_id = $row['video_id'];
  $video_url = $row['video_url'];
  $video_title = $row['video_title'];
  $video_desc  = $row['video_desc'];
  $thumbnail = $row['thumbnail'];
  $usr_id = $row['usr_id'];
}   
  ?>

<?php include('../components/video_card.php') ?>

<?php
}
echo emptyTableRowMsg($select_saved,'No saved videos');
}
?>

<script>
    $(document).ready(function(){
        $('.delete_saved').click(function(){
        let saved_id = $(this).attr('saved-id');
       
        $.post('async/delete_saved_videos.php',{saved_id:saved_id},function(){
            loadSavedVideo();

        })
    })


    })//ready
</script>