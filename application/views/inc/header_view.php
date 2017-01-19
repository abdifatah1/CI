<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Codeigniter</title>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
  <script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery-3.1.1.js"></script>
  <script src="<?php echo base_url()?>assets/js/blog.js"></script>

</head>
<body>
  <header>
    <nav class="navbar navbar-inverse navbar-fixed-top ">
      <ul class="nav navbar-nav navbar-left ">
        <li class=""><a href="<?php echo site_url('/') ?>">Home</a></li>
        <li class=""><a href="<?php echo site_url('posts/all_posts') ?>">Posts</a></li>
        <li><a href="<?php echo site_url('posts/create') ?>">Create Post</a></li>
        <li><a href="<?php echo site_url('pages') ?>">Questions</a></li>
        <li><a href="<?php echo site_url('jobs') ?>">Jobs</a></li>
        <li><a href="<?php echo site_url('contact') ?>">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right login ">
        <?php   if(isset($username)){
          $name = ucfirst($username);
          $logout = site_url('home/logout');

          $link = site_url('admin');
          $user = site_url('admin/profile');
          echo "<li><a class='btn' href='$link'>Admin</a></li>";

          echo "<li><a class='btn' href='$user'>$name</a></li>";
          echo "<li><a class='btn' href='$logout'>Logout</a></li>";
        }else{
          $link = site_url('home/index');
          echo "<li><a class='btn' href='$link'>Login</a></li>";
        }

        ?>

      </ul>

      <?php echo form_open('search','class="search form-inline"');?>
      <input class="form-control " type="text" name="search" placeholder="Search">
      <button class="btn btn-default" type="submit" name="submit" onkeyup="showHint(this.value)">Search</button>
      <center>  <p class="text" id="txtHint"></p></center>
      <?php echo form_close() ?>
    </nav>
  </header>
