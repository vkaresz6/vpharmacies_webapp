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
$sql = "INSERT INTO psw (user_id, psw) VALUES (?, ?);";
$stmt = $con -> prepare($sql);
$stmt -> bind_param("is", $user_id, $pwd );
$stmt -> execute();
if (isset($_POST['pharmacies'])) {
    $pharmacy = $_POST['pharmacies'];
}
else
{
    $pharmacy = 0;    
}
$sql = "INSERT INTO users_data (user_id, TAJ, Adress, Phone, Email, Comment, IsEmployedAt) VALUES (?, ?, ?, ?, ?, ?, ?);";
$stmt = $con -> prepare($sql);
$temp = "o";
$stmt -> bind_param("isssssi", $user_id, $TAJ, $Adress, $temp, $temp,$temp, intval($pharmacy) );
$stmt -> execute();
$sql = "INSERT INTO user_roles (user_id, role) VALUES (?, ?);";
$role;
if (isset($_POST['pharmacies'])) {
    $role = 2;
}
 else {
     $role = 0;
}
$stmt = $con -> prepare($sql);

$stmt -> bind_param("ii", $user_id, $role);

$stmt -> execute();
printHTML('html/reg-succes.html');
printHTML('html/header.html');
printHTML('html/footer.html');
$con -> close();
?>