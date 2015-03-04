<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo exec('echo -n "p" >> ctl');
$play = file_get_contents( 'playctl' );
echo $play;

if ($play === "play") {
 	file_put_contents( 'playctl' , "pause");
} elseif ($play === "pause") {
	file_put_contents( 'playctl' , "play");
}
header("Location:index.php");
?>
