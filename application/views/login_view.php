<div class="container">
  <div class="content">
    <?php  ?>
    <h1><?php  echo $title; ?></h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin/index'); ?>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo set_value('username')?>"/>
    <br/>
    <label for="password">Password:</label>
    <input type="password" size="20" id="passowrd" name="password"/>
    <br/><br/>
    <input class ="btn btn-primary col-md-offset-1 col-md-1" type="submit" value="Login"/>
    <!-- <a class="btn btn-primary" href="#">New to the blog</a> -->
  </form>





</div>
