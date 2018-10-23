<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        require './auxiliar.php';
        //definimos variables y constantes
        const OP = ['+', '-', '*', '/'];
        const PAR = ['op', 'op1', 'op2'];
        $error = [];
        $op1 = $op2 = $op = null;

        $par = array_keys($_GET);
        sort($par);
        //si nos llega vacio $_GET, aplicamos valores por defecto
        if (empty($_GET)) {
            $op1 = '0';
            $op2 = '0';
            $op = '+';
        //miramos si lo que nos llegar por GET son exclusivamente esos tres.
        } elseif ($par == PAR) {
            $op1 = trim($_GET['op1']);
            $op2 = trim($_GET['op2']);
            $op = trim($_GET['op']);
        } else {
          //Si no llega vacio y llega algo que no es op,op1 y op2, añadimos error.
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
    //mostramos el formulario
    formulario($op1,$op2,$op, OP);

    if (empty($error)): //Miramos si no hay errores, para luego calcular.
    calcula($op1, $op2, $op);
    else:
        foreach ($error as $err): ?> <!--Si hay algun error, no se calcula y se muestran los errores -->
        <h3>Error: <?= $err ?></h3>
    <?php endforeach;
    endif;  ?>
    </body>
</html>
