<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Codeigniter</title>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
  <script src="<?php echo base_url()?>assets/js/ckeditor/ckeditor.js"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-inverse navbar-fixed-top nav-justified">
        <ul class="naav nav navbar-nav navbar-left ">
          <li><a href="<?php echo site_url('/') ?>">Home</a></li>
          <li><a href="<?php echo site_url('posts') ?>">Posts</a></li>
          <li><a href="<?php echo site_url('posts/create') ?>">Create Post</a></li>
          <li><a href="<?php echo site_url('questions') ?>">Questions</a></li>
          <li><a href="<?php echo site_url('jobs') ?>">Jobs</a></li>
          <li><a href="<?php echo site_url('documentations') ?>">Documentations</a></li>
        </ul>
      </nav>
  </header>
