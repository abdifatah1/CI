<div class="container">
  <h1><?= $title; ?></h1>
  <?php echo validation_errors(); ?>
  <div class="content">
    <?php echo form_open('posts/update'); ?>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <label for="">Title<br>
      <input type="text" name="title" value="<?php echo $post['title']; ?>">
    </label><br>
    <label for="">Post<br>
      <textarea name="body" id="editor1" rows="8" cols="40"><?php echo $post['body']; ?></textarea>
    </label><br>
    <label for="">Document
      <input type="file" name="userfile" value=""><br>
    </label> <br>
    <input class="btn btn-success" type="submit" name="submit" value="Edit">
  </form>
</div>
<?php
