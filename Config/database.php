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
    // 'connections.mysql.driver' => 'mysql'
    'connections' => [
        'default' => 'mysql',
    
        'mysql' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => 33060,
            'database' => 'responder-testing',
            'username' => 'weimil',
            'password' => 'Aa1.1234',
            'options' => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ]
        ]
    ]
];
