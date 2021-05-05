<?php
require_once 'App.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Request-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");

App::main();