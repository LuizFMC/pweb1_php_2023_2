<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Olá <?php echo $_SESSION['usuario']->nome ?>, bem vindo ao sistema!</h3>
    <br><br><a href="AlunoList.php">Aluno</a>
</body>
</html>