<?php

function selected($op1,$op2){
    return $op1 == $op2 ? "selected" : "";
}

function calcula($op1, $op2, $op){
    $res = '';
    switch ($op) {
        case '+':
        $res = $op1 + $op2;
        break;
        case '-':
        $res = $op1 - $op2;
        break;
        case '*':
        $res = $op1 * $op2;
        break;
        case '/':
        $res = $op1 / $op2;
        break;
    } ?>
    <h3>Resultado: <?= $res ?></h3>
<?php }

function formulario($op1, $op2, $op, $ops)
{ ?>
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
            <?php foreach ($ops as $o): ?>
                 <option value="<?= $o ?>" <?= selected($op,$o) ?>>
                     <?= $o ?>
                 </option>
            <?php endforeach; ?>
        </select>
        <br /><br />
        <input type="submit" value="Calcular" >
    </form> <?php
}
