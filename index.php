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
  <link rel="stylesheet" type="text/css" href="index.css">
  <title>旅の一覧</title>
</head>
<body>
<div class="header">
  <h2 class="title">＜私の旅日記＞</h2>
</div>
<p class="new-content"><a href="/project/form.html">→ 新しく投稿</a></p>
  <h3>これまでの旅の記録</h3>
  <div class="content">
    <table>
      <div class="title-content">
        <tr>
          <th>タイトル</th>
          <th>カテゴリ</th>
          <th>日記日時</th>
        </tr>
      </div>
      <div class="enter-content">
        <?php foreach($tripDATA as $column): ?>
        <tr class="enter-block">
          <td class="block"><?php echo h($column['title'] )?></td>
          <td class="block"><?php echo h($trip->setCategoryName($column['category'])) ?></td>
          <td class="block"><?php echo h($column['post_at']) ?></td>
          <td class="block"><a href= "/project/detail.php?id=<?php echo $column['id'] ?>">詳細</a></td>
          <td class="block"><a href= "/project/update_form.php?id=<?php echo $column['id'] ?>">編集</a></td>
          <td class="block"><a href= "/project/trip_delete.php?id=<?php echo $column['id'] ?>">削除</a></td>
        </tr>
        <?php endforeach; ?>
      </div>

    </table>
  </div>  
</body>
</html>
