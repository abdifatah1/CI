<div class="container">
  <?php echo validation_errors(); ?>

  <div class="content">
    <?php echo form_open_multipart('contact'); ?>
    <?php echo form_label('First Name') . '<br>'; ?>
    <?php echo form_input(array('class'=>'form-control','name' => 'fname','placeholder'=>'First Name','value'=>set_value('fname'))) . '<br>' ?>
    <?php echo form_label('Last Name') . '<br>'; ?>
    <?php echo form_input(array('class'=>'form-control','name' => 'lname','placeholder'=>'Last Name','value'=>set_value('lname'))) . '<br>' ?>
    <?php echo form_label('Subject') . '<br>'; ?>
    <?php echo form_input(array('class'=>'form-control','name' => 'subject','placeholder'=>'Subject','value'=>set_value('subject'))) . '<br>' ?>
    <?php echo form_label('Email Address') . '<br>'; ?>
    <?php echo form_input(array('class'=>'form-control','name' => 'email','placeholder'=>'Email Address','value'=>set_value('email'))) . '<br>' ?>
    <?php echo form_label('Message') . '<br>'; ?>
    <?php echo form_textarea(array('class'=>'form-control','name'=>'message','rows'=>8,'cols'=>40,'value'=>set_value('message'))) . '<br>' ?>
    <?php echo form_submit(array('class'=>'btn btn-success','name' => 'submit','value'=>'Send')) . '<br>' ?>
    <?php echo form_close() ?>
  </div>
