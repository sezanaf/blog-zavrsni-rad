<?php
include('header.php');
include('db.php');

$sql = "SELECT *, DATE_FORMAT(created_at, '%e %b, %Y') AS df_created_at, posts.id as post_id FROM posts JOIN author ON posts.author_id = author.id ORDER BY created_at DESC";
$posts = getDataFromDatabase($connection, $sql);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Vivify Blog</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="styles/blog.css" rel="stylesheet">
  <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

  <main role="main" class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">
        <?php if (empty($posts)) { ?>
          <h3>No posts yet</h3>
        <?php } else { ?>
          <div>
            <?php
            foreach ($posts as $post) {
            ?>
              <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo ($post['post_id']) ?>"><?php echo ($post['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo ($post['df_created_at']) ?> by <span class="<?php echo ($post['gender']) ?>"><a href=" #"><?php echo ($post['first_name'] . ' ' .  $post['last_name']) ?></a></span></p>
                <p><?php echo ($post['body']) ?></p>
              </div><!-- /.blog-post -->
            <?php
            }
            ?>

          </div>
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>
        <?php } ?>



      </div><!-- /.blog-main -->
      <?php
      include('sidebar.php');
      ?>
    </div><!-- /.row -->
  </main><!-- /.container -->
  <?php
  include('footer.php');
  ?>
</body>

</html>