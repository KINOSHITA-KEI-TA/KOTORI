<?php

require_once('trip.php');
ini_set('display_errors',"on");
$trip = new Trip();

$tripDATA = $trip->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>旅の一覧</title>
</head>
<body>
<h2>旅の一覧</h2>
<p><a href="/project/form.html">新規作成</a></p>
  <table>
    <tr>
      <th>No</th>
      <th>タイトル</th>
      <th>カテゴリ</th>
    </tr>
    <?php foreach($tripDATA as $column): ?>
    <tr>
      <td><?php echo $column['id'] ?></td>
      <td><?php echo $column['title'] ?></td>
      <td><?php echo $trip->setCategoryName($column['category']) ?></td>
      <td><a href= "/project/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
      <td><a href= "/project/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
    </tr>
    <?php endforeach; ?>

  </table>
  
</body>
</html>
