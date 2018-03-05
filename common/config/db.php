<?php
return [
    'db'=>[
        'class' => 'yii\db\Connection',  
        'dsn' => 'mysql:host=localhost;dbname=fais',
        'username' => 'fais',
        'password' => 'fais',
        'charset' => 'utf8',
        'tablePrefix' => 'tbl_',
    ],
    'procurementdb'=>[
        'class' => 'yii\db\Connection',  
        'dsn' => 'mysql:host=localhost;dbname=fais-procurement',
        'username' => 'fais',
        'password' => 'fais',
        'charset' => 'utf8',
        'tablePrefix' => 'tbl_',
    ],
    /*
    'inventorydb'=>[
        'class' => 'yii\db\Connection',  
        'dsn' => 'mysql:host=localhost;dbname=eulims_inventory',
        'username' => 'eulims',
        'password' => 'eulims',
        'charset' => 'utf8',
        'tablePrefix' => 'tbl_',
    ],*/
];