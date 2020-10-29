<?php
require_once('trip.php');
$trips = $_POST;

$trip = new Trip();
$trip->tripValidate($trips);
$trip->tripUpdate($trips);

?>
<p><a href="index.php">もどる</a></p>