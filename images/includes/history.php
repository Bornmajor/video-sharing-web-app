<?php include('header.php') ?>
    <meta name="description" content="My history">
    <title>History</title>
</head>
<body>
<?php include('navbar.php'); ?>
<style>
    .history_cards_container{
        margin:20px;
    }
    .search_history{
        margin:10px 10px;
    }
    .delete_history{
        position: absolute;
        right:5%;
        top:0%;
        background-color:#f1f1f1;
        padding:10px;
        font-size:25px;
        cursor: pointer;

    }
    .delete_history:hover{
        color:red;
    }

</style>

    



<div class="history_cards_container"><!--cards_container-->

<div class='search_history'>
<input type="search" name="" class='form-control' id='search_bar' placeholder='Search a video...'>    
</div>

<span class='load_history'>

<div class="loader"></div>

</span>





</div><!--cards_container-->

<script>
    function loadHistory(){
        let page = '<?php echo $_GET['page']; ?>';
        $.ajax({
            url: 'async/display_history.php',
            type: 'POST',
            data:{page:page},
            success:function(data){
                if(!data.error){
                   $('.load_history').html(data); 
                }
                

            }
        })
    }
    setTimeout(() => {
        loadHistory();
        
    }, 2000);


</script>