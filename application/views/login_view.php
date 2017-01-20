<div class="container">
    <h1><?php  echo $title; ?></h1>
  <div class="content col-md-4">


    <?php echo validation_errors(); ?>
    <?php echo form_open('verifylogin/index'); ?>

    <label for="username">Username:
    <input class=" input-lg " type="text" id="username" name="username" placeholder="Username" value="<?php echo set_value('username')?>"/>
    </label>
    <br/>
    <label for="password">Password:
    <input type="password" class="input-lg"  id="password" placeholder="Password" name="password"/>
    </label>
    <br/><br/>
    <input class ="btn btn-primary col-md-offset-0 " type="submit" value="Login"/>
    <a class="btn btn-primary col-md-1.5" href="<?php echo base_url(); ?>verifylogin/register/">Not yes registered !</a>
  </form>
</div>
