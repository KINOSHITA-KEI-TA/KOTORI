<?php

  require_once('trip.php');

  $trip = new Trip();
  $result = $trip->getById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="detail.css">
  <title>旅の記録</title>
</head>
<body>
<div class="detail">
  <h2 class="title">旅の記録</h2>
  <div class="detail-title">
    <h3>＜タイトル＞</h3>
    <p class="enter-title"><?php echo $result['title'] ?></p>
  </div>
  <p>投稿日時：<?php echo $result['post_at'] ?></p>
  <p>カテゴリ：<?php echo $trip->setCategoryName($result['category']) ?></p>
  <hr>
  <p>【本文】</p>
  <div class="enter-content">
    <?php echo $result['content'] ?>
  </div>
</div>

<p><a href="index.php">もどる</a></p>
</body>
</html>