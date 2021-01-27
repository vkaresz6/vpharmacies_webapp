<?php

require_once('config/init.php');

if (!isLogged()) {
    $_SESSION['loginError'] = "Információ megtekintéséhez be kell jelentkezni";
    header('Location: login.php');
    die();
}
$fid = $_SESSION['fid'];

$elemekSzama = 0;
$elemtol = 0;
$numRows = 0;
$maxOldal = 1;
$sort = "ASC";

//össz elemszám lekérése
$sql = 'SELECT * FROM beosztas WHERE userid = ' . $fid . '';

$result = $con->query($sql);

if ($result) {
    $numRows = $result->num_rows;
}



//AJAX küldte adatok
if (!empty($_POST['elemekSzama']) && !empty($_POST['oldal'])) {
    $elemekSzama = $_POST['elemekSzama'];
    $elemtol = ($_POST['oldal'] * $elemekSzama) - $elemekSzama;
    $maxOldal = ceil($numRows / $elemekSzama);
}

if (!empty($_POST['rendezes'])) {
    $sort = $_POST['rendezes'];
}



$date_now = date('Y-m-d');              //Aktuális dátum
$start_date = getFirsDay($date_now);    //hónap első napja
$stop_date = getLastDay($date_now);     //hónap utolsó napja    
//Beosztás adatok
//$sql = 'SELECT * FROM beosztas WHERE userid = '.$fid.' AND kezdesido > "'.$start_date.'" AND kezdesido < "'.increaseDateDay($stop_date, 1).'" ORDER BY kezdesido ASC';
$sql = 'SELECT * FROM beosztas WHERE userid = ' . $fid . ' ORDER BY kezdesido ' . $sort . ' LIMIT ' . $elemekSzama . ' OFFSET ' . $elemtol . '';
$res = $con->query($sql);
if (!$res) {
    die('Hiba a lekérdezés végrehajtásában!');
}

$content = '<table class="table table-bordered table-hover">'
        . '<thead class="thead-light">'
        . '<tr>'
        . '<th id="datum">Dátum</th>'
        . '<th>Kezdés</th>'
        . '<th>Vége</th>'
        . '<th>Munkaidő</th>'
        . '</tr>'
        . '</thead>';

while ($row = $res->fetch_assoc()) {
    $muszakKezdete = strtotime($row['kezdesido']);
    $muszakVege = strtotime($row['vegeido']);
    $mukaido = $muszakVege - $muszakKezdete;
    $content .= '<tr>'
            . '<td>' . date("Y.m.d", $muszakKezdete) . '</td>'
            . '<td>' . date("H:i", $muszakKezdete) . '</td>'
            . '<td>' . date("H:i", $muszakVege) . '</td>'
            . '<td>' . (($mukaido / 60) / 60) . '</td>'
            . '</tr>';
}
$content .= '</table>';

//echo $content;

$array = array(
    "content" => $content,
    "maxOldal" => $maxOldal
);

echo json_encode($array);
