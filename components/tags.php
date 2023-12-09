<?php
$query = "SELECT * FROM categories";
$select_category = mysqli_query($connection,$query);
checkQuery($select_category);
while($row = mysqli_fetch_assoc($select_category)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
?>

<a href="?page=tags&tag=<?php echo $cat_id; ?>" class='btn btn-primary tag'> <i class="fas fa-tag"></i> <?php echo $cat_title ?></a>

<?php
}
?>