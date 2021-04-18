<?php 
include_once 'conexao.php';

$querySelect = $link->query("select * from tb_clientes");
while ($registros = $querySelect->fetch_assoc()):
    $id = $registros['id'];
    $nome = $registros['nome'];
    $email = $registros ['email'];
    $telefone = $registros['telefone'];
    $endereco = $registros['endereco'];
    $bairro = $registros['bairro'];
    $cidade = $registros['cidade'];
    
    echo"<tr>";
    echo "<td>$nome</td><td>$email</td><td>$telefone</td><td>$endereco</td><td>$bairro</td><td>$cidade</td>";
    echo "<td><a href='editar.php?id=$id'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='banco_de_dados/delete.php?id=$id'><i class='material-icons'>delete</i></a></td>"; 
    echo "</tr>";  
endwhile;
?>
