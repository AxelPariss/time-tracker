<?php

$dbhost = '';
$dbname = '';
$dbuser = '';
$dbpswd = '';

// PDO Connection
$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8', $dbuser, $dbpswd);

