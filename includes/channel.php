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
    .delete_video{
        position: absolute;
        right:5%;
        top:0%;
        background-color:#f1f1f1;
        padding:10px;
        font-size:20px;
        cursor: pointer;

    }
    .delete_video:hover{
        color:red;
    }
    .profile_banner_username{
        display: flex;
    }
    .load_status_container{
       display: flex;
       align-items:center;
       /* padding-left:5px; */
       
      
    }
      /*media query*/
  @media screen and (max-width: 710px){
    .profile_banner_username{
        flex-direction:column;
    }
  }

    
</style>
<?php include('navbar.php'); ?>

<div class="banner"><!--banner-->
    <div class="wallpaper_img"></div>


    <div class="banner_profile"><!--banner_profile-->
        <div class="profile_banner_img"></div>

        <div class='profile_banner_username'><!--profile_banner_username--->

        <div class="bn_usr_views_chan"><!--bn_usr_views_chan-->
           <div class='banner_username'>
            <?php
            $usr_id = getUserIdFromToken($_GET['channel']);
            echo  getUserName($usr_id);
            ?>  
          </div>
          
            <div class="banner_views">
            <?php echo getTotalSubscriber($usr_id); ?>
          </div>

          <div class='banner_video_views'>
         <?php 
         echo getUserTotalVideos($usr_id); 
         ?>
          </div>


        </div><!--bn_usr_views_chan-->

         <div class='load_status_container'>
            <span class='load_subscribe_status'></span>
         </div>

        
       

          <!-- <div class="load_subscriber_status"><a href="#" class="btn btn-primary"> <i class="fas fa-bell"></i> Subscribe</a></div> -->

       
          

        </div><!--profile_banner_username--->

    </div><!--banner_profile-->

</div><!--banner-->

<?php returnHomeNotLogin(); ?>

<div class="my_vidoes_cards_container"><!--cards_container-->

<div class='search_history'>
<input type="search" name="" class='form-control' id='search_bar' placeholder='Search a video...'>    
</div>


<span class='load_videos'>
    <div class="loader"></div>
</span>


</div><!--cards_container-->


<script>


    function loadMyVidoes(){
        let usr_token = '<?php echo $_GET['channel']; ?>';
        $.ajax({
            url: 'async/display_channel.php',
            type: 'POST',
            data:{usr_token:usr_token},
            success:function(data){
             $('.load_videos').html(data);

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
        loadMyVidoes();
        loadSubscribeStatus();
    }, 2000);



</script>