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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="Index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="CadastroCarros.php">Carros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="CadastroAlunos.php">Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Agendamentos.php">Agendamentos</a>
        </li>
        <a class="btn btn-primary" href="Logout.php" role="button">SAIR</a>
      
      </ul>
    </div>
  </div>
</nav>

<form action="ProcessaAgendamentos.php" method="POST">
  <label for="aluno_id">Selecione o aluno:</label>
  <select id="aluno_id" name="aluno_id">
    <?php
    require_once('Conexao.php'); // Incluindo o arquivo da classe de conexão
    
    $conexao = new Conexao(); // Criando uma instância da classe de conexão
    
    // Consulta para obter os alunos da tabela alunos
    $queryAlunos = "SELECT id, nome FROM alunos";
    $resultAlunos = $conexao->executar($queryAlunos);
    
    if ($resultAlunos) {
        foreach ($resultAlunos as $aluno) {
            echo "<option value='" . $aluno['id'] . "'>" . $aluno['id'] . " - " . $aluno['nome'] . "</option>";
        }
    } else {
        echo "<option value=''>Nenhum aluno encontrado</option>";
    }
    ?>
  </select><br><br>

  <label for="carro_id">Selecione o carro:</label>
  <select id="carro_id" name="carro_id">
    <?php
    // Consulta para obter os carros disponíveis
    $queryCarrosDisponiveis = "SELECT id, marca, modelo, placa FROM carros WHERE id NOT IN (SELECT carro_id FROM agendamentos WHERE data_aula = '$dataAula' AND horario_aula = '$horarioAula')";
    $resultCarros = $conexao->executar($queryCarrosDisponiveis);
    
    if ($resultCarros) {
        foreach ($resultCarros as $carro) {
            echo "<option value='" . $carro['id'] . "'>" . $carro['id'] . " - " . $carro['marca'] . " " . $carro['modelo'] . " - Placa: " . $carro['placa'] . "</option>";
        }
    } else {
        echo "<option value=''>Nenhum carro disponível para este horário</option>";
    }
    
    ?>
  </select><br><br>

  <label for="data_aula">Data da aula:</label>
  <input type="date" id="data_aula" name="data_aula"><br><br>

  <label for="horario_aula">Horário da aula:</label>
  <input type="time" id="horario_aula" name="horario_aula"><br><br>

  <input type="submit" value="Agendar">
  <?php

if(isset($_GET["acao"]) && $_GET["acao"]==1)
{?>    <div style="background-color: green;">AGENDAMENTO CADASTRADO COM SUCESOS !!!</div>


<?php
}
?>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>        
</body>
</html>