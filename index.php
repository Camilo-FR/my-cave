
<?php

require_once('php/connect/connect.php');

        $url = $_GET['url'] ?? '';
        
        
        if($url === '' || $url === 'home') {
            require './php/template/home.php';
        }
        else
        {
            require './php/template/404.php';
        }


    ?>  
