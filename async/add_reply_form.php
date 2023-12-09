<?php
include('../includes/functions.php');
$usr_token = $_POST['usr_token'];
$comment_id = $_POST['comment_id'];

$usr_token = escapeString($usr_token);
$comment_id = escapeString($comment_id);

$query = "SELECT * FROM users WHERE usr_token = $usr_token";
$select_username = mysqli_query($connection,$query);
checkQuery($select_username);
while($row = mysqli_fetch_assoc($select_username)){
   $reply_usr_id =  $row['usr_id'];

}
?>

<form action="" method="post" class='reply_comment_form'>
 
 <div class='reply_usr'><span>Reply to :</span> <div class="other_usr_profile" ></div> <span ><?php echo getUserName($reply_usr_id);?></span></div> 

        <div class="form-floating">
        <input type="hidden" name="usr_token" value='<?php echo $usr_token ?>'>
            <input type="hidden" name="comment_id" value='<?php echo $comment_id ?>'>

          <textarea class="form-control" placeholder="Leave a comment here" style="height: 80px;max-width:100%;resize:none;" name='reply' required></textarea>
          <label for="floatingTextarea2">Reply...</label>
              <button type="submit" class='btn btn-primary reply_comment_btn'>Send <i class="fab fa-telegram"></i></button>
        </div>    
  
</form>

<script>
    $('.reply_comment_form').submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();

        $.post('async/add_reply_comment.php',postData,function(){
            loadComments();
            $('.reply_comment_form')[0].reset();


        })

      


    })
</script>