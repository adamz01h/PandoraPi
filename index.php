<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$stations = file( 'station.txt' );
$info = file( 'songinfo.txt' );
?>
<style>
select > .placeholder{
    display: none;
}

.tuner{background-image: url("/images/change.png");
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
border: none;}

.back{background-image: url("/images/back.png");
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
<div id="specialBox" >
<h2 align="center">
<form action="change.php" method="post">
 <?php
echo '<select name="station"> <option class="placeholder" disabled selected>'.$info[2].' </option>' ;
foreach($stations as $line) {
  echo '<option value="'. $line.'">'.$line.'</option>';
}
echo '</select>';
 ?>
</BR><input type="submit">
</form>
</span>
<button onmousedown="toggleOverlay()" class="back"></button>
</div>

<div id="wrapper">
<h1 align="center"> Station: <?php echo ( $info[2] ); ?> </BR> </h1>
<h2 align="center">
<button onmousedown="toggleOverlay()" class="tuner"></button>
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
