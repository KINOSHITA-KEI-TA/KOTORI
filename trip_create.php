<?php
require_once('trip.php');
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

  $trip = new Trip();
  $trip->tripCreate($trips);

?>