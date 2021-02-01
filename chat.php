<?php
require_once('config/init.php');
function printmsg()
{
    $con = new mysqli('localhost','root','','vpharmacies_database','3306');
    if ($con -> errno){
    die('Nem sikerült csatlakozi az adatbázishoz!');
}
    if (!$con ->set_charset('utf8')){
    echo 'A karakterkódolás beállísa sikertelen!';
}
       if (isset($_POST['msg'])) {
       $msgtosave = $_SESSION['username'] . " :  " . $_POST['msg'] . "  " . date("Y/m/d") . " " . date("h:i:sa");
       $sql = "INSERT INTO messagestoph (message, user_id, ph_id) VALUES (?,?,?);";
       $stmt = $con -> prepare($sql);
       $nullphid = 0;
       $stmt ->bind_param('sii', $msgtosave, $_SESSION['fid'], $nullphid);
       $stmt -> execute();
       header("chat.php");
       }
       $u_id = $_SESSION['fid'];
    $query = "SELECT message FROM messagestoph WHERE user_id = $u_id ORDER BY id DESC LIMIT 15";

    $result = mysqli_query($con, $query);
    echo("<div id = \" chatcontent \">");
    while ($row = mysqli_fetch_assoc($result)) {
    echo("<p>" . $row['message'] ); 
   }
   echo("</div>");



}
printHTML('html/header.html');
printMenu();
printmsg();
printHTML('html/chat.html');
printHTML('html/footer.html');
    
$con -> close();

    
?>
