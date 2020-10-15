
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

function setCategoryName($category){
  if ($category === '1'){
    return '旅の記録';
  } elseif ($category === '2'){
    return '日常';
  } else{
    return 'その他';
  }
}


function getTrip($id){

  if(empty($id)){
    exit('不正アクセスです。');
  }
  
  $dbh = dbConnect();

  $stmt = $dbh->prepare('SELECT * FROM trip Where id = :id');
  $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);

  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if(!$result){
    exit('ブログがありません');
  }

  return $result;
  
}

?>