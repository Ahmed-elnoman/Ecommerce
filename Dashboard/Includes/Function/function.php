<?php 

    // Function Get Title Fo Pages

    function GetTitle() {

        global $TitlePags;

        if(isset($TitlePags)){
            
            echo $TitlePags;
        }
        else{
            echo 'ERROR';
        }

    }