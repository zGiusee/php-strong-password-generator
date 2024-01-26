<?php
include './partials/function.php';

if (isset($_GET['pass_lenght']) && ($_GET['pass_lenght'] >= 4)) {

    // Recupero il valore inserito dall'utente
    $pass_lenght = $_GET['pass_lenght'];

    $password = generatePassword($pass_lenght);
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-strong-password-generator</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <main>
        <h3 class="p-4">Generatore di password sicure, inserisci qua sotto la lunghezza desiderata per la password</h3>
        <div class="p-4">
            <form action="./index.php" method="get">
                <label for="pass_lenght">lunghezza desiderata:</label>
                <input type="text" name="pass_lenght" id="pass_lenght">
                <button class="mx-2" type="submit">Genera la tua password!</button>
            </form>
        </div>
        <div>

            <h5 class="p-4">La tua password è: <?php echo ($_GET['pass_lenght'] <= 3) ? 'La password che hai inserito è troppo corta!' : $password ?></h5>
        </div>
    </main>
</body>

</html>