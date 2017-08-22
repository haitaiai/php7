<?php

include_once "db_connect.php";

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :id");

//TODO Create a method to receive the data to be deleted and create the variables

$stmt->bindParam("ID", $id);

$stmt->execute();

//TODO Test if already exists a email or a login

?>