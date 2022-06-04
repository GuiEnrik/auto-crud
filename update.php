<?php
include("conecta.php");

$cliente_cpf = $_POST['in_ClienteCpf'];
$nome = $_POST['in_Nome'];
$endereco = $_POST['in_Endereco'];
$telefone = $_POST['in_Telefone'];

$sql = "UPDATE CLIENTE SET CLIENTE_CPF=:cliente_cpf,NOME=:nome,ENDERECO=:endereco,TELEFONE=:telefone WHERE CLIENTE_CPF=:cliente_cpf";
$query = $dbConn->prepare($sql);
$query->bindparam(':cliente_cpf', $cliente_cpf);
$query->bindparam(':nome', $nome);
$query->bindparam(':endereco', $endereco);
$query->bindparam(':telefone', $telefone);
$query->execute();
$dbConn = null;
header("Location: index.php");

?>
