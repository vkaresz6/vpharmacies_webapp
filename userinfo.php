<?php
require_once('config/init.php');

if(!isLogged()){
    $_SESSION['loginError'] = "Információ megtekintéséhez be kell jelentkezni";   
    header('Location: login.php');
    die();
}

$fid = $_SESSION['fid'];
$sql = "SELECT * FROM user WHERE id = $fid";
$res = $con -> query($sql);
if (!$res){
    die('Hiba a lekérdezés végrehajtásában!');

}

$content = '<div class="card-deck">';
while ($row = $res -> fetch_assoc()){        
    $content .= '<div class="card">'
            . '<img class="w-25 card-image-top " src="'.$row['utvonal'].$row['filenev'].'">'
            . '<div class="card-body">'
            . '<h2 class="card-title">'.$row['vezeteknev'].' '.$row['keresztnev'].'</h2>'
            . '<p> '.$row['username']     
            . '<p> '.$row['email']           
            . '</div>'                           
            . '</div>';
}
$content .='</div>';
    

printHTML('html/header.html');
printMenu();
echo '<div class="container"><p>';
echo $content;
echo '</div">';
printHTML('html/footer.html');

$con -> close();

