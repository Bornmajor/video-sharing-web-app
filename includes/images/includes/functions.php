<?php
include('connection.php');

function escapeString($string){
    global  $connection;
   return mysqli_real_escape_string($connection,$string);
 
 }
 
 //success msg
function successMsg($msg){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//fail msg
function failMsg($msg){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//warning msg
function warnMsg($msg){
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function checkQuery($result){
  global $connection;
  if($result){

  }else{
      die("Query failed".mysqli_error($connection));
  
  }  
}

function generateString($length_of_string){
  // String of all alphanumeric character
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_video_id = "sT". substr(str_shuffle($str_result),
                      0, $length_of_string);
    
 return $gen_video_id;
}


function generateUserString($length_of_string){
  // String of all alphanumeric character
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_video_id = "sT-U". substr(str_shuffle($str_result),
                      0, $length_of_string);
    
 return $gen_video_id;
}

function generateVideoId(){
    global $connection;
    $vid_id = generateString(25);

    $query = "SELECT * FROM videos WHERE video_id = '$vid_id'";
    $check_video = mysqli_query($connection,$query);
    checkQuery($check_video);
    if($check_video){
     while($row = mysqli_fetch_assoc($check_video)){
      $db_video_id = $row['video_id'];

     }
     if(isset($db_video_id)){
      return generateString(25);
     }else{
      return generateString(25);

     }
    }

}

function generateUserId(){
  global $connection;
  $vid_id = generateUserString(30);

  $query = "SELECT * FROM videos WHERE video_id = '$vid_id'";
  $check_video = mysqli_query($connection,$query);
  checkQuery($check_video);
  if($check_video){
   while($row = mysqli_fetch_assoc($check_video)){
    $db_video_id = $row['video_id'];

   }
   if(isset($db_video_id)){
    return generateUserString(30);
   }else{
    return generateUserString(30);

   }
  }

}
function get_usr_id($length_of_string){
 
  // String of all alphanumeric character
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  return "MLU". substr(str_shuffle($str_result),
                     0, $length_of_string);
}

function getNewUsername($string){

  $character = "@";
  
  $position = strpos($string, $character);
  if ($position !== false) {
    $newString = substr($string, 0, $position);
    return $newString; // result: username
  }
  
  }

  function getCategory($video_id){
    global $connection;

    $video_id = escapeString($video_id);

    $query = "SELECT * FROM videos WHERE video_id = '$video_id'";
    $select_cat = mysqli_query($connection,$query);
    checkQuery($select_cat);
    while($row = mysqli_fetch_assoc($select_cat)){
     $cat_id = $row['cat_id'];
    }
    return $cat_id;


  }



  function emptyTableRowMsg($query,$msg){
    global $connection;
    
    $total_rows = mysqli_num_rows($query);
    if($total_rows == 0){
        return '<div class="no_row_data">'.$msg.'</div>';
    }


  }

  function getTotalItemsFromQuery($query){
    global $connection;

    $select_item = mysqli_query($connection,$query);
    checkQuery($select_item);
    echo mysqli_num_rows($select_item);

  }

  function getUserSession($usr_id){
    $_SESSION['usr_id'] = $usr_id;
  }

  function getUserName($usr_id){
    global $connection;
    $query = "SELECT usr_mail FROM users WHERE usr_id = '$usr_id'";
    $select_usr = mysqli_query($connection,$query);
    checkQuery($select_usr);
    while($row = mysqli_fetch_assoc($select_usr)){
     $usr_mail = $row['usr_mail'];

    }
    $character = "@";
  
    $position = strpos($usr_mail, $character);
    if ($position !== false) {
      $newString = substr($usr_mail, 0, $position);
      return $newString; // result: username
    }
   

  }
   function getUserNameFromDb($usr_id){
    global $connection;

    $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
    $select_username_db = mysqli_query($connection,$query);
    checkQuery($select_username_db);

    while($row = mysqli_fetch_assoc($select_username_db)){
     $username = $row['username'];
    }
    if(isset($username)){
      return $username;
    }
    

   }
  function getTotalSubscriber($usr_id){
    global $connection;
    $query = "SELECT * FROM subscribers WHERE usr_channel_id = '$usr_id'";
    $select_subscribers = mysqli_query($connection,$query);
    checkQuery($select_subscribers);
    return mysqli_num_rows($select_subscribers).' subscribers';
  }

  function getCategoryTitle($cat_id){
    global $connection;
    $query="SELECT * FROM  categories WHERE cat_id = '$cat_id'";
    $select_cat_title = mysqli_query($connection,$query);
    checkQuery($select_cat_title);
    while($row = mysqli_fetch_assoc($select_cat_title)){
     $cat_title = $row['cat_title'];

    }
    return $cat_title;
  }



  function trimString($string){
  return  $string = (strlen($string) > 25) ? substr($string,0,20).'...' :  $string;

  }
  function getVideoViews($video_id){
    global $connection;
    $query = "SELECT * FROM views WHERE video_id = '$video_id'";
    $select_vid_views = mysqli_query($connection,$query);
    checkQuery($select_vid_views);
    return mysqli_num_rows($select_vid_views).' views';


  }
  function getUserTotalVideos($usr_id){
    global $connection;
    $query = "SELECT * FROM videos WHERE usr_id = '$usr_id'";
    $select_usr_videos = mysqli_query($connection,$query);
    checkQuery($select_usr_videos);
    return mysqli_num_rows($select_usr_videos).' videos';

  }

  function addHistoryVideo($video_id){
    global $connection;
    if(isset($_SESSION['usr_id'])){

      $usr_id = $_SESSION['usr_id'];
      $video_id = $_GET['video'];
  
      $query = "SELECT * FROM history WHERE usr_id = '$usr_id' AND video_id = '$video_id'";
      $check_history = mysqli_query($connection,$query);
      checkQuery($check_history);
      while($row = mysqli_fetch_assoc($check_history)){
         $history = $row['history_id'];
      }
      if(!isset($history)){
  
          $query = "INSERT INTO history(usr_id,video_id)VALUES('$usr_id','$video_id')";
          $insert_history = mysqli_query($connection,$query);
          checkQuery($insert_history);
  
      }
  
  }

  }

  function  returnHomeNotLogin(){
    
    if(!isset($_SESSION['usr_id'])){
      header("Location: ?page=home");

    }
  }

  function getUserToken($usr_id){
    global $connection;
    $query = "SELECT * FROM users WHERE usr_id  = '$usr_id'";
    $select_token = mysqli_query($connection,$query);
    checkQuery($select_token);
    while($row = mysqli_fetch_assoc($select_token)){
     $usr_token = $row['usr_token'];

    }
    return $usr_token;

  }
  function getUserMail($usr_id){
    global $connection;
    $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
    $select_mail = mysqli_query($connection,$query);
    checkQuery($select_mail);

    while($row = mysqli_fetch_assoc($select_mail)){
      $usr_mail = $row['usr_mail'];

    }
    return $usr_mail;

  }
  function getUserIdFromToken($usr_token){
    global $connection;
    $query = "SELECT * FROM users WHERE usr_token = $usr_token";
    $select_username_tk = mysqli_query($connection,$query);
    checkQuery($select_username_tk);
    while($row = mysqli_fetch_assoc($select_username_tk)){
     $usr_id = $row['usr_id'];

    }
   return $usr_id;
    
  }
  function getVideoUrl($video_id){
    global $connection;
    $video_id = escapeString($video_id);
    $query = "SELECT * FROM videos WHERE video_id = '$video_id'";
    $select_video = mysqli_query($connection,$query);
    checkQuery($select_video);
    while($row = mysqli_fetch_assoc($select_video)){
     $video_url =  $row['video_url'];
    }
    return $video_url;
  }

  function getCatTitle($cat_id){
    global $connection;
    $cat_id = escapeString($cat_id);

    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
    $select_category = mysqli_query($connection,$query);
    checkQuery($select_category);
    while($row = mysqli_fetch_assoc($select_category)){
     $cat_title = $row['cat_title'];
    }
    return $cat_title;
  }

  function getTotalCategories($cat_id){
    global $connection;
    $cat_id = escapeString($cat_id);
    $query =  "SELECT * FROM videos WHERE cat_id = $cat_id";
    $select_category_count = mysqli_query($connection,$query);
    return mysqli_num_rows($select_category_count);

  }

  function setVideoQuery(){
    global $connection;
    
  }

function lazyLoad(){
  global $connection;
  ?>
  <div class="lazy lazy_title_grp"></div>

<?php
$query = "SELECT * FROM videos";
$select_videos_for_loader = mysqli_query($connection,$query);
checkQuery($select_videos_for_loader);
while($row = mysqli_fetch_assoc($select_videos_for_loader)){

include('components/lazy_loader.php');

}
?>
<?php

}

function format_time($t,$f=':') // t = seconds, f = separator 
{
  return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}


  function elapseTime($time){

    $diff     = time() - $time;
          
    // Time difference in seconds
    $sec     = $diff;
      
    // Convert time difference in minutes
    $min     = round($diff / 60 );
      
    // Convert time difference in hours
    $hrs     = round($diff / 3600);
      
    // Convert time difference in days
    $days     = round($diff / 86400 );
      
    // Convert time difference in weeks
    $weeks     = round($diff / 604800);
      
    // Convert time difference in months
    $mnths     = round($diff / 2600640 );
      
    // Convert time difference in years
    $yrs     = round($diff / 31207680 );
      
    // Check for seconds
    if($sec <= 60) {
        return "$sec seconds ago";
    }
      
    // Check for minutes
    else if($min <= 60) {
        if($min==1) {
            return "one minute ago";
        }
        else {
            return "$min minutes ago";
        }
    }
      
    // Check for hours
    else if($hrs <= 24) {
        if($hrs == 1) { 
            return "an hour ago";
        }
        else {
            echo "$hrs hours ago";
        }
    }
      
    // Check for days
    else if($days <= 7) {
        if($days == 1) {
            return "Yesterday";
        }
        else {
            return "$days days ago";
        }
    }
      
    // Check for weeks
    else if($weeks <= 4.3) {
        if($weeks == 1) {
            return "a week ago";
        }
        else {
            return "$weeks weeks ago";
        }
    }
      
    // Check for months
    else if($mnths <= 12) {
        if($mnths == 1) {
            return "a month ago";
        }
        else {
            return "$mnths months ago";
        }
    }
      
    // Check for years
    else {
        if($yrs == 1) {
            return "one year ago";
        }
        else {
            return "$yrs years ago";
        }
    }


  }
?>