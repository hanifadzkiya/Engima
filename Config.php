<?php
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
return array(
    'servername' => $_ENV["DB_SERVERNAME"],
    'username' => $_ENV["DB_USERNAME"],
    'password' => $_ENV["DB_PASSWORD"]
);