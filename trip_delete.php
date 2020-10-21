<?php
require_once('trip.php');

$trip = new Trip();
$result = $trip->delete($_GET['id']);

?>

<p><a href="/">もどる</a></p>