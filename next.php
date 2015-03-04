<?php
echo exec('echo -n "n" >> /home/pi/.config/pianobar/ctl');
header("Location:index.php");
?>
