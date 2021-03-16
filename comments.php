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
        <h5>Komentari</h5>
        <?php

        $commentsSql = "SELECT * FROM comments WHERE comments.post_id = {$_GET['post_id']}";
        $comments = getDataFromDatabase($connection, $commentsSql);


        ?>
        <ul>
          <?php
          foreach ($comments as $comment) {
          ?>
            <li>
              <span>posted by: <strong><?php echo ($comment['author']) ?></strong> </span>
              <div>
                <?php echo ($comment['text']) ?>
              </div>
              <hr>
            </li>
            <!-- /.comment-post -->
          <?php
          }
          ?>
        </ul>
      </div><!-- /.blog-main -->
    </div><!-- /.row -->

  </main><!-- /.container -->


</body>

</html>