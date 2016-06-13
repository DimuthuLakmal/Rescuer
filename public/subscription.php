<?php

include './connection.php';

$notification = json_decode(file_get_contents('php://input'), true);
error_log($notification['status'], $notification['subscriberId']);

$tag_number = $notification['subscriberId'];


$r = mysqli_query($con,"INSERT INTO subscribers(tag_number) VALUES ('$tag_number')");

mysqli_close($con);
//$r = mysql_query("INSERT INTO subscriber(tag_number) VALUES ('$tag_number');", $con);

?>