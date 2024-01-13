<?php

// vogliamo creare una funzione che controlli la caratteristiche di una password inserita da un utente
// deve avere piu di 8 caratteri, deve avere almeno un carattere speciale,
// deve avere almeno un carattere maiuscolo, deve avere almeno un carattere numerico

//restituisce true se le regole sono rispettate, false altrimenti



function checkPassword(string $password)
{
    $check = false;


    $check = checkSpecial($password) && checkLength($password) && checkNumeric($password) && checkUppercase($password);


    if ($check) {
        echo "Password appropriata \n";
        return true;
    }
    echo "password troppo semplice \n";
    return false;
}

function checkLength(string $password)
{

    if (strlen($password) >= 8) {
        return true;
    }

    return false;
}

function checkNumeric(string $password)
{
    for ($i = 0; $i < strlen($password); $i++) {
        if (is_numeric($password[$i])) {
            return true;
        }
    }
    return false;
}

function checkUppercase(string $password)
{
    for ($i = 0; $i < strlen($password); $i++) {
        if (ctype_upper($password[$i])) {
            return true;
        }
    }

    return false;
}

function checkSpecial(string $password)
{
    $special = [
        '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '£',
        '_', '+', '=', '{', '}', '[', ']', ';', ':', '<', '>', ',', '.', '?', '/'
    ];
    for ($i = 0; $i < strlen($password); $i++) {
        if (in_array($password[$i], $special)) {
            return true;
        }
    }

    return false;
}

do {
    $password = readline('Inserisci una password sicura: ');
} while (!checkPassword($password));
