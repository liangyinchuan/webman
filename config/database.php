<?php

return [
// 默认数据库
'default' => 'mysql',
    // 各种数据库配置
    'connections' => [

        'mysql' => [
            'driver'      => 'mysql',
            'host'        => '192.168.1.65',
            'port'        => 3306,
            'database'    => 'webman',
            'username'    => 'root',
            'password'    => 'liangyc1990',
            'unix_socket' => '',
            'charset'     => 'utf8',
            'collation'   => 'utf8_general_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ],

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => '',
            'prefix'   => '',
        ],

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => '127.0.0.1',
            'port'     => 5432,
            'database' => 'webman',
            'username' => 'webman',
            'password' => '',
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
            'sslmode'  => 'prefer',
        ],

        'sqlsrv' => [
            'driver'   => 'sqlsrv',
            'host'     => 'localhost',
            'port'     => 1433,
            'database' => 'webman',
            'username' => 'webman',
            'password' => '',
            'charset'  => 'utf8',
            'prefix'   => '',
        ],
    ],
];