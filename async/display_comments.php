<?php
include('../includes/functions.php');

$the_video_id = $_POST['video_id'];
$the_video_id = escapeString($the_video_id);


$query = "SELECT * FROM comments WHERE video_id = '$the_video_id'  ORDER BY comment_id DESC ";
$select_comments = mysqli_query($connection,$query);
checkQuery($select_comments);

while($row = mysqli_fetch_assoc($select_comments)){
   $comment_id =  $row['comment_id'];
   $comment = $row['comment'];
   $comment_usr_id = $row['usr_id'];
   $comment_time = $row['comment_time'];
   ?>
<div class="comment_item_container"><!--comment_item_container-->

<!--item-->
<div class="comment_item"><!--comment_item-->

<div class='commnt_usr_time'><!--commnt_usr_time-->
<span class='usr_commnt'><?php echo getUserName($comment_usr_id);?></span>
<span class='time_commnt'> 
  <i class="fas fa-circle" style='font-size:9px;'></i>
 <span> 
 <?php echo elapseTime($comment_time); ?>
 </span>
</span>
</div><!--commnt_usr_time-->


<div class='profile_comment'><!--profile_comment-->
<div class="other_usr_profile" ></div>
 <div class="other_usr_comment">
     <?php echo $comment; ?>
 </div>

</div><!--profile_comment-->


</div><!--comment_item-->
 
  <span class='like-comment' comment-id='<?php echo $comment_id?>' title='like'> <i  class="fas fa-thumbs-up "></i> 
  <?php
  $query = "SELECT * FROM like_comments WHERE comment_id = '$comment_id'";
  $select_like_comments = mysqli_query($connection,$query);
  checkQuery($select_like_comments);
  
  echo mysqli_num_rows($select_like_comments);
  ?>
  </span> 
  <?php
  $query = "SELECT * FROM users WHERE usr_id = '$comment_usr_id'";
  $select_token = mysqli_query($connection,$query);
  checkQuery($select_token);
  while($row = mysqli_fetch_assoc($select_token)){
  $usr_token =  $row['usr_token'];

  }
  ?> 
  <span class='reply_comment' comment-id='<?php echo $comment_id?>'  usr-token='<?php echo $usr_token ?>' data-bs-toggle="modal" data-bs-target="#replyModal">Reply</span>
<!--item-->
  


</div><!--comment_item_container-->


<?php
}
echo emptyTableRowMsg($select_comments,'No comments');
?>

<script>
  $(document).ready(function(){
    $('.like-comment').click(function(){
      let comment_id = $(this).attr('comment-id');
      
      $.post('async/like_comment.php',{comment_id:comment_id},function(data){
        loadComments();

      })

  
     


    })

    $('.reply_comment').click(function(){
        

        let usr_token = $(this).attr('usr-token');
        let comment_id = $(this).attr('comment-id');

        $.post('async/add_reply_form.php',{comment_id:comment_id,usr_token:usr_token},function(data){

          $('.load_reply_form').html(data);
        

        })
      })

  })
</script>