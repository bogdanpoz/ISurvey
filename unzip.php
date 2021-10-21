<?php 
error_reporting(1);
try{
$zip = new ZipArchive;
$res = $zip->open('surveyv2fixed.zip');
if ($res === TRUE) {
  $zip->extractTo(__DIR__);
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}
}catch(Exception $e)
{
var_dump($e);
}
?>