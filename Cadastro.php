<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="page">
    <form action="ProcessaCadastro.php" method="post" class="formLogin">
       <h1>Página de cadastro</h1> 
<label for="Nome">Nome :</label>
<input type="text" name="Nome"><br>
<label for="Email">Email :</label>
<input type="text" name="Email"><br>
<label for="Cpf">CPF :</label>
<input type="text" name="Cpf"><br>
<label for="Senha">Senha :</label>
<input type="password" name="Pass"><br>
<a href="Login.php">Clique aqui se já possui uma conta</a>
<br>
<input type="submit" value="Cadastrar" class="btn" /><br>
</div>

<script>
    document.querySelector('.formLogin').addEventListener('submit', function(event) {
    var nome = document.querySelector('input[name="Nome"]').value;
    var email = document.querySelector('input[name="Email"]').value;
    var cpf = document.querySelector('input[name="Cpf"]').value;
    var senha = document.querySelector('input[name="Pass"]').value;

    if (!nome || !email || !cpf || !senha) {
        alert('Por favor, preencha todos os campos.');
        event.preventDefault();
    }
});
</script>

<?php

if(isset($_GET["erro"]) && $_GET["erro"]==1)
{?>    <div style="background-color: red;">EMAIL INVÁLIDO</div>


<?php
}

if(isset($_GET["erro"]) && $_GET["erro"]== 2)
{?>   
 <div style="background-color: red;">A SENHA DEVE TER PELO MENOS 8 CARACTERES</div>
    <?php
}
?>

       </form>
    </body>
</html>