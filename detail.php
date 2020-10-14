<?php

  $id = $_GET['id'];

  if(empty($id)){
    exit('不正アクセスです。');
  }
  
  function dbConnect(){
    $dsn = 'mysql:host=localhost;dbname=trip_app;charset=utf8';
    $user = 'trip_user';
    $pass = '08030702';
    try{
      $dbh = new PDO($dsn,$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);
  
      } catch(PDOException $e){
        echo'接続失敗'.$e->getMessage();
        exit();
      };
      return $dbh;
  }
  $dbh = dbConnect();

  $stmt = $dbh->prepare('SELECT * FROM trip Where id = :id');
  $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);

  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if(!$result){
    exit('ブログがありません');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>旅の記録</title>
</head>
<body>
<h2>旅の記録</h2>
<h3>タイトル<?php echo $result['title'] ?></h3>
<p>投稿日時：<?php echo $result['post_at'] ?></p>
<p>カテゴリ：<?php echo $result['category'] ?></p>
<hr>
<p>本文：<?php echo $result['content'] ?></p>

  
</body>
</html>