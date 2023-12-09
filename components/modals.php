<style>
    .modal-header{
        border:none;
    }
    .upload_illustrator_img{
        display: flex;
        align-items:center;
        justify-content:center;
        flex-direction:column;
    }
    .upload_illustrator_img img{
        max-width: 400px;
    }
</style>

<!-- Add video -->
<div class="modal fade" id="addVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       
  <div id="feedback"><!--feedback-->
<form action="" method="post"  enctype="multipart/form-data"  id='add_video'>

         
        
  <div class='upload_illustrator_img'><!--upload_illustrator_img-->
      <img src="images/upload.png"  alt="">


      <?php
      if(isset($_SESSION['usr_id'])){
        ?>
  <label for="formFile"  class="form-label">Select video file to upload</label>

  <div class="mb-3">
      <input class="form-control" type="file" id="formFile" name='video' > 
  </div>

    <div class="mb-3">
    <button type="submit" class='btn btn-primary upload_btn'>  Upload video</button>
  </div>
        <?php

      }else{
        failMsg('You are required to login to upload your own video');
      }
      ?>
  


  



  </div><!--upload_illustrator_img-->
    </form>       
  </div>
       
    
       
      
      </div><!--feedback-->

    </div>
  </div>
</div>





<!-- Create account -->
<div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="feedback_create_acc"><!--feedback-->

        <form action="" method="post" id='create_account'>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name='usr_mail' required>
          <label for="floatingInput">Email</label>
        </div>

       <button type="submit" class='btn btn-primary create_acc_btn'>Create account</button>
          
        </form>
       </div><!--feedback-->

      </div>

    </div>
  </div>
</div>

<!-- Login account -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
  
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div id="feedback_login"><!--feedback-->

        <form action="" method="post" id='login_form'>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name='usr_mail' required>
          <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingInput" name='pwd' required>
          <label for="floatingInput">Password</label>
        </div>

       <button type="submit" class='btn btn-primary login_btn'>Login</button>
          
        </form>

       </div><!--feedback-->

      </div>

    </div>
  </div>
</div>





<!-- reply modal-->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body load_reply_form">
      
      <div class="loader"></div>

      </div>
   
    </div>
  </div>
</div>



<!-- Update profile -->
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      
        <form action="" method="post" id='update_profile_form' autocomplete='off'>
           <div id="feedback_profile"></div>
         <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" value='<?php echo getUserMail($_SESSION['usr_id']);  ?>' disabled>
          <label for="floatingInputDisabled">Email address</label>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" value='<?php echo getUserName($_SESSION['usr_id']);  ?>' disabled>
          <label for="floatingInputDisabled">Channel ID</label>
        </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name='username' value='<?php echo getUserNameFromDb($_SESSION['usr_id']); ?>' required>
            <label for="floatingInput">Username</label>
          </div>


           <button type="submit" class='btn btn-primary'>Update</button>

        </form>
     
      </div>
  
    </div>
  </div>
</div>



<!-- Edit video-->
<div class="modal fade" id="editVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body load_edit_video">

      
      <div class="loader"></div>
     
      </div>
  
    </div>
  </div>
</div>

<script>


   $('#login_form').submit(function(e){
    e.preventDefault();
    let postData = $(this).serialize();

    $('.login_btn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
     $('.login_btn').attr("disabled",true);

     $.post('async/login.php',postData,function(data){
      $('#feedback_login').html(data);
     })


   })

    $('#create_account').submit(function(e){
      e.preventDefault();
      let postData = $(this).serialize();

      $('.create_acc_btn').html('<i class="fas fa-spinner fa-spin"></i> Creating..');
     $('.create_acc_btn').attr("disabled",true);

      $.post('async/create_account.php',postData,function(data){
        $('#feedback_create_acc').html(data);


      })

    })


    $('#add_video').submit(function(e){
     e.preventDefault();

     $('.upload_btn').html('<i class="fas fa-spinner fa-spin"></i> Uploading...');
     $('.upload_btn').attr("disabled",true);


    $.ajax({
            url: "async/upload_video.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
            $('#feedback').html(data);       

            }
              
            }
          });


    })

    $('#update_profile_form').submit(function(e){
      e.preventDefault();
      let postData = $(this).serialize();

      $.post('async/update_profile.php',postData,function(data){
         $('#feedback_profile').html(data);
      })

    })
</script>