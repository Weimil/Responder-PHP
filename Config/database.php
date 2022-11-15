<?php

//return [
//    'default' => [
//        'protocol' => 'mysql',
//        'host' => '',
//        'port' => '',
//        'dbname' => '',
//        'username' => '',
//        'password' => ''
//    ]
//];


return [
    'default' => 'mysql',
    
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'data',
            'username' => 'user',
            'password' => '',
            'options' => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ]
        ]
    ]
];
