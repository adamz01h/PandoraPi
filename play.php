<?php
echo exec('echo -n "p" >> /home/pi/.config/pianobar/ctl');
header("Location:index.php");
?>
