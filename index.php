<?php

require_once('dbc.php');

$tripDATA = getAllTrip();

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
      <td><?php echo setCategoryName($column['category']) ?></td>
      <td><a href= "/project/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
    </tr>
    <?php endforeach; ?>

  </table>
  
</body>
</html>
