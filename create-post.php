<?php
include('db.php');
?>
<?php
$authorSql = "SELECT * FROM author ORDER BY author.first_name";
$authors = getDataFromDatabase($connection, $authorSql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $body = $_POST['body'];
  $author = $_POST['author'];
  $author = $_POST['author'];
  $sql = "INSERT INTO posts (title, body, author_id, created_at) VALUES ('$title', '$body', '$author', CURDATE())";
  insertIntoDB($connection, $sql);
  header('location: index.php');
}
include('header.php');
?>

<!DOCTYPE html>
<html>

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
        <form method="POST" action="create-post.php">
          <div class="u-gap-bottom">
            <label for="author">Choose an author:</label>

            <select name="author">
              <option value="" selected disabled>Choose an author</option>
              <?php
              foreach ($authors as $author) {
              ?>
                <option value="<?php echo ($author['id']) ?>"><?php echo ($author['first_name'] . " " . $author['last_name']) ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="u-gap-bottom">
            <label>Title</label>
            <input type="text" name="title" required>
          </div>

          <div class="u-gap-bottom">
            <label>Content</label>
            <textarea name="body" required></textarea>
          </div>



          <div class="u-gap-bottom">
            <button>Save</button>
          </div>
        </form>
      </div>
      <?php
      include('sidebar.php');
      ?>
    </div>
  </main><!-- /.container -->
  <?php
  include('footer.php');
  ?>
</body>

</html>