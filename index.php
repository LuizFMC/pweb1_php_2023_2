<?php
    include './db.class.php';
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
    <?php
    $db = new DB ();
    $db->conn();

    $dados = $db->select("aluno1");
    
    $dadosAluno = [
        'Nome'=>"Luiz",
        'CPF'=>"5550000300",
        'Telefone'=>"49 8800-5500",

    ];
    $db->insert("aluno1",$dadosAluno);
    ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($dados as $item){
        echo "<tr>";
        echo "<th scope='row'>$item->id</th>";
        echo "<td>$item->Nome</td>";
        echo "<td>$item->CPF</td>";
        echo "<td>$item->Telefone</td>";
        echo "</tr>";
    }
    ?>
  </tbody>
</table>

</body>
</html>