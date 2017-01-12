
<div class="container">
  <div class="content">
    <h1><?php echo $title; ?></h1>
    <h1><?php //echo ?></h1>
    <?php
    function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
    ?>
    <?php foreach($posts as $post) : ?>

          <h3><?php echo ucfirst($post['title']); ?></h3>
          <div class="">
            <a  class="first_a" href="<?php echo site_url('/posts/' .$post['slug']);?>">
              <img class="post_img" src="<?php echo base_url(); ?>/assets/img/<?php echo $post['img']; ?>" alt=""> <br>
              <?php echo limit_text($post['body'],70); ?><br>
              <?php
              $time = strtotime($post['created']);
              $post['created'] = date("m/ d / y", $time);
              ?>
              <small>posted on : <?php echo $post['created']; ?></small>
            </a>
            <p>
              <a href="<?php echo site_url('/posts/' .$post['slug']);?>">Read more</a>
            </p>
          </div>

    <?php endforeach ?>
  </div>
