<div class="container">
  <h1><?php echo $post['title']; ?></h1>

  <div class="content">
    <table class="table_view">
      <small>posted on : <?php echo $post['created']?></small>

      <tbody>
        <tr>
          <td>
            <img class="view_img" src="<?php echo base_url(); ?>/assets/img/<?php echo $post['img']; ?>" alt=""> <br>
            <?php echo $post['body']; ?>

          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <?php if($admin){ ?>
    <a class="btn btn-default" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>

    <?php echo form_open('posts/delete/' .$post['id']); ?>

    <input class="btn btn-danger" type="submit" name="submit" value="Delete">
    <?php } ?>
  </form>
</div>
