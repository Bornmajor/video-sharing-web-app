<?php include('header.php') ?>
    <meta name="description" content="My video">
    <title>
        <?php
        if(isset($_GET['video'])){
            $video_id = $_GET['video'];
            
            $video_id = escapeString($video_id);
            
            $query = "SELECT * FROM videos WHERE video_id = '$video_id'";
            $select_video = mysqli_query($connection,$query);
            checkQuery($select_video);
            while($row = mysqli_fetch_assoc($select_video)){
               $video_title = $row['video_title'];
                    
            }
            echo $video_title;

            
            
            
            }else{
                header("Location: ?page=home");
            }
        
        ?>
    </title>
    <script src="https://player.vimeo.com/api/player.js"></script>
</head>
<body>
<?php include('navbar.php'); ?>

<?php addHistoryVideo($video_id); ?>

<?php
if(isset($_GET['video'])){
$video_id = $_GET['video'];

$video_id = escapeString($video_id);

$query = "SELECT * FROM videos WHERE video_id = '$video_id'";
$select_video = mysqli_query($connection,$query);
checkQuery($select_video);
while($row = mysqli_fetch_assoc($select_video)){
    $db_video_id = $row['video_id'];
   $video_url =  $row['video_url'];
   $video_title = $row['video_title'];
   $video_desc = $row['video_desc'];
   $thumbnail = $row['thumbnail'];
   $date_published =$row['date_published'];
   $usr_id = $row['usr_id'];

}


}else{
    header("Location: ?page=home");
}


?>


<div class="video_ply_side"><!--video_ply_side-->

<div class="video_player_container"><!--video_player_container-->

<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/<?php echo $video_url; ?>?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Untitled"></iframe></div>


<div class='video_widget'><!--video_widget-->

<div class="descriptions"><!--description-->

<div class="descriptions_cont_1"><!--descriptions_cont_1-->

  <div class="vid_widget_title"><?php echo $video_title?></div>
  
  <a class='links' href="?page=channel&channel=<?php echo getUserToken($usr_id); ?>">
  <div class="video_usr">
  <div style='background-color:white;' class="profile_img"></div>
  <span style='padding-left:5px;'><?php echo getUserName($usr_id); ?></span>  
   </div>
   </a>
 
 
  
     <div  class="load_saved_status"></div>
     
     <div class="load_duration"></div>

 
    <div class="vid_widget_desc"><!--vid_widget_desc-->
        <div class="desc_title">Description </div>
        <?php echo $video_desc ?>
    </div><!--vid_widget_desc-->

    <div class="vid_interactions"><!--vid_interactions-->
    <span style='padding: 5px;' class='load_likes'></span>
    <!-- <span class='interaction_icon' title='dislike'><i style='font-size:20px;color:white;' class="fas fa-thumbs-down"></i></span> -->
    <span class='interaction_icon share_btn' title='share'><i  class="fas fa-share"></i> Share </span>
    <span class='interaction_icon users_views' title='views'> no views </span>
    </div><!--vid_interactions-->


</div><!--descriptions_cont_1-->

<div class="descriptions_cont_2"><!--descriptions_cont_2-->

<span class='load_subscribe_status'></span>


</div><!--descriptions_cont_2-->




 


</div><!--description-->


 
    
</div><!--video_widget-->


<div class="comments_container"><!--comments_container-->

<div class="current_usr_comment"><!--current_usr_comment-->


 <?php 
if(isset($_SESSION['usr_id'])){
?>
 <span style='margin:0 5px ;'><i class="fas fa-user-circle"></i> 
 <?php
echo getUserName($_SESSION['usr_id']);
} 
?>
</span>
<form action="" method="post" id='form_comment'>
 <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="comment" style="height: 80px;max-width:500px;resize:none;" name='comment' required></textarea>
  <label for="floatingTextarea2">Comment here</label>
</div>    
<br>

<div id="feedback_comment"></div>
<input type="submit" value="Comment" class='btn btn-primary comment_btn'>
</form>


</div><!--current_usr_comment-->


<div class="other_users_comments"><!--other_users_comment-->
<div class="loader"></div>
</div><!--other_users_comment-->





</div><!--comments_container-->

<div class="cards_container"><!--cards_container-->
<?php
$query = "SELECT * FROM videos ORDER BY RAND()";
$select_videos = mysqli_query($connection,$query); 
checkQuery($select_videos);
while($row = mysqli_fetch_assoc($select_videos)){
  $video_id = $row['video_id'];
  $video_url = $row['video_url'];
  $video_title = $row['video_title'];
  $video_desc  = $row['video_desc'];
  $thumbnail = $row['thumbnail'];
  $usr_id = $row['usr_id'];
  
  ?>
 
 <?php include('components/video_card.php') ?>


  <?php
}
?>



</div><!--cards_container-->


</div><!--video_player_container-->

<div class='side_load_videos'><!--side_video-->

<?php include('components/side_load_videos.php'); ?>

</div><!--side_video-->

</div><!--video_ply_side-->

<div class="view_feedback"></div>

<script>
    function loadLikes(){
        let video_id = '<?php echo $db_video_id ;  ?>';
        $.ajax({
            url: 'async/load_likes.php',
            type: 'POST',
            data: {video_id:video_id},
            success:function(data){
                $('.load_likes').html(data);

            }
        })
    }

    $('#form_comment').submit(function(e){
        e.preventDefault();

    $('.comment_btn').html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
     $('.comment_btn').attr("disabled",true);

        let video_id = '<?php  echo $db_video_id ; ?>';
        let comment = $('#comment').val();


        $.post('async/add_comment.php',{video_id:video_id,comment:comment},function(data){
            $('#feedback_comment').html(data);
             loadComments();  
             $('#form_comment')[0].reset();
       
        })
    })

    function loadComments(){
        let video_id = '<?php  echo $db_video_id ; ?>';

    $.ajax({
     url: 'async/display_comments.php',
     type:'POST',
     data: {video_id:video_id},
     success:function(data){
        if(!data.error){
              $('.other_users_comments').html(data);
        }
      
     }
    })

    }

    function displayViews(){
        let video_id = '<?php echo $db_video_id ?>';

        $.ajax({
     url: 'async/display_views.php',
     type:'POST',
     data: {video_id:video_id},
     success:function(data){
        if(!data.error){
              $('.users_views').html(data);
        }
      
     }

        })
    }

    function loadSavedStatus(){
        let video_id = '<?php echo $db_video_id ?>';
        $.ajax({
            url:'async/display_saved_video_status.php',
            type:'POST',
            data:{video_id,video_id},
            success:function(data){
                $('.load_saved_status').html(data);


            }
        })
    }
    function loadSubscribeStatus(){
        let usr_token = '<?php echo getUserToken($usr_id); ?>';

        $.ajax({
            url: 'async/display_subscribe_status.php',
            type:'POST',
            data: {usr_token:usr_token},
            success:function(data){
                $('.load_subscribe_status').html(data);
            }

        })
    }
   
    setTimeout(() => {
      loadLikes();
      loadComments();
      displayViews();
      loadSavedStatus();
      loadSubscribeStatus();
    }, 1000);

    //share api

    const shareData = {
    title: "<?php echo $video_title?>",
    text: "Watch this",
    url: window.location.href,
    };

    const share_btn = $('.share_btn');
    const resultPara = document.querySelector(".result");

    share_btn.click( async() =>{
            try {
                await navigator.share(shareData);
                resultPara.textContent = "Shared";
            } catch (err) {
                resultPara.textContent = `Error: ${err}`;
            }

         }
        //  alert();
    )




</script>



<script>
    let iframe = document.querySelector('iframe');
    let player = new Vimeo.Player(iframe);

    // player.on('play', function() {
    //   console.log('Played the video');
    // });
    player.getDuration().then(function(duration) {
  
        $.post('async/get_duration_video.php',{duration:duration},function(data){
            $('.load_duration').html(data);
        })
   
     });
    
   

   function addView(){
   player.getCurrentTime().then(function(seconds) {
  // `seconds` indicates the current playback position of the video
    let video_id = '<?php echo $db_video_id;  ?>';
    //  console.log('Time now is',seconds);
    if(seconds > 10){
       
        $.post('async/add_view.php',{video_id:video_id},function(data){
            $('.view_feedback').html(data);
            displayViews();
        })
    }
    })   

   }
   const timerInterval = setInterval(addView,1000);

  


</script>