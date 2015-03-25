<?php
 session_start();
    if (isset($_SESSION['login'])) {
echo exec('echo -n "+" >> ctl');
header("Location:index.php");

}else{
 header('LOCATION:login.php');
}


?>
