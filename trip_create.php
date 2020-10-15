<?php
require_once('dbc.php');
  $trips = $_POST;

    if (empty($trips['title'])){
      exit('タイトルを入力してください');
    }
    if (mb_strlen($trips['title']) > 191){
      exit('タイトルは191文字以下にしてください');
    }

    if (empty($trips['content'])){
      exit('本文を入力してください');
    }

    if (empty($trips['category'])){
      exit('カテゴリーは必須です');
    }

    if (empty($trips['publish_status'])){
      exit('公開ステータスは必須です');
    }

    $sql = 'INSERT INTO
              trip(title, content, category, publish_status)
            VALUES
              (:title, :content, :category, :publish_status)';
$dbh = dbConnect();
$dbh->beginTransaction();
try{
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':title',$trips['title'],PDO::PARAM_STR);
  $stmt->bindValue(':content',$trips['content'],PDO::PARAM_STR);
  $stmt->bindValue(':category',$trips['category'],PDO::PARAM_INT);
  $stmt->bindValue(':publish_status',$trips['publish_status'],PDO::PARAM_INT);
  $stmt->execute();
  $dbh->commit();
  echo '日記を投稿しました';
} catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}

?>