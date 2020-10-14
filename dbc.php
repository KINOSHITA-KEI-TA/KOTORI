
<?php

function dbConnect(){
  $dsn = 'mysql:host=localhost;dbname=trip_app;charset=utf8';
  $user = 'trip_user';
  $pass = '08030702';
  try{
    $dbh = new PDO($dsn,$user,$pass,[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    } catch(PDOException $e){
      echo'接続失敗'.$e->getMessage();
      exit();
    };
    return $dbh;
}

function getAllTrip(){
  $dbh = dbConnect();
  $sql = 'SELECT * FROM trip';
      
  $stmt = $dbh->query($sql);

  $result = $stmt->fetchall(PDO::FETCH_ASSOC);

  return $result;
  // var_dump($result);
  $dbh = null;
}

// $dbh = new PDO($dsn,$user,$pass);

// var_dump($dbh);
$tripDATA = getAllTrip();

function setCategoryName($category){
  if ($category === '1'){
    return '旅の記録';
  } elseif ($category === '2'){
    return '日常';
  } else{
    return 'その他';
  }
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
