<?php
  echo "Hello World";
  ?>

<?php
$rand_num = rand(1,6);
echo "サイコロの値は".$rand_num."です。";
?>


<?php
// おみくじを作る
// 比較演算子 == > < >= <= !=
$omikuji = rand(1,10);
if($omikuji == 1){
    echo "大吉";
}elseif ($omikuji == 2){
    echo "中吉";
}elseif($omikuji <= 4){
    echo "小吉";
}elseif($omikuji <= 7){
    echo "凶";
}else {
    echo "大凶";
}
?>
