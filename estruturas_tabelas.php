<?php

$mysql_host = "";
$mysql_user = "";
$mysql_password = "";
$mysql_database = "";

if (!mysql_connect($mysql_host, $mysql_user, $mysql_password)) {
    echo "Não foi possível conectar ao mysql";
    exit;
}

echo "<pre>";

$sql = "SHOW TABLES FROM $mysql_database";
$result = mysql_query($sql);

if (!$result) {
    echo "Erro, não foi possivel listar as tabelas do banco\n";
    echo "Erro MySQL: " . mysql_error();
    exit;
}

while ($row = mysql_fetch_row($result)) {
    echo "TABELA: {$row[0]}\n";

    $sql2 = "DESCRIBE ". $row[0];

    mysql_query("USE ".$mysql_database);

    $result2 = mysql_query($sql2);

    if (!$result2) {
        echo "Erro, não foi possivel listar as colunas da tabela\n";
        echo "Erro MySQL: " . mysql_error();
        exit;
    }
    while($row2 = mysql_fetch_array($result2)) {
        echo "{$row2['Field']} - {$row2['Type']}\n";
    }

    echo "\n";

}

echo "</pre>";

mysql_free_result($result);
?>
