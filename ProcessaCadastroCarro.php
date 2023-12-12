<?php
session_start();
include_once "Conexao.php";
$con = new Conexao();

// Verifique se a sessão está iniciada e se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) 
{
    $Usuario = $_SESSION['nome']; 
}
else 
{
 // O usuário não está logado, redirecione para a página de login com erro=2
header('Location: Login.php?erro=2');
exit();
}

$Marca = $_POST["Marca"];
$Modelo = $_POST["Modelo"];
$Ano = $_POST["Ano"];
$Placa = $_POST["Placa"]; 
$Capacidade = $_POST["Capacidade"];


$sql = "insert into carros (marca, modelo, ano, placa, capacidade_passageiros) values('$Marca', '$Modelo', $Ano, '$Placa', $Capacidade)";
$con->executar($sql);





header('Location: CadastroCarros.php?acao=1');


?>
