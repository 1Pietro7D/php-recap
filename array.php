<?php
function cercaValore($array, $chiave) {
    // Controlla se la chiave esiste nell'array
    if (array_key_exists($chiave, $array)) {
        return $array[$chiave];
    } else {
        return "La chiave '$chiave' non esiste.";
    }
}

// Esempio di utilizzo
$arrayAssociativo = [
    "nome" => "Mario",
    "cognome" => "Rossi",
    "età" => 30,
    "città" => "Roma"
];

$chiaveDaCercare = "città";
echo cercaValore($arrayAssociativo, $chiaveDaCercare); // Output: Roma
?>


<?php
function cercaValoreIterativo($array, $chiave) {
    foreach ($array as $k => $v) {
        if ($k === $chiave) {
            return $v; // Valore trovato
        }
    }
    return "La chiave '$chiave' non esiste."; // Chiave non trovata
}

// Esempio di utilizzo
$arrayAssociativo = [
    "nome" => "Mario",
    "cognome" => "Rossi",
    "età" => 30,
    "città" => "Roma"
];

$chiaveDaCercare = "età";
echo cercaValoreIterativo($arrayAssociativo, $chiaveDaCercare); // Output: 30
?>

<?php
function cercaValoreAnnidato($array, $chiave) {
    foreach ($array as $k => $v) {
        if ($k === $chiave) {
            return $v; // Valore trovato
        } elseif (is_array($v)) {
            // Cerca ricorsivamente negli array annidati
            $risultato = cercaValoreAnnidato($v, $chiave);
            if ($risultato !== null) {
                return $risultato;
            }
        }
    }
    return "La chiave '$chiave' non esiste."; // Chiave non trovata
}

// Esempio di utilizzo
$arrayAssociativo = [
    "nome" => "Mario",
    "dati" => [
        "cognome" => "Rossi",
        "età" => 30
    ],
    "città" => "Roma"
];

$chiaveDaCercare = "età";
echo cercaValoreAnnidato($arrayAssociativo, $chiaveDaCercare); // Output: 30
?>


<?php
function cercaValoreAnnidato2($array, $chiave) {
    // Controllo se la chiave esiste direttamente nell'array
    if (array_key_exists($chiave, $array)) {
        return $array[$chiave];
    }

    // Iterazione per cercare in array annidati
    foreach ($array as $v) {
        if (is_array($v)) {
            $risultato = cercaValoreAnnidato2($v, $chiave);
            if ($risultato !== "La chiave '$chiave' non esiste.") {
                return $risultato;
            }
        }
    }

    // Se la chiave non è stata trovata
    return "La chiave '$chiave' non esiste.";
}

// Esempio di utilizzo
$arrayAssociativo = [
    "nome" => "Mario",
    "dati" => [
        "cognome" => "Rossi",
        "età" => 30,
        "indirizzo" => [
            "via" => "Via Roma",
            "numero" => 10
        ]
    ],
    "città" => "Roma"
];

// Test con diverse chiavi
echo cercaValoreAnnidato2($arrayAssociativo, "città") . "\n"; // Output: Roma
echo cercaValoreAnnidato2($arrayAssociativo, "età") . "\n";   // Output: 30
echo cercaValoreAnnidato2($arrayAssociativo, "via") . "\n";   // Output: Via Roma
echo cercaValoreAnnidato2($arrayAssociativo, "email") . "\n"; // Output: La chiave 'email' non esiste.
?>
