<?php
/** @var integer $quantity */
$quantity = intval($_GET['quantity'] ?? 0);
function arithmeticExample()
{
    /** @var array $arithmeticOperators */
    $arithmeticOperators = ['+', '-', '*', '/'];
    /** @var integer $randOperator */
    $randOperator = array_rand($arithmeticOperators, 1);
    echo '(' . random_int(-100, 100) . ') ' .
        $arithmeticOperators[$randOperator] .
        ' (' .  random_int(-100, 100) . ') = ' .
        '<input type="number" style="max-width: 50px" required>' .
        '<br>';
}
for ($i = $quantity; $i > 0; $i--) {
    arithmeticExample();
}