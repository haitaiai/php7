<?php

include_once "db_connect.php";

$stmt = $conn->prepare("INSERT INTO tb_usuarios (desemail, deslogin, dessenha) VALUES (:EMAIL, :LOGIN, :PASSWORD)");

$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];

$stmt->bindParam("EMAIL", $email);
$stmt->bindParam("LOGIN", $login);
$stmt->bindParam("PASSWORD", $password);

$stmt->execute();

//TODO Test if already exists a email or a login

?>