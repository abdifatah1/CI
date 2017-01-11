<div class="container">
  <div class="content">
    <h1>Login</h1>
       <?php echo validation_errors(); ?>
       <?php echo form_open('verifylogin/index'); ?>
         <label for="username">Username:</label>
         <input type="text" id="username" name="username" value="<?php echo set_value('username')?>"/>
         <br/>
         <label for="password">Password:</label>
         <input type="password" size="20" id="passowrd" name="password"/>
         <br/>
         <input type="submit" value="Login"/>
       </form>
  </div>
