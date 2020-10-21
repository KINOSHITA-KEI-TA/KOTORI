<?php
  require_once('dbc.php');

  Class Trip extends Dbc
  {
    protected $table_name = 'trip';

    public function setCategoryName($category){
      if ($category === '1'){
        return '日常';
      } elseif ($category === '2'){
        return '旅の記録';
      } else{
        return 'その他';
      }
    }

    public function tripCreate($trips){
      $sql = 'INSERT INTO
                trip(title, content, category, publish_status)
              VALUES
                (:title, :content, :category, :publish_status)';
      $dbh = $this->dbConnect();
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
    }
  }
?>