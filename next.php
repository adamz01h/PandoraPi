<?php
echo exec('echo -n "n" >> ctl');
$load = file_get_contents('load');
file_put_contents('songinfo.txt', $load);
header("Location:index.php");
?>
