<?php
include('../includes/functions.php');

returnHomeNotLogin();

$the_video_id = $_POST['video_id'];
$the_video_id = escapeString($the_video_id);

$query = "SELECT * FROM videos WHERE video_id = '$the_video_id'";
$select_video = mysqli_query($connection,$query);
checkQuery($select_video);
while($row = mysqli_fetch_assoc($select_video)){
  $video_title =  $row['video_title'];
  $video_desc = $row['video_desc'];
  $cat_id = $row['cat_id'];

}

?>

     <form action="" method="post" id='update_video_form' autocomplete='off'>
     
      <div class="feedback_update_video"></div>

      <input type="hidden" name="video_id" value='<?php echo $the_video_id; ?>'>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" value='<?php echo $video_title;  ?>' name='video_title' >
      <label for="floatingInputDisabled">Video title</label>
    </div>

    <div class="form-floating mb-3">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize:none;" name='video_desc'><?php echo $video_desc ?></textarea>
    <label for="floatingTextarea2">Description</label>
  </div>

      <div class="form-floating">
      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name='cat_id'>

        
        <option value='<?php echo $cat_id ?>' selected><?php echo getCategoryTitle($cat_id); ?></option>

        <?php
           $query="SELECT * FROM  categories";
           $select_cat_title = mysqli_query($connection,$query);
           checkQuery($select_cat_title);
           while($row = mysqli_fetch_assoc($select_cat_title)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            ?>

        <option value="<?php echo $cat_id ?>"><?php  echo $cat_title?></option>

            <?php    
           } 
        ?>    
      </select>
      <label for="floatingSelect">Category</label>
    </div>

     <br>

       <button type="submit" class='btn btn-primary update_video_btn'>Update video</button>

    </form>

    <script>
        $('#update_video_form').submit(function(e){
            e.preventDefault();
            let postData = $(this).serialize();

            $.post('async/update_video.php',postData,function(data){
                $('.feedback_update_video').html(data);
            })

        })
    </script>