<?php
include('../includes/functions.php');

if(isset($_SESSION['usr_id'])){

$video_id = $_POST['video_id'];
$video_id = escapeString($video_id);

$usr_id = $_SESSION['usr_id'];
$usr_id = escapeString($usr_id);


$query = "SELECT * FROM saved_videos WHERE usr_id = '$usr_id' AND video_id = '$video_id'";
$select_status = mysqli_query($connection,$query);
checkQuery($select_status);
while($row = mysqli_fetch_assoc($select_status)){
    $saved_id = $row['saved_id'];
}
if(isset($saved_id)){
?>
<span class='interaction_icon save_video' title='Already saved'> <i class="fas fa-check"></i> Saved </span>
<?php
}else{
?>
<span class='interaction_icon save_video' title='Save to watch later'> <i class="fas fa-plus"></i> Save to watch later </span>
<?php
}    
}else{
?>
<span class='interaction_icon save_video' title='Save to watch later'> <i class="fas fa-plus"></i> Save to watch later </span>  
<?php
}


?>
<script>
    $(document).ready(function(){
         
    $('.save_video').click(function(){
        let video_id = '<?php echo $_POST['video_id']; ?>';

        $.post('async/save_video.php',{video_id:video_id},function(data){
            
            $('.load_saved_status').html(data);

            setTimeout(() => {
                  loadSavedStatus();
            }, 2000);
          

        })
        
    })

    })
</script>
