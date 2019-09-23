<?php
require_once __DIR__ .'/../Model/AccessToken.php';

$access_token = new AccessToken();
$access_token->createTable();
$access_token->add("0d8607ef-9336-4546-86a2-eb24e76676b4");
