
<div class="card video_card" style="" video-title='<?php echo $video_title ?>' video-desc='<?php echo $video_desc ?>' video-channel='<?php echo getUserName($usr_id) ?>' ><!--video_card-->
<?php

//delete icons
if(isset($_POST['page'])){
$page = $_POST['page'];
if($page == 'history'){
?>
<span class='delete_history' history-id='<?php echo $history_id; ?>' title='Remove <?php echo $video_title; ?>'><i class="fas fa-times"></i></span>
<?php
}
if($page == 'later'){
?>
<span class='delete_saved' saved-id='<?php echo $saved_id; ?>' title='Remove <?php echo $video_title; ?>'><i class="fas fa-times"></i></span>
<?php
}
if($page == 'myvideo'){
  ?>
  <div class="edit_delete_video">
  <span class='edit_video' video-id='<?php echo $video_id; ?>' video-url='<?php echo $video_url; ?>' title='Update this <?php echo $video_title; ?>' data-bs-toggle="modal" data-bs-target="#editVideo"><i class="fas fa-pen"></i></span>
  <span class='delete_video' video-id='<?php echo $video_id; ?>' video-url='<?php echo $video_url; ?>' title='Delete <?php echo $video_title; ?>'><i class="fas fa-trash"></i></span>
  </div>
 
  <?php
  }
}
?>  

<a href="?page=video&video=<?php echo $video_id ?>">
  <img src="<?php echo $thumbnail ?>" class="card-img-top" alt="Thumbbnail">
  <div class="card-body"><!--card-body-->

  <div class='card_details_container'><!--card_details_container-->
    <div class="card_title"> <?php  echo trimString($video_title);  ?></div>
    <div class="video_uploader"><!--uploader-->
    <div class="profile_img"></div>
<a href="?page=channel&channel=<?php echo getUserToken($usr_id);?>">
    <div class="user_uploader"><?php echo getUserName($usr_id); ?></div>
</a>
    </div><!--uploader-->    
     <div class="video_views">
     <span><?php  echo getVideoViews($video_id); ?></span> | <span><?php echo elapseTime($date_published); ?></span>
     </div>
  </div><!--card_details_container-->

    
    <div class='views_edit'><!--views_edit-->


    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle card_menu" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-ellipsis-v"></i>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"> <i class="fas fa-plus"></i> Watch later</a></li>
  </ul>
</div>


    </div><!--views_edit-->
  

  </div><!--card-body-->
</a>
</div><!--video_card-->






