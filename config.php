<?php
 define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME' , 'root');
define('DB_PASSWORD' ,'');
define('DB_NAME', 'demo2');


//connection with database
$link = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);


//check connection
if($link === false){
die("ERROR: could not connect". mtsqli_connect_error());
}
?>