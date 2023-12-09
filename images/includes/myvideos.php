<?php include('header.php') ?>
    <meta name="description" content="My video">
    <title>
    My videos
    </title>
</head>
<body>
<style>
    .my_vidoes_cards_container{
        margin:20px;
    }
    .search_history{
        margin:10px 10px;
    }
    .edit_delete_video{
        display:flex;
        position: absolute;
        right:5%;
        top:0%;
       
       
        font-size:20px;
        cursor: pointer;

    }
    .edit_delete_video span{
        background-color:#f1f1f1; 
        padding:10px;

    }
    .edit_video{
        border-right:0.5px solid black;
    }
    .edit_delete_video span:hover{
        color:red;
    }
    .add_video_card{
        margin:0 10px;

    }
    
</style>
<?php include('navbar.php'); ?>

<div class="banner"><!--banner-->
    <div class="wallpaper_img"></div>


    <div class="banner_profile"><!--banner_profile-->
        <div class="profile_banner_img"></div>

        <div class='profile_banner_username'>

          <div class='banner_username'><?php echo getUserName($_SESSION['usr_id']); ?>  </div>

          <div class='banner_video_views'>
         <span></span> <?php echo getUserTotalVideos($_SESSION['usr_id']) ?>
          </div>

          <!-- <a href="#" class="btn btn-primary"> <i class="fas fa-bell"></i> Subscribe</a> -->

        </div>

    </div><!--banner_profile-->

</div><!--banner-->

<?php returnHomeNotLogin(); ?>

<div class="my_vidoes_cards_container"><!--cards_container-->

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

<div class='search_history'>
<input type="search" name="" class='form-control' id='search_bar' placeholder='Search a video...'>    
</div>


<span class='load_videos'>
  <?php lazyLoad(); ?>
</span>


</div><!--cards_container-->


<script>


    function loadMyVidoes(){
        let page = '<?php echo $_GET['page']; ?>';
        $.ajax({
            url: 'async/display_myvideos.php',
            type: 'POST',
            data:{page:page},
            success:function(data){
             $('.load_videos').html(data);

            }

        })
    }

    setTimeout(() => {
        loadMyVidoes();
    }, 2000);



</script>