<?php include('header.php') ?>
    <meta name="description" content="shareTUBE">
    <title>shareTube</title>
</head>
<body>
<?php include('navbar.php'); ?>


<div class="side_main_container"><!--side_main-->

<div class="side_container"><!--side_container-->



<?php 
if(isset($_SESSION['usr_id'])){
  ?>
  <div class="card side-widget"><!--widget-->
 <!--item-->
  <ul class="list-group list-group-flush ">

<li class="list-group-item">
<i class="fas fa-user-circle"></i>
<?php 
$usr_id = $_SESSION['usr_id'];
echo getUserName($usr_id); 
?>
<a class='logout_link' href="?page=logout">Logout</a>
</li>

<a class='list-group-item' href="#" data-bs-toggle="modal" data-bs-target="#profile">Profile</a>
<a class='list-group-item' href="?page=myvideo">My videos</a>
<a class='list-group-item' href="?page=history">History</a>
<a class='list-group-item' href="?page=later">Watch later</a>
</ul>
  <!--item-->
</div><!--widget-->
<?php
}
?>
 



<?php
if(isset($_SESSION['usr_id'])){
//check login

$usr_id = $_SESSION['usr_id'];
$query = "SELECT * FROM subscribers WHERE usr_subscriber_id = '$usr_id'";
$select_subscribers = mysqli_query($connection,$query);
checkQuery($select_subscribers);
$available_subs = mysqli_num_rows($select_subscribers);
if($available_subs != 0){
?>
<div class="card side-widget"><!--widget-->
<div class="card-header" >
Subscriptions
</div>
<!--item-->
    <ul class="list-group list-group-flush ">
      <?php
          while($row = mysqli_fetch_assoc($select_subscribers)){
          $usr_channel_id  = $row['usr_channel_id'];

          
          ?>
                 
         <a class='list-group-item' style='display:flex;' href="?page=channel&channel=<?php echo getUserToken($usr_channel_id); ?>"><div class="profile_img"></div> <span style='padding-left:5px;'><?php echo getUserName($usr_channel_id ); ?></span></a>

          <?php

          }
          ?>
      </ul>
        <!--item-->
      </div><!--widget-->

          <?php
      }
      }  
      ?>


<div class="card side-widget"><!--widget-->
  <!--item-->
  <ul class="list-group list-group-flush">
<?php
$query = "SELECT * FROM categories";
$select_category = mysqli_query($connection,$query);
checkQuery($select_category);
while($row = mysqli_fetch_assoc($select_category)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
?>
<a class='list-group-item' href="?page=tags&tag=<?php echo $cat_id; ?>"><?php echo $cat_title ?>(<?php echo getTotalCategories($cat_id);?>)</a>
<?php
}
?>
</ul>
  <!--item-->
</div><!--widget-->


<div class="card side-widget"><!--widget-->
  <!--item-->
  <ul class="list-group list-group-flush">
  <li class="list-group-item">Help center</li>
  <li class="list-group-item">Docs & How to </li>
  <li class="list-group-item">Report issue</li>
  <li class="list-group-item">Contact Us </li>
  </ul>
  <!--item-->
</div><!--widget-->



</div><!--side_container-->

<div class="main_contanier"><!--main_container-->
<!-- <div class="loader"></div> -->
<?php
if(isset($_SESSION['usr_id'])){
?>
<div class="add_video_card"  data-bs-toggle="modal" data-bs-target="#addVideo"><!--add_video-->

<div class="add_vid_items">
 <span>Upload a video</span>
<span><i class="fas fa-plus" style='font-size:40px;'></i></span>   
</div>

</div><!--add_video-->

<?php
}
?>

<div class="tags_container"><!--tags-container--->
<?php include('components/tags.php'); ?>
</div><!--tags-container--->


<?php include('components/search_bar.php'); ?>

<?php
// echo generateVideoId(); 
// echo "<br>"; 
// echo $_SESSION['usr_id'];
// echo "<br>"; 
// echo time();
 ?>

<div class="search_cards_container"><!--cards_container-->

<?php include('components/q_result.php') ?>

<?php include('components/tags_search_result.php') ?>


</div><!--cards_container-->


<div class="user_popular_tags_container"><!--user_popular_cards_container-->

</div><!--user_popular_cards_container-->


<div class="user_popular_cards_container"><!--user_popular_cards_container-->
<?php  lazyLoad(); ?>
</div><!--user_popular_cards_container-->


<div class="popular_cards_container"><!--cards_container-->
<?php  lazyLoad(); ?>
</div><!--cards_container-->




</div><!--main_container-->



</div><!--side_main-->

<script>
  function loadPopularVideos(){
    $.ajax({
      url:'async/popular_videos.php',
      type:'POST',
      success:function(data){
        if(!data.error)
        $('.popular_cards_container').html(data);

      }
    })

  }

  function loadUserMostWatchedVideos(){

    $.ajax({
      url:'async/user_popular_videos.php',
      type:'POST',
      success:function(data){
        if(!data.error)
        $('.user_popular_cards_container').html(data);

      }
    })

  }
  function loadUserMostWatchedCategory(){

    $.ajax({
      url:'async/user_popular_tags.php',
      type:'POST',
      success:function(data){
        if(!data.error)
        $('.user_popular_tags_container').html(data);

      }
    })

  }


  setTimeout(() => {
    // loadUserMostWatchedCategory();
    loadUserMostWatchedVideos();
    loadPopularVideos();
  }, 2500);
 
</script>


