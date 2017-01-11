<div class="container">
  <h1><?= $title; ?></h1>
  <?php echo validation_errors(); ?>
  <div class="content">
    <?php echo form_open_multipart('posts/create'); ?>
    <?php echo form_open_multipart('posts/create'); ?>
    <?php echo form_label('Title') . '<br>'; ?>
    <?php echo form_input(array('name' => 'title','placeholder'=>'Title')) . '<br>' ?>
    <?php echo form_label('Post') . '<br>'; ?>
    <?php echo form_textarea(array('id'=>'editor1','name'=>'body','rows'=>8,'cols'=>40)) . '<br>' ?>
    <input type="file" name="userfile" value=""><br>
    <?php echo form_submit(array('class'=>'btn btn-success','name' => 'submit','value'=>'Add Post')) . '<br>' ?>
    <?php echo form_close() ?>

  </div>
