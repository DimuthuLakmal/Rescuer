<?php

include './connection.php';

$notification = json_decode(file_get_contents('php://input'), true);
error_log($notification['status'], $notification['subscriberId']);

$tag_number = $notification['subscriberId'];

$myfile = fopen("newfile2.txt", "w") or die("Unable to open file!");
$txt = $tag_number;
fwrite($myfile, $txt);
fclose($myfile);

$r = mysqli_query($con,"INSERT INTO general_users(user_level) VALUES (3)");

$sql="SELECT id FROM general_users ORDER BY id desc limit 1";

$last_id = 0;

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    $last_id = $row[0];
    }
  // Free result set
  mysqli_free_result($result);
}


$r = mysqli_query($con,"INSERT INTO subscribers(id, tag_number) VALUES ($last_id, '$tag_number')");

mysqli_close($con);
//$r = mysql_query("INSERT INTO subscriber(tag_number) VALUES ('$tag_number');", $con);

?>