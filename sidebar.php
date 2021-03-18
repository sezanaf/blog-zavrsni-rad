<?php
$sql = "SELECT *, DATE_FORMAT(created_at, '%e %b, %Y') AS df_created_at, posts.id as post_id FROM posts ORDER BY created_at DESC LIMIT 3";
$posts = getDataFromDatabase($connection, $sql);
?>
<aside class="col-sm-3 ml-sm-auto blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>Latest posts</h4>
  </div>
  <div class="sidebar-module">
    <?php
    foreach ($posts as $post) {
    ?>
      <h6 class="blog-post-title"><a href="single-post.php?post_id=<?php echo ($post['post_id']) ?>">&bull; <?php echo ($post['title']) ?></a></h6>
    <?php
    }
    ?>
  </div>
</aside><!-- /.blog-sidebar -->