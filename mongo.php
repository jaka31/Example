<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php


?>

<style type="text/css">
#vpisi {
	margin-left:auto;
	margin-right:auto;
}

#vnos {
	border-color:#00F;
	border-style:solid;
	border-width:thin;
	margin-bottom:10px;
	margin-left:20px;
	margin-top:10px;
	width:250px;
}





</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mongo</title>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		
			submitHandler: function(form) {
				// do other stuff for a valid form
				$.post('process.php', $('#obrazec').serialize(), function(data) {
					$('#results').html(data);
				});
			}
		});
	
	</script>
</head>

<body>

<div>
<form method="POST" id="obrazec" name="obrazec">
Ime:<input type="text" name="ime" autofocus required /><br />
Priimek:<input type="text" name="priimek" required /><br />
Email: <input type="email" name="mail" /><br /><br />
<input type="submit" value="Pošlji" /><br />
</form>
</div>
<div id="results"><div>


</body>
<footer><p>To je v nogi in je lepo.</p></footer>
</html>