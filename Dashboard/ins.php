<?php

        // Connect With Databaeses
    include 'connect.php';

        // R
    $Templates  = 'Includes/Templates/';
    $Func       = 'Includes/Function/';
    $css        = 'Designs/css/';
    $js         = 'Designs/js/';

        // File Includes
    include  $Func . 'function.php';
    include 'Includes/Leugs/en.php';        
    include $Templates . 'haeder.php';

        // IF Navbar is set
    if(!isset($onNavbars)){
        include $Templates . 'navbar.php';
    }