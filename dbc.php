
<?php

Class Dbc
{
  protected $table_name;
  
  protected function dbConnect(){
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

  public function getAll(){
    $dbh = $this->dbConnect();
    $sql = "SELECT * FROM $this->table_name";
        
    $stmt = $dbh->query($sql);

    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $result;
    // var_dump($result);
    $dbh = null;
  }

  // $dbh = new PDO($dsn,$user,$pass);

  // var_dump($dbh);


  public function getById($id){

    if(empty($id)){
      exit('不正アクセスです。');
    }
    
    $dbh = $this->dbConnect();

    $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
    $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!$result){
      exit('ブログがありません');
    }

    return $result;
    
  }
}
?>