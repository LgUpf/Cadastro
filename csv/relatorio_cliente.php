<?php

require_once(__DIR__.'/banco_de_dados/conexao.php');

$fileName = "Relatorio de Cliente.csv";

header('Content-type: text/csv; charset=UTF-8');   
header('Content-Disposition: attachment; filename='.$fileName);   
header('Content-Transfer-Encoding: binary');
header('Pragma: no-cache');

function convertArray($array = [])
{
    $string = "";

    foreach($array as $index)
    {
        $string .= '"'.$index.'";';
    }

    return $string .= "\r\n";
}

$result = $link->query('SELECT * FROM `tb_clientes`;');
$count = $result->num_rows;

$out = fopen('php://output', 'w');

fwrite($out, convertArray(["Total de Clientes", $count]));
fwrite($out, convertArray([]));

fwrite($out, convertArray(["ID", "Nome", "E-mail", "Telefone", "Endereco", "Bairro", "Cidade"]));

if ($count > 0)
{
    while($row = $result->fetch_assoc())
    {
        fwrite($out, convertArray($row));
    }
}

fclose($out);

exit();