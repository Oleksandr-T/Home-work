<?php
// Для проверки работы функции создал массив номеров банковских карт 
// (с пробелами в номере - валидные, без пробелов - невалидные)
/** @var array $arrayOfCardsNumbersForCheckFunction */
$arrayOfCardsNumbersForCheckFunction = [
    '3714 4963 5398 431',
    '3782 8224 6310 005',
    '5555 5555 5555 4444',
    '5105 1051 0510 5100',
    '4111 1111 1111 1111',
    '4012 8888 8888 1881',
    '1234567890',
    '4222222222222225',
    '5100000000000514',
    '4111110000000113',
    '5124990000000007'];
/** @var string $cardNumber */
$cardNumber = $arrayOfCardsNumbersForCheckFunction[array_rand($arrayOfCardsNumbersForCheckFunction, 1)];
// Для проверки валидности номера карты использовал оригинальный алгоритм Луна
// (https://ru.wikipedia.org/wiki/%D0%90%D0%BB%D0%B3%D0%BE%D1%80%D0%B8%D1%82%D0%BC_%D0%9B%D1%83%D0%BD%D0%B0)
function isValidCreditCard($bankingCardNumber) : bool
{
    // Цифры проверяемой последовательности нумеруются справа налево.
    /** @var string $bankingCardNumber */
    $bankingCardNumber = strrev(preg_replace('/[^\d]/','',$bankingCardNumber));
    /** @var integer $checkSum */
    $checkSum = 0;
    for ($i = 0, $j = strlen($bankingCardNumber); $i < $j; $i++) {
        // Цифры, стоящие на чётных местах, умножаются на 2. Так как индексация начинается с ноля, 
        // первым умножаем на 2 вторую цифру номера с индексом [1] и так далее [3][5][7].....  
        if (($i % 2) !== 0) {
            /** @var integer $multiplicationOfEvenNumbers */
            $multiplicationOfEvenNumbers = +$bankingCardNumber[$i] * 2;
            // Если в результате такого умножения возникает число больше 9, 
            // оно заменяется суммой цифр получившегося произведения — однозначным числом, то есть цифрой.
            if ($multiplicationOfEvenNumbers > 9)  $multiplicationOfEvenNumbers -= 9;
            // Все полученные в результате преобразования цифры складываются.            
            $checkSum = $checkSum + $multiplicationOfEvenNumbers;
        } else {
            // Цифры, оказавшиеся на нечётных местах, остаются без изменений.
            /** @var integer $oddNumbers */
            $oddNumbers = +$bankingCardNumber[$i];
            // Все полученные в результате преобразования цифры складываются.
            $checkSum = $checkSum + $oddNumbers;            
        }    
    }  
    // Если сумма кратна 10, то исходные данные верны.  
    return (($checkSum % 10) === 0);
}
if(isValidCreditCard($cardNumber)) {
    /** @var string $check */
    $check = 'True';
} else {
    $check = 'False';
} 
echo 'Card number: ' . $cardNumber . '<br/>';
echo 'Check: ' . $check;