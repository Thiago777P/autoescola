<html> 
    <head></head>
    <body>
        

<?php
include_once "Conexao.php";
$con = new Conexao();

$Nome = $_POST["Nome"];
$Email = $_POST["Email"];
$Senha = $_POST["Pass"];
$Cpf = $_POST["Cpf"];



if(strpos($Email,"@") === false)
{
    header("Location: Cadastro.php?erro=1");
}
else if(strlen($Senha) < 8)
{
    header("Location: Cadastro.php?erro=2");
}
else
{    
    echo"Cadastro realizado com sucesso<br>";?><button><a href="Login.php">-------FAZER LOGIN-------</a></button><?php
    $sql = "insert into gerenciadores (Nome, Email, Cpf, Senha) values('$Nome', '$Email', $Cpf, '$Senha')";
    $con->executar($sql);
}

?>
</body>
 </html>