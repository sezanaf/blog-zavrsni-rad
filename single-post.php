<?php
include('db.php');
// $authorSql = "SELECT id FROM author ORDER BY RAND() LIMIT 1";
// $authors = getDataFromSinglePost($connection, $authorSql);
// $authorId = $authors['id'];
// var_dump($authorId);

if (isset($_GET['post_id'])) {
  $sql = "SELECT *, DATE_FORMAT(created_at, '%e %b, %Y') AS df_created_at, posts.id as post_id FROM posts JOIN author ON posts.author_id = author.id WHERE posts.id = {$_GET['post_id']}";
  $singlePost = getDataFromSinglePost($connection, $sql);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $authorSql = "SELECT id FROM author ORDER BY RAND() LIMIT 1";
  $authors = getDataFromSinglePost($connection, $authorSql);
  $authorId = $authors['id'];
  $postId = $_GET['post_id'];
  $content = $_POST['content'];
  if ($_POST['content']) {

    // $author = $_POST['author'];
    $sqlinsertComment = "INSERT INTO comments (text, post_id, author_id) VALUES ('$content', '$postId', $authorId)";
    insertIntoDB($connection, $sqlinsertComment);
    header("Location: single-post.php?post_id={$_GET['post_id']}");
  }
}

include('header.php');
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
        <div class="blog-post">
          <h2 class="blog-post-title"><a href="#"><?php echo ($singlePost['title']) ?></a></h2>

          <p class="blog-post-meta"><?php echo ($singlePost['created_at']) ?> by <span class="<?php echo ($singlePost['gender']) ?>"><a href="#"><?php echo ($singlePost['first_name'] . ' ' .  $singlePost['last_name']) ?></a></span></p>

          <p><?php echo ($singlePost['body']) ?></p>


          <?php
          include('comments.php');
          ?>
        </div><!-- /.blog-post -->

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