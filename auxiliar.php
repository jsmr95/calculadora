<?php

function selected($op1,$op2){
    return $op1 == $op2 ? "selected" : "";
}

function comprueba($op1, $op2, $op){
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
        }

    ?>
    <h3>Resultado: <?= $res ?></h3>
<?php }
