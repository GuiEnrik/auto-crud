<?php
    include_once("conecta.php");

    if(isset($_GET["cliente_cpf"])){
        $result = $dbConn->query("SELECT * FROM CLIENTE WHERE CLIENTE_CPF = ".$_GET["cliente_cpf"]);
        $dado = $result->fetch(PDO::FETCH_ASSOC);
        
        $cpf = $dado["CLIENTE_CPF"];
        $nome = $dado["NOME"];
        $endereco = $dado["ENDERECO"];
        $telefone = $dado["TELEFONE"];
    }


?>
<html>
<head>
    <title>Meu CRUD</title>
    <meta charset="utf-8">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="container">
<h1>CLIENTES</h1>
<form method='POST' role='form' action='<?=isset($_GET["cliente_cpf"])?"update.php":"create.php"?>'>
    <div class='form-group'>
        <label for='in_ClienteCpf'>Cliente CPF</label>
        <input name='in_ClienteCpf' <?=isset($_GET["cliente_cpf"])?"readonly":""?> required id='in_ClienteCpf' class='form-control' type='text' value='<?=isset($_GET["cliente_cpf"])? $cpf:""?>'>
    </div>
    <div class='form-group'>
        <label for='in_Nome'>Nome</label>
        <input name='in_Nome' required id='in_Nome' class='form-control' type='text' value='<?=isset($_GET["cliente_cpf"])? $nome:""?>'>
    </div>
    <div class='form-group'>
        <label for='in_Endereco'>Endereco</label>
        <input name='in_Endereco' required id='in_Endereco' class='form-control' type='text' value='<?=isset($_GET["cliente_cpf"])? $endereco:""?>'>
    </div>
    <div class='form-group'>
        <label for='in_Telefone'>Telefone</label>
        <input name='in_Telefone' required id='in_Telefone' class='form-control' type='text' value='<?=isset($_GET["cliente_cpf"])? $telefone:""?>'>
    </div>
    <div class='mt-2'>
    <input class="btn btn-success" name='btn_Submit' value='Salvar' type='submit' >
    </div>
</form>

<?php
include_once("read.php");
?>


</body>
</html>
