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
echo exec('echo -n "s" >> /home/pi/.config/pianobar/ctl');
$newnum = strbefore($_POST['station'], ')');
echo exec ('echo -n ' . $newnum . ' >> /home/pi/.config/pianobar/ctl');
echo exec ('echo "\r" >> /home/pi/.config/pianobar/ctl');
echo $newnum;
header("Location:index.php");
?>
