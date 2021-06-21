
<?php

require('./php/connect/connect.php');
session_start();

        $url = $_GET['url'] ?? '';
        
        
        if($url === '' || $url === 'home') {
            require './php/template/home.php';
        }
        elseif($url === 'details') {
            require './php/template/details.php';
        }
        elseif($url === 'addform') {
            require './php/template/addform.php';
        }
        elseif($url === 'edit') {
            require './php/template/edit.php';
        }
        else
        {
            require './php/template/404.php';
        }


    ?>  
