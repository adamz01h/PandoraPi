<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

function strbefore($string, $substring) {
  $pos = strpos($string, $substring);
  if ($pos === false)
   return $string;
  else 
   return(substr($string, 0, $pos));
} 
echo ($_POST['station']);
echo exec('echo -n "s" >> ctl');
$newnum = strbefore($_POST['station'], ')');
echo exec ('echo -n ' . $newnum . ' >> ctl');
echo exec ('echo "\r" >> ctl');
echo $newnum;
$load = file_get_contents('load');
file_put_contents('songinfo.txt', $load);
header("Location:index.php");
?>
