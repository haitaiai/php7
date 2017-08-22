<?php

include_once "connection/db_connect.php";

spl_autoload_register(function($className) {

    $fileName = "connection" . DIRECTORY_SEPARATOR . $className . ".php";

    if(file_exists($fileName)) {
        include_once $fileName;
    }
});

?>