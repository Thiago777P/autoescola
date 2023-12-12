<?php
session_start();
include_once "Conexao.php";
$con = new Conexao();

// Verificar se a sessão está iniciada e se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    // O usuário não está logado, redirecione para a página de login com erro=2
    header('Location: Login.php?erro=2');
    exit();
}

// Buscar dados dos alunos
$alunos = $con->executar("SELECT * FROM alunos");

// Buscar dados dos carros
$carros = $con->executar("SELECT * FROM carros");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos e Carros</title>
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

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Alunos</h2>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Data de nascimento</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <!-- Adicione outros campos dos alunos conforme necessário -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $aluno) { ?>
                        <tr>
                            <td><?= $aluno["id"] ?></td>
                            <td><?= $aluno["nome"] ?></td>
                            <td><?= $aluno["cpf"] ?></td>
                            <td><?= $aluno["data_nascimento"] ?></td>
                            <td><?= $aluno["endereco"] ?></td>
                            <td><?= $aluno["telefone"] ?></td>
                          
                            <!-- Adicione outras colunas conforme necessário -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col">
          <br>
          <br>
          <br>
            <h2>Carros</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Placa</th>
                        <th>Capacidade de passageiros</th>
                        <!-- Adicione outros campos dos carros conforme necessário -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carros as $carro) { ?>
                        <tr>
                            <td><?= $carro["id"] ?></td>
                            <td><?= $carro["marca"] ?></td>
                            <td><?= $carro["modelo"] ?></td>
                            <td><?= $carro["ano"] ?></td>
                            <td><?= $carro["placa"] ?></td>
                            <td><?= $carro["capacidade_passageiros"] ?></td>
                            <!-- Adicione outras colunas conforme necessário -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
