<?php


define('DB_HOST', 'localhost'); 
define('DB_USER', 'root');     
define('DB_PASS', '');         
define('DB_NAME', 'Enciclopedia'); 


function connect_db() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    
    $conn->set_charset("utf8");

    return $conn; 
}

?>