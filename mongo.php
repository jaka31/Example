<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	width:200px;
}





</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mongo</title>
</head>

<body>

<div>
<form method="post">
Ime:<input type="text" name="ime" autofocus required /><br />
Priimek:<input type="text" name="priimek" autofocus required /><br />
Email: <input type="email" name="mail" /><br /><br />
<input type="submit" value="Pošlji" /><br />
</form>
</div>

<?php
//v bistvu je tole kar sem tukaj naredu chatbox....
function getMessage() {
	echo "Ne dobim povezave";
}
$ime=$_POST['ime'];
$priimek=$_POST['priimek'];
$email=$_POST['email'];
$date=time();


if ($_POST['ime']!=="" and $_POST['priimek']!=="") {
//naredi in se poveži z bazo imenovano baza
try {
$a = new Mongo();
} 
catch (Exception $e) {
	echo $e->getMessage();
}
$db = $a->baza;

//izberi zbirko
$collection = $db->ljudje;
//dodaj zapis
$obj = array("datum" => $date, "name" => $ime, "priimek" => $priimek,"email" => $email, "cas" => date('d.m.y \o\b H:i:s'));
$collection->insert($obj);
}

else {
	echo "<b>Vnesite podatke v polji!</b>";
}


//najdi vse zapise
$trije = $collection->find();

echo "<div id='vpisi'>";
echo "<br>Zadnji trije vpisi v bazo so: <br><br>";
$trije->limit(3)->sort(array('datum'=>-1));

foreach ($trije as $obj) {
	echo '<div id="vnos">Ime: ' . "<b>".$obj['name'] . "</b><br>Priimek: <b>".  $obj['priimek']. '</b><br>Email: ' . '<i>' . $obj['email']. '</i>' . '<br>Vnos je bil potrjen ' . '<b>' . $obj['cas'] . '</b><br></div>';
}
echo "</div>";

?>


</body>
<footer><p>To je v nogi.</p></footer>
</html>