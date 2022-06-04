<table class="table table-striped">
    <tr>
        <th>Cliente CPF</th>
        <th>Nome</th>
        <th>Endereco</th>
        <th>Telefone</th>
        <th>Editar</th>
        <th>Apagar</th>
    </tr>

    <?php
    include_once("config.php");

    $result = $dbConn->query("SELECT * FROM CLIENTE ORDER BY NOME DESC");
    while($row = $result->fetch(PDO::FETCH_ASSOC)) { 
        echo "<tr>";
        echo "<td>".$row['CLIENTE_CPF']."</td>";
        echo "<td>".$row['NOME']."</td>";
        echo "<td>".$row['ENDERECO']."</td>";
        echo "<td>".$row['TELEFONE']."</td>";
        echo "<td><a href=\"index.php?cliente_cpf=".$row['CLIENTE_CPF']."\">EDITAR</a></td>";
        echo "<td><a href=\"delete.php?cliente_cpf=".$row['CLIENTE_CPF']."\">APAGAR</a></td>";
        echo "<tr>";
    }
    $dbConn = null;
    ?>

</table>