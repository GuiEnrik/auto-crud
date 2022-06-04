<?php
include("config.php");
$cliente_cpf = $_GET['cliente_cpf'];
$sql = "DELETE FROM CLIENTE WHERE CLIENTE_CPF=:cliente_cpf";
$query = $dbConn->prepare($sql);
$query->execute(array(':cliente_cpf' => $cliente_cpf));
$dbConn = null;
header("Location: index.php");
?>