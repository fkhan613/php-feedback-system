<?php
define('DB_HOST', 'sql201.epizy.com');
define('DB_USER', 'epiz_31947149');
define('DB_pass', 'monaxDMLx5');
define('DB_NAME', 'epiz_31947149_php_dev');

//create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_pass, DB_NAME);

//check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
