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
        <li><a href="<?php echo site_url('questions') ?>">Questions</a></li>
        <li><a href="<?php echo site_url('jobs') ?>">Jobs</a></li>
        <li><a href="<?php echo site_url('documentations') ?>">Documentations</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right login ">
          <?php   if(isset($username)){
            $name = ucfirst($username);
            $logout = site_url('home/logout');
            if(isset($admin)){
              $link = site_url('admin');
              echo "<li><a class='btn' href='$link'>Admin</a></li>";
            }
            echo "<li><a class='btn' href='#'>$name</a></li>";
            echo "<li><a class='btn' href='$logout'>Logout</a></li>";
          }else{
            $link = site_url('home/index');
            echo "<li><a class='btn' href='$link'>Login</a></li>";
          }

          ?>

      </ul>
    </nav>
  </header>
