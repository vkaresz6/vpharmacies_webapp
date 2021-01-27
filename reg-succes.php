<?php
require_once('config/init.php');
if (!empty($_POST['username']) && (!empty($_POST['password']))){
    if (isset($_SESSION['loginError'])){
        unset($_SESSION['loginError']);
    }
}
$username = $_POST['username'];
$pwd = $_POST['password'];
$TAJ = $_POST['TAJ'];
$Adress = $_POST['adress'];
$role = $_POST['role'];
$pharmacies = $_POST['pharmacies'];
$user_id;
$sql = "INSERT INTO users (username) VALUES (?);";
$stmt = $con -> prepare($sql);
$stmt -> bind_param('s',$username);
$stmt -> execute();
$sql = "SELECT MAX(id) as max_id FROM users";  
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
$user_id = $row['max_id'];
echo($user_id);
$sql = "INSERT INTO psw (user_id, psw) VALUES (?, ?);";
$stmt = $con -> prepare($sql);
$stmt -> bind_param("is", $user_id, $pwd );
$stmt -> execute();
printHTML('html/header.html');
printHTML('html/footer.html');
$con -> close();
?>