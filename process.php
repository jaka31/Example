<?php
//v bistvu je tole kar sem tukaj naredu chatbox....
function getMessage() {
	echo "Ne dobim povezave";
}
$ime=$_POST['ime'];
$priimek=$_POST['priimek'];
$email=$_POST['mail'];
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