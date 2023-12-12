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

$IdA = $_POST["aluno_id"]; // id do aluno
$IdC = $_POST["carro_id"]; // id do carro
$DataAula = $_POST["data_aula"];
$HorarioAula = $_POST["horario_aula"]; 



$sql = "insert into agendamentos (aluno_id, carro_id, data_aula, horario_aula) values('$IdA','$IdC', '$DataAula', '$HorarioAula')";
$con->executar($sql);





header('Location: Agendamentos.php?acao=1');


?>