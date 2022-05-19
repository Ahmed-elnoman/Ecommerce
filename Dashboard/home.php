<?php

    session_start();
    if(isset($_SESSION['Username'])){
        
        $TitlePags = 'Admin';
        include 'ins.php';

        
        include $Templates . 'footer.php';

    }else {
        header('Location:index.php');
        exit();
    }