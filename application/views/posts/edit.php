<div class="container">
  <h1><?= $title; ?></h1>
  <?php echo validation_errors(); ?>
  <div class="content">
    <?php echo form_open('posts/update'); ?>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <?php echo form_open_multipart('posts/update  '); ?>
    <?php echo form_label('Title') . '<br>'; ?>
    <?php echo form_input(array('class'=>'form-control input-lg','name' => 'title','value'=>$post["title"])) . '<br>' ?>
    <?php echo form_label('Post') . '<br>'; ?>
    <?php echo form_textarea(array('class'=>'ckeditor','name'=>'body','rows'=>8,'cols'=>40,'value'=>$post["body"])) . '<br>' ?>
    <select class="form-control input-lg" name="category">
      <option value="none">Select a Category</option>
      <?php foreach ($categories as $category) { ?>
      <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
      <?php } ?>
    </select>
    <label for="">Document
      <input class="form-control input-lg" type="file" name="userfile" value="<?php echo $post['img']; ?>"><br>
    </label> <br>
    <input class="btn btn-success" type="submit" name="submit" value="Edit">
  </form>
</div>
<?php
