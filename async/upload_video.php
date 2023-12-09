<?php

include('../includes/functions.php');
require '../vendor/autoload.php';
use Vimeo\Vimeo;

if(!isset($_SESSION['usr_id'])){
//redirecting
failMsg('Login to add video');
echo "<script type='text/javascript'>
window.setTimeout(function() {
window.location = '?page=home';
}, 2000);
</script>";
}else{


$client_id = "d1ba848b282e8a111fd3e73197ef13165113c39e";
$client_secrets = "2suMWGZWEgMmbczL+0RQdhmIsNgpX7tQyDhmjeqDCoVnIzdpSSexBeKNeWzDTXFb7qhGKpe9vL7JPmsKX2JlovMd3nQ7BSPCobtXULTe6i0v68PcUEkpl4ZY5mCvRxCf";
$access_token = "54a0b59aa7921ddb850d0faba191d369";
$client = new Vimeo($client_id,$client_secrets,$access_token);

$video_url = $_FILES['video']['name'];
$vid_tmp = $_FILES['video']['tmp_name'];

move_uploaded_file($vid_tmp,"../temp/$video_url");

$uri = $client->upload('../temp/'.$video_url, array(
    "name" => "Untitled",
    "description" => "The description goes here."
  ));
  
  $response = $client->request($uri . '?fields=transcode.status');
  if ($response['body']['transcode']['status'] === 'complete') {
    successMsg('Video uploaded');
  }  elseif ($response['body']['transcode']['status'] === 'in_progress') {
    successMsg('Your video is still uploading.Kindly complete required fields');
  }else {
    failMsg('Video upload failed');
  }
  
//trim link
$uri  = str_replace("/videos/","",$uri);


//generate video id
$video_id = generateVideoId();

$query = "INSERT INTO videos(video_id,video_url)VALUES('$video_id','$uri')";
$create_video = mysqli_query($connection,$query);
checkQuery($create_video);

if($create_video){
  unlink('../temp/'.$video_url);
?>



<div id="feedback"></div>

<form action="" method="post"  enctype="multipart/form-data" id='add_video_details'>
<input type="hidden" name="video_id" value='<?php echo $video_id  ?>' id='video_id'> 

<div class="form-floating mb-3">
<input type="text" class="form-control"  placeholder="Video title" name='video_title' id='video_title' required>
<label for="floatingInput">Video title</label>
</div>


<div class="form-floating mb-3">
<textarea class="form-control" placeholder="Leave a comment here" id="video_desc" style="height: 200px;resize:none;" name='video_desc'  required></textarea>
<label for="floatingTextarea2">Description</label>
</div>

<div class="form-floating mb-3">
<select class="form-select" id="cat_id" aria-label="Floating label select example" name='cat_id' required>
<option selected value="">Select category</option>

<?php
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    checkQuery($select_categories);
    while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    ?>
    <option value="<?php echo $cat_id ?>"><?php echo $cat_title; ?></option>

    <?php
            
    }
    
?>

</select>
<label for="floatingSelect">Main agendas</label>
</div>


<div class="mb-3">
<label for="formFile" class="form-label">Select thumbnail</label>
<input class="form-control" type="file" id="formFile" name='image' accept="image/png, image/jpeg" required>
</div>

<button type="submit" class='btn btn-primary upload_btn'>Complete upload</button>

</form>


<?php
}

}
?>
<script>
    $('#add_video_details').submit(function(e){
        e.preventDefault();

        $('.upload_btn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
        $('.upload_btn').attr("disabled",true);

    $.ajax({
            url: "https://api.imgbb.com/1/upload?key=9ba11664560d5c426f513990e96746c0",
            type:"POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            processData: false,
            success:function(data){
                if(!data.error){
                 
                let video_id  = $('#video_id').val();
                let img_link  = data.data.url;
                let video_title = $('#video_title').val();
                let video_desc = $('#video_desc').val();
                let cat_id = $('#cat_id').val();

  
                $.post('async/add_video.php',{video_id:video_id,video_title:video_title,video_desc:video_desc,cat_id:cat_id,img_link:img_link},function(data){
                    $('#feedback').html(data);

                }) 

                }
               

            }
          });

    })
</script>