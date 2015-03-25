<style>
body {
        vertical-align: middle;
        background:#072b5d;
}
div#login{
text-align:center;
}

p {
	color: #FFF;
}
h1 {
	color:#fff;
}
h2 {
	color:#fff;
}

</style> 
<?php session_start();
	if(isset($_POST['sub'])){
  	$username = $_POST['username'];
	$password = $_POST['password'];
 	 if($username === 'admin' && $password === 'password'){
    	$_SESSION['login'] = true;
	header('LOCATION:index.php');
	die();
  }
	if($username !== 'admin')$userError = 'Invalid Username';
  	if($password !== 'password')$passError = 'Invalid Password';
} 
echo "<!DOCTYPE html> <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
   <head>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
 <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login</title>
     <style type='text.css'>
       @import common.css;
     </style>
   </head> <body>
<div id='login'>
	<h1>PANDORA CONTROL LOGIN</h1>
  <form name='input' action='{$_SERVER['PHP_SELF']}' method='post'>
    <label for='username'></label><h2>Username</h2><input type='text' id='username' name='username' />
    <div class='error'>$userError</div>
    <label for='password'></label><h2>Password</h2><input type='password' id='password' name='password' />
    <div class='error'>$passError</div>
    <input type='submit' value='Login' name='sub' />
  </form>
</div>
  <script type='text/javascript' src='common.js'></script> </body> 
</html>";
?>
