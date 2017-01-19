<div class="container">
  <h1><?= $title; ?></h1>
  <?php echo validation_errors(); ?>
  <div class="content">
    <?php if (isset($username)) { ?>

      <?php echo form_open_multipart('posts/create'); ?>
      <?php echo form_label('Title') . '<br>'; ?>
      <?php echo form_input(array('name' => 'title','placeholder'=>'Title')) . '<br>' ?>
      <?php echo form_label('Post') . '<br>'; ?>
      <?php echo form_textarea(array('class'=>'ckeditor','name'=>'body','rows'=>8,'cols'=>40)) . '<br>' ?>


        <select class="form-control " name="category">
          <option value="none">Select a Category</option>
          <?php foreach ($categories as $category) { ?>
          <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
          <?php } ?>
        </select>

        <input type="file" name="userfile" value=""><br>
        <?php echo form_submit(array('class'=>'btn btn-success','name' => 'submit','value'=>'Add Post')) . '<br>' ?>
        <?php echo form_close() ?>
        <?php  }else {
          echo 'You have no right to create a post';
        } ?>
      </div>
