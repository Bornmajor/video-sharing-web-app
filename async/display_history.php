<?php
include('../includes/functions.php');

?>
<?php
if(isset($_SESSION['usr_id'])){
$usr_id = $_SESSION['usr_id'];

$usr_id = escapeString($usr_id);

$query = "SELECT * FROM history WHERE usr_id = '$usr_id' ORDER BY history_id DESC";
$select_history = mysqli_query($connection,$query); 
checkQuery($select_history);
while($row = mysqli_fetch_assoc($select_history)){
   $history_id = $row['history_id'];
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
  $date_published =$row['date_published'];
}   
  ?>

<?php include('../components/video_card.php') ?>

<?php
}
echo emptyTableRowMsg($select_history,'No watched videos');
}
?>

<script>
    $(document).ready(function(){
        $('.delete_history').click(function(){
        let history_id = $(this).attr('history-id');
       
        $.post('async/delete_history.php',{history_id:history_id},function(){
            loadHistory();

        })
    })


    })//ready
</script>