<?php
require_once('config/init.php');
if (!empty($_POST['username']) && (!empty($_POST['password']))){
    if (isset($_SESSION['loginError'])){
        unset($_SESSION['loginError']);
    }
}
printHTML('html/header.html');
printHTML('html/reg_form.html');
printHTML('html/footer.html');
$con -> close();
?>