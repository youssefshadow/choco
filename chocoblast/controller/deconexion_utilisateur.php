<?php
    //supprimer la session
    session_unset();
    session_destroy();
    //redirection
    header('Location: ./');
?>