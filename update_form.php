<?php
    require_once('trip.php');

    $trip = new Trip();
    $result = $trip->getById($_GET['id']);

    $id = $result['id'];
    $title = $result['title'];
    $content = $result['content'];
    $category = (int)$result['category'];
    $publish_status = (int)$result['publish_status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>旅日記更新</title>
</head>
<body>
  <h2>投稿フォーム</h2>
  <form action="/project/trip_update.php" method="POST">
  <input type="hidden" name= "id" value="<?php echo $id ?>">
  <p>旅のタイトル：</p>
  <input type="text" name="title" value="<?php echo $title ?>">
  <p>日記の本文：</p>
  <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
  <br>
  <p>カテゴリ：</p>
  <select name="category">
    <option value="1" <?php if($category === 1 ) echo "selected"?>>日常 </option>
    <option value="2" <?php if($category === 2 ) echo "selected"?>>旅の記録</option>
  </select>
  <br>
  <input type="radio" name="publish_status" value="1"<?php if($publish_status === 1 ) echo "checked"?>>公開
  <input type="radio" name="publish_status" value="2"<?php if($publish_status === 2 ) echo "checked"?>>非公開
  <br>
  <input type="submit" value="投稿">
</form>
  
</body>
</html>