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
      $sql = "INSERT INTO
                $this->table_name(title, content, category, publish_status)
              VALUES
                (:title, :content, :category, :publish_status)";
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
    public function tripUpdate($trips){
        $sql = "UPDATE $this->table_name SET
                  title = :title, content = :content, category = :category, publish_status = :publish_status
                WHERE
                  id = :id";
        $dbh = $this->dbConnect();
        $dbh->beginTransaction();
        try{
          $stmt = $dbh->prepare($sql);
          $stmt->bindValue(':title',$trips['title'],PDO::PARAM_STR);
          $stmt->bindValue(':content',$trips['content'],PDO::PARAM_STR);
          $stmt->bindValue(':category',$trips['category'],PDO::PARAM_INT);
          $stmt->bindValue(':publish_status',$trips['publish_status'],PDO::PARAM_INT);
          $stmt->bindValue(':id',$trips['id'],PDO::PARAM_INT);
          $stmt->execute();
          $dbh->commit();
          echo '日記を更新しました';
        } catch(PDOException $e){
            $dbh->rollBack();
            exit($e);
        }
    }
    public function tripValidate($trips){
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
    }
  }
?>