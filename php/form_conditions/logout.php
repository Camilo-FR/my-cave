<?php

    session_start();
    
    
    $_SESSION['message'] = "Vous êtes bien déconnecté, à bientôt !";
    header('Location: http://localhost/my-cave/#nav');

    session_destroy();