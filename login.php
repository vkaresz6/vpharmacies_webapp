<?php
require_once('config/init.php');

if (!empty($_POST['username']) && (!empty($_POST['password']))){
    if (isset($_SESSION['loginError'])){
        unset($_SESSION['loginError']);
    }
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $sql = "SELECT * FROM users a, psw b WHERE a.id = b.user_id AND (a.username = ? AND b.psw = ?) ";
    $stmt = $con -> prepare($sql);
    $stmt -> bind_param('ss',$username, $pwd);
    $stmt -> execute();
    $stmt -> store_result();
        
    if ($stmt -> num_rows == 1){
        //belépett
        $stmt -> bind_result($id, $username);
        $stmt -> fetch();
        //dd($id);
       
        $_SESSION['fid'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        header('Location: index.php');
    } else {
        //sikertelen a belépés
        $_SESSION['loginError'] = "Helytelen belépési adatok!";
        
    }
    
}
printHTML('html/header.html');
if(!empty($_SESSION['loginError'])){
    echo '<h3 class="text-center text-danger">'.$_SESSION['loginError'].'</h3>';
    unset($_SESSION['loginError']);
}
printHTML('html/login_form.html');
printHTML('html/footer.html');
$con -> close();