<?php

if (isset($_GET['pass_lenght']) && ($_GET['pass_lenght'] >= 4)) {

    // Recupero il valore inserito dall'utente
    $pass_lenght = $_GET['pass_lenght'];

    function generatePassword($pass_lenght)
    {
        // Funzione che mi genera almeno 1 carattere per tipo
        function random4()
        {
            // Stringhe da cui prendere i caratteri
            $alphabet = 'abcdefghijklmnopqrstuvwxyz';
            $alphabetCaps = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $nums = '1234567890 ';
            $symbols = '?!.,/[]{}()&@#';

            // Funzione che mi recupera 1 carattere dalla stringa in combinazione con funzione randomica
            $required1 = substr($alphabet,  rand(0, strlen($alphabet) - 1), 1);
            $required2 = substr($alphabetCaps,  rand(0, strlen($alphabetCaps) - 1), 1);
            $required3 = substr($nums,  rand(0, strlen($nums) - 1), 1);
            $required4 = substr($symbols,  rand(0, strlen($symbols) - 1), 1);

            return $required1 . $required2 . $required3 . $required4;
        }

        // Richiamo la funzione dei 4 caratteri obbligatori e le assegno ad una variabile
        $required4 = random4();

        // Insieme di tutte le stringhe di caratteri
        $allChar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890?!.,/[]{}()&@#';

        // Recupero la lunghezza della stringa che contiene tutti i caratteri
        $allCharLeng = strlen($allChar) - 1;

        // Creo un array che conterra i caratteri non obbligatori
        $password = [];


        for ($i = 0; $i < ($pass_lenght - 4); $i++) {
            $password[] = $allChar[random_int(0, $allCharLeng)];
        };

        // Trasformo l'array in una stringa
        $password = implode($password);

        // Unisco i caratteri obbligatori con i caratteri non obbligatori in una stringa unica
        $final_pass = $password . $required4;

        // Eseguo uno shuffle finale della parola
        $final_pass = str_shuffle($final_pass);

        return $final_pass;
    }
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

            <h5 class="p-4">La tua password è: <?php echo ($_GET['pass_lenght'] <= 3) ? 'La password che hai inserito è troppo corta!' : generatePassword($pass_lenght) ?></h5>
        </div>
    </main>
</body>

</html>