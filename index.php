<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        require './auxiliar.php';

        $op1 = isset($_GET['op1']) ? trim($_GET['op1']) : '0';
        $op2 = isset($_GET['op2']) ? trim($_GET['op2']) : '0';
        $op = isset($_GET['op']) ? trim($_GET['op']) : '+';
         ?>
        <form action="" method="get">
            <label for="op1">Primer operando:</label>
            <input id="op1" type="text" name="op1" value="<?= $op1 ?>">
            <br /><br />
            <label for="op2">Segundo operando:</label>
            <input id="op2" type="text" name="op2" value="<?= $op2 ?>">
            <br /><br />
            <label for="op">Operacion:</label>
            <select id="op" name="op">
              <option value="+">+</option>
              <option value="-">-</option>
              <option value="*">*</option>
              <option value="/">/</option>
            </select>
            <br /><br />
            <input type="submit" value="Calcular" >
        </form>
        <?php

        if ($op1 == "" || $op2 == "") {
            mostrarError('Debe proporcionar los dos operandos correctamente.');
        } else {
          if (!is_numeric($op1) || !is_numeric($op2)) {
            mostrarError('Los operandos deben ser números.');
        } else {
          if (!$op == '+' || !$op == '-' || !$op == '*' || !$op == '/') {
            mostrarError('La operación debe ser: + - * /');
          } else {
            comprueba($op1, $op2, $op);
            }
          }
        }
                ?>

    </body>
</html>
