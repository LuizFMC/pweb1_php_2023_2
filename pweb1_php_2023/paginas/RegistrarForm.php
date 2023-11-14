
<?php
include './header.php';
include '../db.class.php';

    $db = new DB();
    $db->conn();


    if($_POST){
        
    $db->insert("usuario", $_POST);
      //  var_dump($_POST);
      header("location: UsuarioList.php");

    }
?>

<h3>Formulário Registrar Usuario</h3>

<form action="UsuarioForm.php" method="post">
<input type="hidden" name="id"
    value="<?php echo !empty($usuario->id) ? $usuario->id:" "?>"><br>

    <label for="nome">Nome</label><br>
    <input type="text" name="nome" ><br>
    

    <label for="cpf">CPF</label><br>
    <input type="text" name="cpf"><br>

    <label for="cpf">Email</label><br>
    <input type="email" name="email"><br>

    <label for="cpf">Senha</label><br>
    <input type="password" name="senha"><br>

    <label for="cpf">Confirmar Senha</label><br>
    <input type="password" name="c_senha"><br>

<button type ="submit">Salvar</button>
<a href="LoginForm.php"> Voltar </a>

</form>
<?php include './footer.php' ?>