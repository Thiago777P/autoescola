<html>
    <head>
    <link rel="stylesheet" href="style.css">
    
    <body>
        <div class="page" >
        <form action="ProcessaLogin.php" method="post" class="formLogin">
        <h1>LOGIN</h1>
            <label for="EMAIL">EMAIL :</label>
            <input type="text" name="Emailx"><br>
            <label for="SENHA">SENHA :</label>
            <input type="password" name="Senhax"><br>

            <input type="submit" value="Acessar" class="btn" /><br>
            <a href="Cadastro.php">Não possui uma conta?</a><br>
          
        </form>
        </div>
<?php
if(isset($_GET["erro"]) && $_GET["erro"]==1)
{?>    <div style="background-color: red;">EMAIL OU SENHA INCORRETO(S)</div>
<?php
}
if(isset($_GET["erro"]) && $_GET["erro"]==2)
{?>   
 <div style="background-color: red;">Inicie uma sessão</div>
    <?php
}
?>

<script>
    document.querySelector('.formLogin').addEventListener('submit', function(event) {
    var email = document.querySelector('input[name="Emailx"]').value;
    var senha = document.querySelector('input[name="Senhax"]').value;

    if (!email || !senha) {
        alert('Por favor, preencha todos os campos.');
        event.preventDefault();
    }
});
</script>

    </body>
</html>