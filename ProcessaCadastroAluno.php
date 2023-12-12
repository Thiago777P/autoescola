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

$NomeA = $_POST["NomeA"];
$CpfA = $_POST["CpfA"];
$DataA = $_POST["DataA"];
$EnderecoA = $_POST["EnderecoA"]; 
$TelefoneA = $_POST["TelefoneA"];


$sql = "insert into alunos (nome, cpf, data_nascimento, endereco, telefone) values('$NomeA', $CpfA,  '$DataA', '$EnderecoA', $TelefoneA)";
$con->executar($sql);





header('Location: CadastroAlunos.php?acao=1');


?>
