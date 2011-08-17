<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery</title>
<style type="text/css">
.podrobnosti {
	font-size:15px;
}
#pokazi {
	width:140px;
	height:100px;
	border:thin;
	border-color:#000;
}

</style>
<script src="jquery.js"></script>

<script type="text/javascript">


$(document).ready(function(){
   $("#pokazi").hide();
   $(".podrobnosti").click(function(event){
	
	 $('#pokazi').show("slow");
	  $(".podrobnosti").click(function(event){
	 $('#pokazi').hide("slow");
	 event.preventDefault();
   });
   });
   
});
</script>
</head>

<body>
<div class="podrobnosti">


<a href=#>jQuery</a>

<div id="pokazi">
Ta tekst se nej bi skril.
</div>
</div>



</body>
</html>