<?php
$commentsSql = "SELECT *, comments.post_id as post_id FROM comments INNER JOIN author ON comments.author_id = author.id WHERE comments.post_id = {$_GET['post_id']}";
$comments = getDataFromDatabase($connection, $commentsSql);
?>
<div>
  <h5>Comments</h5>
  <div class="u-gap-bottom">

    <form method="POST" action="single-post.php?post_id=<?php echo $_GET['post_id'] ?>">
      <div class="u-gap-bottom">
        <label for="comment">Leave a comment:</label>
        <textarea name="content" id="comment" required></textarea>
      </div>
      <div class="u-gap-bottom">
        <button type="submit">Submit</button>
      </div>
    </form>

  </div>

  <ul>
    <?php
    foreach ($comments as $comment) {
    ?>
      <li>
        <span>Posted by: <strong class="<?php echo ($comment['gender']) ?>"><?php echo ($comment['first_name'] . " " . $comment['last_name']) ?></strong></span>
        <div>
          <?php echo ($comment['text']) ?>
        </div>
        <hr>
      </li>
    <?php
    }
    ?>
  </ul>

</div>