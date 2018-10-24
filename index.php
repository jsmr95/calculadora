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

    //extraemos los parametros previamente comprobados, si no hay en GET, se ponen por defecto.
    extract(compruebaParametros(PAR, $error));

    if (empty($error)){
        //Comprobación de valores si NO hay errores hasta el momento:
        compruebaValores($op1, $op2, $op, OP, $error);
    }
    //mostramos el formulario
    formulario($op1,$op2,$op, OP);

    if (empty($error)){  //Miramos si no hay errores, para luego calcular.
        mostrarResultado($op1, $op2, $op);
    } else {
        mostrarErrores($error);
    }?>
    </body>
</html>
