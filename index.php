<?php
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$fp = fopen("$DOCUMENT_ROOT/../orders.txt",'ab');
fwrite($fp, $oupPutString);
file_put_contents("$DOCUMENT_ROOT/../orders.txt", $oupPutString);
