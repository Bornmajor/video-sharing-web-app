
<style>
  #myUL {
  display: none;
  list-style-type: none;
  padding: 0;
  margin: 0;
  max-width: 400px;
  z-index: 9;
  position: absolute;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 5px;
  text-decoration: none;
  /* font-size: 18px; */
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
#search_bar{
  max-width: 400px;
}
</style>

<input type="search" name="" class='form-control' id='search_bar' placeholder='Search a video...' onkeyup="mySearch()">    
<ul id="myUL">
    <?php
    $query = "SELECT * FROM videos LIMIT 5";
    $select_query_videos = mysqli_query($connection,$query);
    checkQuery($select_query_videos);
    if($select_query_videos){
        while($row = mysqli_fetch_assoc($select_query_videos)){
        // $video_id = $row['video_id'];
        $video_url = $row['video_url'];
        $video_title = $row['video_title'];
        $video_desc  = $row['video_desc'];
        $thumbnail = $row['thumbnail'];
        $usr_id = $row['usr_id'];

         ?>
  <li><a href="?q=<?php echo $video_title  ?>"><?php echo $video_title ?></a></li>


         <?php
        }
    }
    $query = "SELECT * FROM categories LIMIT 3";
    $select_category = mysqli_query($connection,$query);
    checkQuery($select_category);
    while($row = mysqli_fetch_assoc($select_category)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    ?>
  <li><a href="?page=tags&tag=<?php echo $cat_id; ?>"><?php echo $cat_title ?></a></li>
    <?php
    }
    $query = "SELECT DISTINCT usr_id  FROM videos LIMIT 3";
    $select_query_users = mysqli_query($connection,$query);
    checkQuery($select_query_users );
    while($row = mysqli_fetch_assoc($select_query_users)){
    $usr_id = $row['usr_id'];
        ?>
    <li><a href="?page=channel&channel=<?php echo getUserToken($usr_id); ?>"><?php echo getUserName($usr_id); ?></a></li>
         <?php 
        }

        ?>


</ul>



<script>
  $('#search_bar').keyup(function(){
   let search_text = $(this).val().toUpperCase();
    // alert();
    $('.video_card').each(function(){
      let vid_title = $(this).attr('video-title').toUpperCase();
      let vid_desc = $(this).attr('video-desc').toUpperCase();
      let vid_usr = $(this).attr('video-channel').toUpperCase();
     
      if(vid_title.indexOf(search_text)> -1 || vid_desc.indexOf(search_text)> -1 || vid_usr.indexOf(search_text)> -1){
        $(this).css("display","");
      
      } else{
        $(this).css("display","none");
        }
    })

  })

  function mySearch() {

    ul = document.getElementById("myUL");
    ul.style.display = 'block';

    var input, filter, ul, li, a, i, txtValue;
    input =  $('#search_bar').val();

    filter = input.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if(input == "" || input == " " ){
            ul.style.display = 'none';
        }
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>