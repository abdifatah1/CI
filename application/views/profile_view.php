<div class="container">
  <?php
  echo "<h1>$title</h1>";
  ?>
    <p><a class ="btn btn-default" href='<?php echo base_url();?>posts/create'>Create a new post</a></p>

    <div class="content">
      <?php foreach($profile as $post) : ?>
        <div class="table_index">
          <h3 class="diff"><?php echo ucfirst($post->title); ?></h3>
          <a  class="first_a" href="<?php echo site_url('/posts/' .$post->slug);?>">
            <img class="post_img" src="<?php echo base_url(); ?>/assets/img/<?php echo $post->img; ?>" alt=""> <br>
            <?php echo word_limiter($post->body,20); ?><br>
            <?php
            $time = strtotime($post->created);
            $post->created = date("m/ d / y", $time);
            ?>
            <small>posted on : <?php echo $post->created; ?></small>
          </a>
          <p>
            <a class="btn btn-default" href="<?php echo base_url(); ?>posts/edit/<?php echo $post->slug; ?>">Edit</a>
            <a class="btn btn-danger" href="<?php echo base_url(); ?>posts/delete/<?php echo $post->id; ?>">Delete</a>
        </p>
        <hr>
      </div>

    <?php endforeach ?>
  </div>

</div>
