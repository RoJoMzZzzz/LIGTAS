<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>
<!DOCTYPE html>
<html>
<head>
	<title>LIGTAS</title>
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="user.css" type="text/css" media="screen">

	<link rel="shortcut icon" type="image/png" href="images/logo.png">

</head>
<body>
<script src="jquery/jqueryAjax.js">

$('.iframe-full-height').on('load', function(){
    this.style.height=this.contentDocument.body.scrollHeight +'px';
});</script>
<script type="text/javascript">
	

	function change1(){
		document.getElementById('tab1').style.borderBottom = "2px solid #188110";

		document.getElementById('tab1').style.outline = "none";

		document.getElementById('tab2').style.borderBottom = "0px";

		document.getElementById('tab3').style.borderBottom = "0px";

		document.getElementById('tab4').style.borderBottom = "0px";
	}

	function change2(){
		document.getElementById('tab1').style.borderBottom = "0px";

		document.getElementById('tab2').style.borderBottom = "2px solid #188110";

		document.getElementById('tab2').style.outline = "none";

		document.getElementById('tab3').style.borderBottom = "0px";

		document.getElementById('tab4').style.borderBottom = "0px";
	}

	function change3(){
		document.getElementById('tab1').style.borderBottom = "0px";

		document.getElementById('tab2').style.borderBottom = "0px";

		document.getElementById('tab3').style.borderBottom = "2px solid #188110";

		document.getElementById('tab3').style.outline = "none";

		document.getElementById('tab4').style.borderBottom = "0px";
	}

	function change4(){
		document.getElementById('tab1').style.borderBottom = "0px";

		document.getElementById('tab2').style.borderBottom = "0px";

		document.getElementById('tab3').style.borderBottom = "0px";

		document.getElementById('tab4').style.borderBottom = "2px solid #188110";

		document.getElementById('tab4').style.outline = "none";
	}

</script>

<script type="application/javascript">

function resizeIFrameToFitContent( iFrame ) {

    iFrame.width  = iFrame.contentWindow.document.body.scrollWidth;
    iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
}

window.addEventListener('DOMContentReady', function(e) {

    var iFrame = document.getElementById( 'iFrame1' );
    resizeIFrameToFitContent( iFrame );

    // or, to resize all iframes:
    var iframes = document.querySelectorAll("iframe");
    for( var i = 0; i < iframes.length; i++) {
        resizeIFrameToFitContent( iframes[i] );
    }
} );

</script>

<div class="header">

<a href="map.php" target="iframeA"><button class="tab1" id="tab1" onClick="change1()"></button></a>


<a href="post.php" target="iframeA"><button class="tab2" id="tab2" onClick="change2()"></button></a>
	
<a href="#"><button class="tab3" id="tab3" onClick="change3()"></button></a>

<a href="account.php" target="iframeA"><button class="tab4" id="tab4" onClick="change4()"></button></a>


</div>


<iframe id="iFrame1" name="iframeA" height="535px" style="border-bottom:0px solid" width="100%" src="map.php" frameborder="0" scrolling="auto" class="iframe-full-height"></iframe>





</body>
</html>