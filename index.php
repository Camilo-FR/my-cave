
<?php

require_once('php/connect/connect.php');

        $url = $_GET['url'] ?? '';
        
        
        if($url === '' || $url === 'home') {
            require './php/template/home.php';
        }
        elseif($url == 'connect')
        {
            require './php/connect/connect.php';
        }
        elseif($url == 'addform')
        {
            require './src/form/addform.php';
        }
        elseif(preg_match('/car\/([0-9]+)/', $url, $params))
        {
            require './src/template/detail.php';
        }
        else
        {
            require './src/template/404.php';
        }


    ?>  
