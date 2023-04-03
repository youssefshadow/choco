<?php
    include './utils/connectBdd.php';
    
    session_start();
   
    $url = parse_url($_SERVER['REQUEST_URI']);
   
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/chocoblast/':
            include './home.php';
            break;
         case '/chocoblast/createUser':
            include './controller/add_utilisateur.php';
            break;
            case '/chocoblast/connexion':
            include './controller/connexion_utilisateur.php';
            break; 
        case '/chocoblast/deconexion':
            include './controller/deconexion_utilisateur.php';
            break; 
        case '/chocoblast/show':
                include './controller/show_utilisateur.php';
                break;     
        case '/chocoblast/test':
            include './test.php';
            break;
        default:
            include './error.php';
            break;
    }
?>
