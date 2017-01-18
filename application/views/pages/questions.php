<div class="container">
  <h1 class=""><?php echo $title; ?></h1>
  <?php echo validation_errors(); ?>

  <?php if(isset($username)){

    ?>
    <div class="content_posts">
      <div class="ask col-lg-5 col-md-4 col-sm-6">
        <?php echo form_open('pages') ?>
        <?php echo form_label('Username') . '<br>'; ?>
        <?php echo form_input(array('class'=>'form-control','name' => 'username','placeholder'=>'First Name','value'=>$username)) . '<br>' ?>
        <?php echo form_label('Topic') . '<br>'; ?>
        <?php echo form_input(array('class'=>'form-control','name' => 'topic','placeholder'=>'Subject','value'=>set_value('topic'))) . '<br>' ?>
        <?php echo form_label('Question') . '<br>'; ?>
        <?php echo form_textarea(array('class'=>'form-control','name'=>'question','rows'=>8,'cols'=>40,'value'=>set_value('message'))) . '<br>' ?>
        <?php echo form_submit(array('class'=>'btn btn-success','name' => 'submit','value'=>'Send')) . '<br>' ?>
        <?php echo form_close() ?>

        <?php } else { ?>
          <h2>To ask a question you must be connected <small><a class="btn btn-default" href="<?php echo base_url()?>login">click here</a></small></h2>
          <?php  }?>
        </div>
        <div class="questions col-lg-4 col-md-4 col-sm-6">
          <h1><?php echo $title_ques; ?></h1><br>
          <?php foreach ($questions as $question) {
            echo $question['topic'].'<br>'.$question['question'].'<br> posted at'.$question['created'].'by'.$question['username'].'<br>';
          } ?>
        </div>
      </div>
    </div>
