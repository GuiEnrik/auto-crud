<?php
$mysql_host = "";
$mysql_user = "";
$mysql_password = "";
$mysql_database = "";

if (!mysql_connect($mysql_host, $mysql_user, $mysql_password)) {
    echo "Não foi possível conectar ao mysql";
    exit;
}

echo "<pre>\n";

$sql_tabelas = "SHOW TABLES FROM $mysql_database";
$tabelas = mysql_query($sql_tabelas);

if (!$tabelas) {
    echo "Erro, não foi possivel listar as tabelas do banco\n";
    echo "Erro MySQL: " . mysql_error();
    exit;
}

while ($row_tabelas = mysql_fetch_row($tabelas)) {
    echo "TABELA: {$row_tabelas[0]}\n";

    $sql_colunas = "DESCRIBE ". $row_tabelas[0];

    mysql_query("USE ".$mysql_database);

    $colunas = mysql_query($sql_colunas);

    if (!$colunas) {
        echo "Erro, não foi possivel listar as colunas da tabela\n";
        echo "Erro MySQL: " . mysql_error();
        exit;
    }
    while($row_colunas = mysql_fetch_array($colunas)) {
        echo "{$row_colunas['Field']} - {$row_colunas['Type']}\n";
    }

    echo "\n";

}

echo "</pre>\n";

mysql_free_result($result);
?>
