<?php
  include './header.php';
  include '../db.class.php';
?>
<?php
  $db = new DB();
  $db->conn();

  if(!empty($_POST['id'])){
    $usuario = $db->login("usuario",$_POST);

    if($usuario !== "Error"){
      $_SESSION['usuario'] = $usuario;
      header("location: Main.php");
    } else {
      echo "<b style='color:red'>Login e senha errado, por favor tente novamente</b>";
    }
  
  }
?>

    <h2>Sistema Acadêmico</h2>
    <h3>Login</h3>

    <form action="LoginForm.php" method="post">
      
        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf"><br>
    
        <label for="senha">Senha</label><br>
        <input type="password" name="senha"><br>
    

        <button for="submit">Logar</button><br>
        <a href="RegistrarForm.php"> Cadastrar-se </a>
      
    </form>
  <?php 
    include './footer.php';
  ?>