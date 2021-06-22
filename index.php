
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
            require './php/template/editform.php';
        }
        elseif($url === 'subscribeform') {
            require './php/form_conditions/subscribeform.php';
        }
        elseif($url === 'loginform') {
            require './php/form_conditions/loginform.php';
        }
        elseif($url === 'logout') {
            require './php/form_conditions/logout.php';
        }
        else
        {
            require './php/template/404.php';
        }


    ?>  
