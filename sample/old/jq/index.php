<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
	<link href="jquery/css/ui-darkness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
	<script src="jquery/js/jquery-1.8.3.js"></script>
	<script src="jquery/js/jquery-ui-1.9.2.custom.js"></script>
</head>
<body>

<input type="text" id="dd" />
<div id="tb">
<ul>
<li><a href="#tabs-1" id="cicks">Nunc tincidunt</a></li>
<li><a href="#tabs-2">Proin dolor</a></li>
<li><a href="#tabs-3">Aenean lacinia</a></li>
<li><a href="#tabs-3">asdasd lacinia</a></li>
<li><a href="#tabs-3">asd lacinia</a></li>
<li><a href="#tabs-3">Aeneadasdn lacinia</a></li>
</ul>
<div id="tabs-1">
<p>SLEEPING ZALDY</p>
</div>
<div id="tabs-2">
<p>JAYVEE</p>
</div>
<div id="tabs-3">
<p>
GRACE
</p>
</div>
</div>
	<div id="clickdrop">
    THIS IS LIST
        <ul style="background:#03F; width:50px;" id="drop">
            <li>list 1</li>
            <li>list 3</li>
            <li>list 2</li>
            <li>list 5</li>
        </ul>
    </div>
    
    <div id="accordion">
    <h3>Section 1</h3>
        <div>
            <p>
            	SHOW ME
            </p>
        </div>
     <h3>Section 2</h3>
        <div>
            <p>
            	SHOW ME TO
            </p>
        </div>
    </div>
<script>
	$("#dd").datepicker();
	$("#tb").tabs();
	$("#accordion").accordion();
	$("body").css("background","gray");
	//$("#tb").slideUp().slideToggle();
	$("div #tabs-1").hide();
	/*$("#cicks").click(function(){
			$("div #tabs-1").slideDown();
		});*/
	$("#drop").hide();
	$("#clickdrop").bind("click",function(e){			
			$("#drop").slideDown();
	});
		
		
	
</script>
</body>
</html>