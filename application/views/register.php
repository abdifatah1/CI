<div class="container">

  <?php

   if(isset($username)) {
    echo "<h2>You're connected as : $username </h2>";
  } else{
    echo "You're not connected !";
  }
  ?>

  <div class="content">
    <h1><?php  echo $title; ?></h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin/register'); ?>
    <label for="username">Username:</label><br>
    <input class="input-lg" type="text" placeholder="Username" id="username" name="username" value="<?php echo set_value('username')?>"/>
    <br/>
    <label for="password">Password:</label><br>
    <input  class="input-lg" type="password" placeholder="Password" id="password" name="password"/><br>
    <label for="cpassword">Confirmation:</label><br>
    <input class="input-lg" type="password" placeholder="Confirm password" id="cpassword" name="confirmationp"/>
    <br/><br/>
    <input class ="btn btn-primary btn-lg col-md-offset-0 " type="submit" value="Register"/>
    <?php echo form_close(); ?>

  </div>
