<?php
    session_start();
    session_destroy();

    $_SESSION['message'] = "Vous êtes bien déconnecté, à bientôt !";
    header('Location: http://localhost/my-cave/');