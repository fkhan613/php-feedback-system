<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'farhan');
define('DB_pass', '123456');
define('DB_NAME', 'php_dev');

//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_pass, DB_NAME);