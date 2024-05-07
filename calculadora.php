<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora em PHP</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="blocoPrincipal">
    <div class="titulo">
      <h3>Calculadora PHP</h3>
    </div><br>
    <form action="" method="GET">
      <label for="" class="titulo-2">Número 1</label>
      <input type="text" name="num1">
      <label for="">
        <select name="operador" id="">
          <option value="-" name="subtracao">-</option>
          <option value="+" name="soma">+</option>
          <option value="*" name="multiplicacao">*</option>
          <option value="/" name="divisao">/</option>
        </select>
      </label>
      <label for="" class="titulo-2">Número 2</label>
      <input type="text" name="num2"><br>
      <input type="submit" value="Calcular"><br>
      <textarea class="titulo largura">

        <?php

        $res = "";

        if (isset($_GET['num1'], $_GET['num2'], $_GET['operador'])) {
          $num1 = $_GET['num1'];
          $num2 = $_GET['num2'];
          $operador = $_GET['operador'];

        switch ($operador) {
          case '-':
            $resultado = $num1 - $num2;
            break;
          case '+':
            $resultado = $num1 + $num2;
            break;
          case '*':
            $resultado = $num1 * $num2;
            break;
          case '/':
            $resultado = $num1 / $num2;
            break;
        }

        $res = "$num1 $operador $num2 = $resultado";       
        
        session_start();

        if (!isset($_SESSION['historico'])) {
          $_SESSION['historico'] = array();
        }
        $_SESSION['historico'][] = $res;
      }

      echo $res;

    ?>


      </textarea>

      <form action="" method="GET">
        <input type="submit" value="Salvar">
        <input type="submit" value="Pegar Valores">
        <input type="submit" value="M">
        <input type="submit" value="Apagar Histórico">
      </form>
    </form><br>
    <div class="titulo">
      <h3>Histórico</h3>
    </div><br>
    <textarea name="" class="titulo largura" readonly>

      <?php

      if (isset($_SESSION['historico'])) {
        foreach ($_SESSION['historico'] as $operacao) {
          echo $operacao . "\n";
        }
      }

      ?>
    
    </textarea>
  </div>

  <?php




  ?>

</body>

</html>