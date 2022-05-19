<?php

    function lo( $ons) {

        static $los =array (
                // NAVBAR EN - ARE
            'HOME' => 'Home',
            'CATEGORTES' => 'Catogerys',
            'ITEMS'      => 'Items',
            'MEMBER'     => 'Members',
            'STATISTICS' => 'Statistics',
            'LOGS'       => 'Logs',
            'ADMIN'      => 'Admin'
        );

        return $los[$ons];

    }
