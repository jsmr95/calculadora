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

        if (empty($error)){
            //Comprobación de valores si NO hay errores hasta el momento:
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

    formulario($op1,$op2,$op, OP);

    if (empty($error)):
    calcula($op1, $op2, $op);
    else:
        foreach ($error as $err): ?>
        <h3>Error: <?= $err ?></h3>
    <?php endforeach;
    endif;  ?>

    </body>
</html>
