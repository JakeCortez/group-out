<?php

  include ('commentClass.php');
  $comment = new Comment;
  $newUserId = $_POST['userId'];
  $comment->setUserId($newUserId);
  echo $comment->getUserId();

?>