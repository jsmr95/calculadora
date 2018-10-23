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
        const PAR = ['op'=>'+', 'op1'=>'0', 'op2'=>'0'];
        $error = [];
        $op1 = $op2 = $op = null;



        //si nos llega vacio $_GET, aplicamos valores por defecto
        if (empty($_GET)) {
            //creamos los valores por defecto desde el array PAR (que hemos aprovechado)
            extract(PAR);
            // $op1 = '0';
            // $op2 = '0';
            // $op = '+';

            //Si la difrencia de GET PAR es vacio Y la diferencia de PAR GET es vacio tb es que
            //no hay nada en GET que no este en PAR
        } elseif (empty(array_diff_key($_GET, PAR)) && empty(array_diff_key(PAR, $_GET))){
            //Trimeamos los valores
            $_GET = array_map('trim', $_GET);

            extract($_GET, EXTR_IF_EXISTS);
            //HACE LO MISMO QUE ABAJO, CREA LAS VARIABLES
            //PERO SOLO SI EXISTEN, DEBEN DE EXISTIR
            // $op1 = trim($_GET['op1']);
            // $op2 = trim($_GET['op2']);
            // $op = trim($_GET['op']);
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

    if (empty($error)): ?> <!--Miramos si no hay errores, para luego calcular.-->
        <h3>Resultado: <?= calcula($op1, $op2, $op) ?></h3> <!--Calculamos -->
    <?php else:
        foreach ($error as $err): ?> <!--Si hay algun error, no se calcula y se muestran los errores -->
        <h3>Error: <?= $err ?></h3>
    <?php endforeach;
    endif;  ?>
    </body>
</html>
