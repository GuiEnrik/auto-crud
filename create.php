<?php
include_once("config.php");

$cliente_cpf = $_POST['in_ClienteCpf'];
$nome = $_POST['in_Nome'];
$endereco = $_POST['in_Endereco'];
$telefone = $_POST['in_Telefone'];

$sql = "INSERT INTO CLIENTE (CLIENTE_CPF,NOME,ENDERECO,TELEFONE) VALUES (:cliente_cpf,:nome,:endereco,:telefone)";
$query = $dbConn->prepare($sql);
$query->bindparam(':cliente_cpf', $cliente_cpf);
$query->bindparam(':nome', $nome);
$query->bindparam(':endereco', $endereco);
$query->bindparam(':telefone', $telefone);
$query->execute();
$dbConn = null;
header("Location: index.php");
?>