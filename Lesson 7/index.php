<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Калькулятор</title>
</head>
<body>
    <form action="test.php" method="get">
        <fieldset>
            <label for="quantity">Количество примеров</label>
            <input type="number" id="quantity" name="quantity" min="0" max="10" value="<?php echo $quantity ?>" required>
            <button type="submit">OK</button>
        </fieldset>
    </form>
</body>
</html>