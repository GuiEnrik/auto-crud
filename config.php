<?php
$dbHost = 'nome_seu servidor'; //host
$dbName = 'nome_do_seu banco'; //nome banco
$dbUser = 'seu_usuario'; //usuario
$dbPasw = 'sua_senha'; //senha
try {
    $dbConn = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPasw);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>