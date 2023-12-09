<?php
include('../includes/functions.php');

$usr_mail = $_POST['usr_mail'];
$usr_mail = escapeString($usr_mail);

$query = "SELECT * FROM users WHERE  usr_mail = '$usr_mail'";
$select_mail = mysqli_query($connection,$query);
checkQuery($connection,$query);

while($row = mysqli_fetch_assoc($select_mail)){
    $db_usr_mail = $row['usr_mail'];
}
if(isset($db_usr_mail)){
    failMsg('Your account already exist!!');
}else{
    $usr_id = generateUserId();
    $query = "INSERT INTO users(usr_id,usr_mail)VALUES('$usr_id','$usr_mail')";
    $create_account = mysqli_query($connection,$query);
    checkQuery($create_account);
    if($create_account){
        successMsg('Account created!!');
        ?>
        <div id="feedback_add_pwd">
            
        <form action="" method="post" id='add_password_form'>
            <input type="hidden" name="usr_id" value='<?php echo $usr_id;  ?>'>

        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingInput" name='pwd' required>
          <label for="floatingInput">Password</label>
        </div>

        <button type="submit" class='btn btn-primary add_pwd_btn'>Proceed</button>

        </form>

        </div>
     

        <?php
    }
}

?>
<script>
    $('#add_password_form').submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();

     $('.add_pwd_btn').html('<i class="fas fa-spinner fa-spin"></i> Creating..');
     $('.add_pwd_btn').attr("disabled",true);


        $.post('async/add_pwd.php',postData,function(data){
            $('#feedback_add_pwd').html(data);

        })

    })
</script>