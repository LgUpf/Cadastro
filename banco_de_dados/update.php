<?php
session_start();
include_once './conexao.php';
$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome' ,FILTER_SANITIZE_SPECIAL_CHARS);
$email    = filter_input(INPUT_POST,'email' ,FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST,'telefone' ,FILTER_SANITIZE_NUMBER_INT);
$endereco = filter_input(INPUT_POST,'endereco' ,FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST,'bairro' ,FILTER_SANITIZE_SPECIAL_CHARS);
$cidade = filter_input(INPUT_POST,'cidade' ,FILTER_SANITIZE_SPECIAL_CHARS);


$queryUpdate = $link->query("update tb_clientes set nome = '$nome', email = '$email', telefone = '$telefone', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade'  where id='$id'");
$affected_rows = mysqli_affected_rows($link);
if ($affected_rows > 0):
    header("Location:../consultas.php");
endif;
?>  