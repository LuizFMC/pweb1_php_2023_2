<?php
include './header.php';
include '../db.class.php';

    $db = new DB();
    $db->conn();

    
   if($_POST){

    if($_POST['senha'] === $_POST['c_senha']){

      $_POST['senha'] = password_hash($_POST['senha'],PASSWORD_BCRYPT);
      unset($_POST['c_senha']);
    
    $db->insert("usuario", $_POST);
    header("location: LoginForm.php");
   
  
    } 
else{
    echo "<b style = 'color:red;'>As senhas não conhecidem</b>";
  }
   }
   



?>

<h2>Sistema academico</h2>
<h3>Formulário registrar usuario</h3>

<form action="RegistrarForm.php" method="post">

  <label for="nome">Nome</label><br>
  <input type="text" name="nome"><br>
 
    <label for="email">Email</label><br>
    <input type="email" name="email"><br>

    <label for="cpf">CPF</label><br>
    <input type="text" name="cpf"><br>

    <label for="senha">Senha</label><br>
    <input type="password" name="senha"><br>

    <label for="c_senha">Confirmar Senha</label><br>
    <input type="password" name="c_senha"><br>

   

<button type ="submit">Salvar</button>

</form>
<?php include './footer.php' ?>