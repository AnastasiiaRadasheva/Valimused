<?php

$servernimi = 'localhost';
$kasutajanimi = 'nastjavalik';
$parool='12345';
$andmebaasinimi = 'nastjavalik';
$connect = new mysqli($servernimi, $kasutajanimi, $parool, $andmebaasinimi);
$connect->set_charset("utf8");