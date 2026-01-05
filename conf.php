<?php
$servernimi = 'd141140.mysql.zonevs.eu';
$kasutajanimi = 'd141140_nastja0';
$parool='MnbvcxZ1Asa22';
$andmebaasinimi = 'd141140_baasphp';
$connect = new mysqli($servernimi, $kasutajanimi, $parool, $andmebaasinimi);
$connect->set_charset("utf8");
/*
kasutame kohalik arvuti
$servernimi = 'localhost';
$kasutajanimi = 'nastjaTUNT';
$parool='12345';
$andmebaasinimi = 'nastjatunt';
$connect = new mysqli($servernimi, $kasutajanimi, $parool, $andmebaasinimi);
$connect->set_charset("utf8");
*/