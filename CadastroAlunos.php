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

<form action="ProcessaCadastroAluno.php" method="post" class="formCarro">
  <div class="mb-3">
    <label for="exampleInputNome" class="form-label">Nome :</label>
    <input type="text" class="form-control" id="exampleInputNome" aria-describedby="emailHelp" name="NomeA">
  </div>
  <div class="mb-3">
    <label for="exampleInputCPF" class="form-label">CPF :</label>
    <input type="text" class="form-control" id="exampleInputCPF" name="CpfA" pattern="[0-9]+">
    <div id="numerosHelp" class="form-text">Apenas números. Ex: 11122233344.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputDate" class="form-label">Data de nascimento :</label>
    <input type="date" class="form-control" id="exampleInputAno" aria-describedby="emailHelp"  name="DataA">
  </div>
  <div class="mb-3">
    <label for="exampleInputEndereco" class="form-label">Endereço :</label>
    <input type="text" class="form-control" id="exampleInputEndereco" aria-describedby="emailHelp" name="EnderecoA" >
  </div>
  <div class="mb-3">
    <label for="exampleInputTelefone" class="form-label">Telefone :</label>
    <input type="text" class="form-control" id="exampleInputPassageiros" aria-describedby="emailHelp" pattern="[0-9]+" name="TelefoneA">
    <div id="numerosHelp" class="form-text">Apenas números. Ex: 34991075617</div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
<?php

if(isset($_GET["acao"]) && $_GET["acao"]==1)
{?>    <div style="background-color: green;">Aluno CADASTRADO COM SUCESOS !!!</div>


<?php
}
?>


</form>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>




<?php
?>