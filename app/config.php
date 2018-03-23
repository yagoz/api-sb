<?php

return [
    'database' => [
        'name' => 'project',
        'username' => 'root',
        'password' => 'qubit',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ],
    'apikey' => 'scatchbling'
];