<?php

require_once('trip.php');
ini_set('display_errors',"on");
$trip = new Trip();

$tripDATA = $trip->getAll();

function h ($s){
  return htmlspecialchars($s, ENT_QUOTES,"UTF-8");
}

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
      <th>タイトル</th>
      <th>カテゴリ</th>
      <th>日記日時</th>
    </tr>
    <?php foreach($tripDATA as $column): ?>
    <tr>
      <td><?php echo h($column['title'] )?></td>
      <td><?php echo h($trip->setCategoryName($column['category'])) ?></td>
      <td><?php echo h($column['post_at']) ?></td>
      <td><a href= "/project/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
      <td><a href= "/project/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
      <td><a href= "/project/trip_delete.php?id=<?php echo $column['id'] ?>">削除</a></td>
    </tr>
    <?php endforeach; ?>

  </table>
  
</body>
</html>
