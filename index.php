<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        require './auxiliar.php';
        const OP = ['+', '-', '*', '/'];
        const PAR = ['op', 'op1', 'op2'];
        $error = [];
        $op1 = $op2 = $op = null;

        $par = array_keys($_GET);
        sort($par);
        if (empty($_GET)) {
            $op1 = '0';
            $op2 = '0';
            $op = '+';
        } elseif ($par == PAR) {
            $op1 = trim($_GET['op1']);
            $op2 = trim($_GET['op2']);
            $op = trim($_GET['op']);
        } else {
            $error[] = 'Los parámetros enviados no son los correctos.';
        }

        $res = '';

        if (empty($error)){
            //Comprobación de valores:
            if (!is_numeric($op1)) {
                $error[] = 'El primer operando no es un número.';
            }
            if (!is_numeric($op2)) {
                $error[] = 'El segundo operando no es un número.';
            }
            if (!in_array($op,OP)) {
                $error[] = 'El operador no es válido.';
            }
        }
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
                <!-- Esto añade tantas opciones como operaciones hay en el array OP -->
                <?php foreach (OP as $o): ?>
                     <option value="<?= $o ?>" <?= selected($op,$o) ?>>
                         <?= $o ?>
                     </option>
                <?php endforeach; ?>
            </select>
            <br /><br />
            <input type="submit" value="Calcular" >
        </form>
    <?php
    if (empty($error)):
    comprueba($op1, $op2, $op);
    else:?>
    <?php foreach ($error as $err): ?>
        <h3>Error: <?= $err ?></h3>
    <?php endforeach; ?>
    <?php endif;  ?>

    </body>
</html>
