

<?php





function printHTML($html) {
    echo file_get_contents($html);
}

function isLogged() {
    if (!empty($_SESSION['fid'])) {
        return true;
    } else {
        return false;
    }
}

function printMenu() {
    $menu = file_get_contents('Html/menu.html');
    if (isLogged()) {
        
        $menu = str_replace('::ki_belepes',
                    '<li class="nav-item"> <a class="nav-link text-light" href="gyogyszereim.php">Gyógyszereim </a></li>'
                .   '<li class="nav-item"> <a class="nav-link text-light" href="chat.php">Chat</a></li>'
                 
                . '</ul></div>'
                . '<div class="navbar-collapse">'
                    . '<ul class="navbar-nav ml-auto">'
                        . '<span class="nav-link text-warning">'.$_SESSION['username'].'</span>'
                        . '<li class="nav-item"> <a class="nav-link text-light" href="logout.php"> Kilép</a> </li>'
                    . '</ul>'
                . '</div>', $menu);
    } else {
        $menu = str_replace('::ki_belepes', '<li class="nav-item">  <a class="nav-link text-light" href="login.php">Belép</a> </li>', $menu);
    }
    
    echo $menu;
}

