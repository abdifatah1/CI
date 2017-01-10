
<div class="container">
  <div class="content">
    <h1><?php echo $title; ?></h1>
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
      <table class="table_index">
        <thead>
          <th><?php echo ucfirst($post['title']); ?></th>
        </thead>

        <tbody>

          <tr>
            <td>
              <a  class="first_a" href="<?php echo site_url('/posts/' .$post['slug']);?>">
                <img class="post_img" src="<?php echo base_url(); ?>/assets/img/<?php echo $post['img']; ?>" alt=""> <br>
                <?php echo limit_text($post['body'],40); ?><br>
                <?php
                $time = strtotime($post['created']);
                $post['created'] = date("m/ d / y", $time);
                ?>
                <small>posted on : <?php echo $post['created']; ?></small>
              </a>
              <p>
                <a href="<?php echo site_url('/posts/' .$post['slug']);?>">Read more</a>
              </p>
            </td>
          </tr>
        </tbody>

      </table>

    <?php endforeach ?>
  </div>
