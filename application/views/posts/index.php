
<div class="container">
  <h1 class=""><?php echo $title; ?></h1>
  <div class="content_posts">


    <?php foreach($posts as $post) : ?>


      <div class="col-lg-4 col-md-4 col-sm-6">
        <h3><?php echo ucfirst($post['title']); ?></h3>
        <a  class="first_a" href="<?php echo site_url('/posts/' .$post['slug']);?>">
          <img class="post_img" src="<?php echo base_url(); ?>/assets/img/<?php echo $post['img']; ?>" alt=""> <br>
          <?php echo word_limiter($post['body'],70); ?><br>
          <?php
          $time = strtotime($post['created']);
          $post['created'] = date("m/ d / y", $time);
          ?>
          <small>posted on : <?php echo $post['created']; ?></small>
        </a>
        <p>
          <a class="btn btn-default" href="<?php echo site_url('/posts/' .$post['slug']);?>">Read more</a>
        </p>
        <hr>

      </div>
    <?php endforeach ?>

  </div>
  <div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
  </div>
