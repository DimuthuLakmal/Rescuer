<?php

$myfile = fopen("newfile_4.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

echo 'Success';

?>