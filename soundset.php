<?php
 session_start();
    if (isset($_SESSION['login'])) {
$vol = $_POST['amount'];
shell_exec('amixer set PCM "' . $vol . '"%');
echo $vol;
file_put_contents( 'vol' , $vol);
header("Location:index.php");

}else{
 header('LOCATION:login.php');
}

?>
