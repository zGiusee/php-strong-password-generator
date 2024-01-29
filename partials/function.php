<?php
function generatePassword($pass_length)
{
    // Richiamo la funzione dei 4 caratteri obbligatori e le assegno ad una variabile
    $required4 = random4();

    // Insieme di tutte le stringhe di caratteri
    $allChar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890?!.,/[]{}()&@#';

    // Recupero la lunghezza della stringa che contiene tutti i caratteri
    $allCharLeng = strlen($allChar) - 1;

    // Creo un array che conterra i caratteri non obbligatori
    $password = [];


    for ($i = 0; $i < ($pass_length - 4); $i++) {
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
