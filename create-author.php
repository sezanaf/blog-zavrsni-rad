<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $gender = $_POST['gender'];
  $sql = "INSERT INTO author (first_name, last_name, gender) VALUES ('$first_name', '$last_name', '$gender')";
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

        <form method="POST" action="create-author.php">
          <div class="u-gap-bottom">
            <label for="name">First name</label>
            <input type="text" name="first_name" id="name" required>
          </div>

          <div class="u-gap-bottom">
            <label for="l-name">Last name</label>
            <input type="text" name="last_name" id="l-name" required>
          </div>

          <div class="u-gap-bottom">
            <label for="male">Male</label>
            <input type="radio" name="gender" value="male" id="male">
          </div>

          <div class="u-gap-bottom">
            <label for="female">Female</label>
            <input type="radio" name="gender" value="female" id="female">
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