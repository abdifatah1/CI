<div class="container">

  <?php
  echo "<h1>$title</h1>";


  ?>

  <?php
  if($admin){ ?>
    <p><a class ="btn btn-default" href='<?php echo base_url();?>posts/create'>Create a new post</a></p>

    <div class="">
      <?php foreach($posts as $post) : ?>

        <div class="col-lg-3 col-md-3 col-sm-6">
          <h3 class="diff"><?php echo ucfirst($post['title']); ?></h3>
          <a  class="first_a" href="<?php echo site_url('/posts/' .$post['slug']);?>">
            <img class="post_img" src="<?php echo base_url(); ?>/assets/img/<?php echo $post['img']; ?>" alt=""> <br>
            <?php echo word_limiter($post['body'],20); ?><br>
            <?php
            $time = strtotime($post['created']);
            $post['created'] = date("m/ d / y", $time);
            ?>
            <small>posted on : <?php echo $post['created']; ?></small>
          </a>
          <p>
            <a class="btn btn-default" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>

            <?php echo form_open('posts/delete/' .$post['id']); ?>
            <input class="btn btn-danger" type="submit" name="submit" value="Delete">
          </form>
        </p>
        <hr>
      </div>

    <?php endforeach ?>
    <div class="pagination">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
  <div class="users">
    <?php foreach ($users as $user) {
      $id = $user['id'];
      // $user_id = ucfirst($user['id']);

      ?>

      <table>


        <th><?php echo $user['username']; ?></th>
        <tr>
          <td><a class='btn btn-default'
            href='<?php echo base_url();?>admin/super'> <?php if($user['admin']){echo "Admin";}else{echo "Not admin";} ?></a>
          </td>
          <td>
            <a class='btn btn-default'
            href='<?php echo base_url();?>admin/delete/<?php echo $id ?>'>Delete</a>
          </td>
          <br>
        </tr>
      </table>

      <?php  } ?>
      <br>
      <a class="btn btn-default" href="<?php echo base_url()?>verifylogin/register">Add user</a>
      <h1>Add Category</h1>
      <?php echo form_open('admin/add_cat') ?>
      <?php echo form_label('Category Name') . '<br>'; ?>
      <?php echo form_input(array('class'=>' input-lg','name' => 'category')) . '<br>' ?>
      <br>
      <?php echo form_submit(array('class'=>'btn btn-default','name' => 'submit','value'=>'Add Category')) . '<br>' ?>
      <?php form_close() ?><br>
      <div class="categories col-lg-3  text-center">
        <?php foreach ($categories as $category) { ?>
          <p class="btn-default input-lg"><?php echo $category['category_name'] ?>
            <a class=" btn btn-danger" href="<?php echo 'admin/delete_cat/'.$category['id'] ?>">Delete</a>
          </p>
          <?php } ?>
        </div>
      </div>
      <?php
    } else {
      echo 'you are not admin';
    }
    ?>
  </div>
