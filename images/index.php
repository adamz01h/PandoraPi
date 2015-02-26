<html>
<head>

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
echo exec('sudo -u pi /var/www/stations.sh');
$stastions = file_get_contents( 'station.txt' );
$info = file( 'songinfo.txt' );
?>
<style>
.tuner{background-image: url("/images/change.png");
background-position:  center;
background-repeat: no-repeat;
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
width: 48px;
height: 47px;
cursor: pointer;
padding: 0;
border: none;}

.back{background-image: url("/images/arrow.png");
background-position:  center;
background-repeat: no-repeat;
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
width: 48px;
height: 47px;
cursor: pointer;
padding: 0;
border: none;}


.love{background-image: url("/images/thumbup-watermark.png");
background-position:  center;
background-repeat: no-repeat;
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
width: 48px;
height: 47px;
cursor: pointer;
padding: 0;
border: none;}


.hate{background-image: url("/images/thumbdown-watermark.png");
background-position:  center;
background-repeat: no-repeat;
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
width: 48px;
height: 47px;
cursor: pointer;
padding: 0;
border: none;}

.next { 
background-image: url("/images/btn_skip.png");
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
background-position:  center;
background-repeat: no-repeat;
width: 48px;
height: 47px;
cursor: pointer;
padding: 0;
border: none;
 
}
.play { 
background-image: url("/images/btn_play.png");
  background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
background-position:  0px 0px;
background-repeat: no-repeat;
width: 48px;
height: 47px;
border: 0px;
background-color: none;
cursor: pointer;
outline: 0;
}

h1 { color:#fff;
}
h2 { color:#fff;
}
p { color: #FFF; 
}
body {
	vertical-align: middle;
	background:#072b5d;
   
} div#overlay {
	background:#072b5d;
	display: none;
	z-index: 2;
	position: fixed;
	width: 100%;
	height: 100%;
	text-align: center;
	
}
div#specialBox {
	display: none;
	position: fixed;
	z-index: 3;
	margin: auto;
	text-align: center;
	width: auto; 
	height: auto;
	background: #072b5d;
	color: #000;
	border:medium;
	border:#FFF;
	top: 50px; left: 50px;
bottom: 50px; right: 50px;
}
div#wrapper {
	position:center;
	top: 0px;
	left: 0px;
	padding-left:24px;
}
</style>

 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
var open = ""
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    open=xmlhttp.responseText;
    }
}
xmlhttp.open("POST","songinfo.txt",true);
xmlhttp.send();
}
</script>
<script>
var previous = ""
setInterval(function() {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4) {

 		if (ajax.responseText != open) {
			window.location.reload();
		}
	}
    };
    ajax.open("POST", "songinfo.txt", true); //Use POST to avoid caching
    ajax.send();
}, 1000);</script> 
<script>
function toggleOverlay(){
	var overlay = document.getElementById('overlay');
	var specialBox = document.getElementById('specialBox');
	overlay.style.opacity = .8;
	if(overlay.style.display == "block"){
		overlay.style.display = "none";
		specialBox.style.display = "none";
	} else {
		overlay.style.display = "block";
		specialBox.style.display = "block";
	}
}
</script>
</head>
<body onLoad="loadXMLDoc()">

<div id="overlay"></div>
<div id="specialBox" ><span>
  <p>Change Station</p> 
<form action="change.php" method="post">
<p>Number: <input type="text" name="station"><br></p>
<textarea id="myText" rows="15" cols="85" readonly><?php echo ( $stastions ); ?></textarea>
</BR><input type="submit">
</form>
<button onMouseDown="toggleOverlay()" class="back"></button>
</span>
</div>

<div id="wrapper">
<h1 align="center"> Station: <?php echo ( $info[2] ); ?> </BR> </h1>
<h2 align="center">
<input type=button class="tuner" onClick="toggleOverlay()" align="center"></h2>
<h3 align="center">
<input type=button onClick="location.href='hate.php'" align="center" class="hate">
<input type=button onClick="location.href='love.php'" align="center" class="love">
<input type=button onClick="location.href='play.php'" align="center" class="play">
<input type=button onClick="location.href='next.php'" align="center" class="next"></h3>
<h2 align="center"> Song : <?php echo ( $info[1] ); ?> </BR>
Artist: <?php echo ( $info[0] ); ?> </BR></h2>
<h3 align="center"><img src=<?php echo ( $info[4] ) ?> alt="pandora" height="250" width="250" align="middle"></BR></h3>

</div>


</html>
