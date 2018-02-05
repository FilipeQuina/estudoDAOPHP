<?php

require_once("config.php");
/*
$root = new Usuario();
$root->loadbyId(3);
echo $root;

$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);

$lista =  Usuario::getList();
echo json_encode($lista);
$search = Usuario::search("ro");
echo json_encode($search);

$usuario = new Usuario();
$usuario->login("user","123456");
echo $usuario;
*/
$usuario = new Usuario();
$usuario->login("3","123456");
echo $usuario;



?>