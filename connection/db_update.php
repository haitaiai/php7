<?php

include_once "db_connect.php";

$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, SET desemail = :PASSWORD WHERE idusuario =:ID");

//TODO Create a method to receive the data to be alter and create the variables

$stmt->bindParam("LOGIN", $login);
$stmt->bindParam("PASSWORD", $password);
$stmt->bindParam("ID", $id);

$stmt->execute();

//TODO Test if already exists a email or a login

?>