<?php

$link = mysql_connect("localhost","root","Kin080372");
mysql_query("create database trip default character set utf8");
$result = mysql_query("trip");

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    echo $row[0];
		echo "<br>";
}
?>

<?php

$link = mysql_connect("localhost","root","");
mysql_query("create database trip default character set utf8");
$result = mysql_query("trip");

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    echo $row[0];
		echo "<br>";
}
?>