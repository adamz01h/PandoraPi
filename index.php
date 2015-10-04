<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>

<?php


echo exec('echo -n "e" >> ctl');
$stations = file( 'station.txt' );
$info = file( 'songinfo.txt' );

?>
<style>
select > .placeholder{
	display: none;
}

input[type="range"]{
	-webkit-appearance: none !important;
	width: 250px;
}

input[type="range"]::-webkit-slider-runnable-track {
	-webkit-appearance: none !important;
	width: 300px;
	height: 5px;
	background: #ddd;
	border: none;
	border-radius: 3px;
}

input[type="range"]::-webkit-slider-thumb {
	-webkit-appearance: none;
	border: none;
	height: 30px;
	width: 30px;
	border-radius: 50%;
	background: white;
	margin-top: -12px;
}
.tuner{background-image: url("images/change.png");
	background-position:  center;
	background-repeat: no-repeat;
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
	outline:none;
	width:100%;
	max-width: 270px;
	height: 47px;
	cursor: pointer;
	padding: 0;
	border: none;
}

.back{
	background-image: url("images/back.png");
	background-position:  center;
	background-repeat: no-repeat;
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
	outline:none;
	width:100%;
	max-width: 97px;
	height: 47px;
	cursor: pointer;
	padding: 0;
	border: none;
}

.love{
	background-image: url("images/thumbup-watermark.png");
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
	border: none;
}

.hate{
	background-image: url("images/thumbdown-watermark.png");
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
	border: none;
}

.next {
	background-image: url("images/btn_skip.png");
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

.pause {
	background-image: url("images/btn_pause.png");
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

.play {
	background-image: url("images/btn_play.png");
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

.dropdown{
	color:#FFF;
	background: transparent;
	font-size: 16px;
	cursor: pointer;
}

option {
 	background-color:#072b5d;
    padding: 2px;
    opacity: .5;
	font-size: 16px;
	cursor: pointer;
}

.volslider{
    position: relative;
    margin-right: auto;
    margin-left: 32px;
    padding: 10px;
    background:transparent;
}


h1 {
	color:#fff;
}
h2 {
	color:#fff;
}
p { 
	color: #FFF;
}
body {
	vertical-align: middle;
	background:#072b5d;
}

div#overlay {
    display: none;
    z-index: 2;
    background: #072b5d;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    text-align: center;
}

div#specialBox {
    display: none;
    position: fixed;
    z-index: 3;
    margin: 150px auto 0px auto;
    width: auto;
    height: auto;
    background: #072b5d;
    color: #000;
    padding-left:0px;
    padding-top:24px;
    padding-bottom:24px;
    right: 0;
    left: 0;
    margin-right: auto;
    margin-left: auto;
}

div#wrapper {
	z-index : 1;
	position: absolute;
    top: 0;
	right: 0;
    left: 0;
    margin-right: auto;
    margin-left: auto;
}

</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
function mouseUp() {
document.getElementById("vol").click()
}
function changestation() {
document.getElementById("station").click()
}
var open = ""
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
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
    ajax.open("POST", "songinfo.txt", true); 
    ajax.send();
}, 1000);
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
<div id="specialBox" >
<h2 align="center">
<form action="change.php" onchange="changestation()" method="post">
 
<?php
echo '<select name="station" class="dropdown"> <option class="placeholder" disabled selected>'.$info[2].' </option>' ;
foreach($stations as $line) {
	echo '<option value="'. $line.'">'.$line.'</option>';
	}
echo '</select>';
 ?>
</BR><input style="visibility:hidden" id="station" type="submit">
</form>
</span>
<button onmousedown="toggleOverlay()" class="back"></button>
</div>

<div id="wrapper">
<h1 align="center"><?php echo ( $info[2] ); ?> </BR> </h1>
<h2 align="center">	
<button onmousedown="toggleOverlay()" class="tuner"></button>
<h3 align="center">
<form align="center" action="soundset.php" method="post">

<?php
$vol = file_get_contents( 'vol' );
echo '<input id="slider1" class="volslider" type="range" min="0" max="100" name="amount" onmouseup="mouseUp()" ontouchend="mouseUp()" value="'.$vol.'" />';
?>

<input style="visibility:hidden" type="submit" id="vol" name="submit" value="test" />
</form>
<input type=button onClick="location.href='hate.php'" align="center" class="hate">
<input type=button onClick="location.href='love.php'" align="center" class="love">

<?php
$play = file_get_contents( 'playctl' );
if ($play === "play") {?>
<input type=button onClick="location.href='play.php'" align="center" class="play">
<?php }elseif ($play === "pause") { ?>
<input type=button onClick="location.href='play.php'" align="center" class="pause">
<?php } ?>

<input type=button onClick="location.href='next.php'" align="center" class="next"></h3>
<h2 align="center"> <?php echo ( $info[1] ); ?>
: <?php echo ( $info[0] ); ?> </BR></h2>
<h3 align="center"><img src=<?php echo ( $info[4] ) ?> alt="pandora" height="250" width="250" align="middle"></BR></h3>

</div>

</html>
