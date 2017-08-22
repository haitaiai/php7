<?php
include_once "config.php";


//$lista = User::getList();
//echo json_encode($lista);
//$login = User::search("vi");
//echo json_encode($login);

$login = new User();
$login->login("vitor.vinicius", "asd");
echo $login;

?>