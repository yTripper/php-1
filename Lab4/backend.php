<?php

if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];


    $result = evaluateExpression($expression);

    echo json_encode(array('result' => $result));
} else {
    echo json_encode(array('error' => 'No expression provided'));
}

function evaluateExpression($expression) {
    $tokens = preg_split('/([\+\-\*\/\(\)])/', $expression, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

    $rpn = infixToRPN($tokens);

    $result = evaluateRPN($rpn);

    return $result;
}

function infixToRPN($tokens) {
    $output = array();
    $stack = array(); 

    $precedence = array(
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2
    );

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $output[] = $token;
        } elseif ($token == '(') {
            $stack[] = $token;
        } elseif ($token == ')') {
            while ($stack && end($stack) != '(') {
                $output[] = array_pop($stack);
            }
            array_pop($stack);
        } else {
            while ($stack && end($stack) != '(' && $precedence[$token] <= $precedence[end($stack)]) {
                $output[] = array_pop($stack);
            }
            $stack[] = $token;
        }
    }

    while ($stack) {
        $output[] = array_pop($stack);
    }

    return $output;
}

function evaluateRPN($tokens) {
    $stack = array();

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $stack[] = $token;
        } else {
            $operand2 = array_pop($stack);
            $operand1 = array_pop($stack);

            switch ($token) {
                case '+':
                    $stack[] = $operand1 + $operand2;
                    break;
                case '-':
                    $stack[] = $operand1 - $operand2;
                    break;
                case '*':
                    $stack[] = $operand1 * $operand2;
                    break;
                case '/':
                    if ($operand2 != 0) {
                        $stack[] = $operand1 / $operand2;
                    } else {
                        return "Error: Division by zero";
                    }
                    break;
            }
        }
    }

    return $stack[0]; // Результат находится на вершине стека
}

?>
