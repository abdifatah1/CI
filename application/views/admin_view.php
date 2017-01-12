<div class="container">

  <?php
  echo $title;

  if(isset($username)) {
    $name = ucfirst($username);

    echo "<h3>You're connected as : $name </h3>";
  } else{
    echo "You're not connected !";
  }

  ?>

  <div class="content">
<?php
if($admin){
  echo '<a href="<?php echo base_url();?>posts/create">Create a post</a>';
} else {
  echo 'you are not admin';
}

 ?>



  </div>
