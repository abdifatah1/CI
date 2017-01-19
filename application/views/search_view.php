<div class="container">

  <u><h1 class=""><?php echo $title;?></h1> </u>
  <div class="content_posts">


    <?php foreach ($results as $result) { ?>
      <div class="result col-lg-6">
        <a href="<?php echo base_url()?>posts/<?php echo $result['slug']; ?>"><?php echo word_limiter($result['body'], 10) ?></a>
      </div>
      <?php  } ?>
    </div>
  </div>
