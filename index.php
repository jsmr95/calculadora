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

    try{
    //extraemos los parametros previamente comprobados, si no hay en GET, se ponen por defecto.
    extract(compruebaParametros(PAR, $error));
    $array = compact(array_keys(PAR));

    //Comprobación de valores si NO hay errores hasta el momento:
    compruebaValores($array, OP, $error);
    //mostramos el formulario
    formulario($array, OP);
    mostrarResultado($array);
  } catch (Exception $e){
    mostrarErrores($error);
  }?>
    </body>
</html>
