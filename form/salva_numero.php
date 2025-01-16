<?php
// Verifica se la richiesta è POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera il numero dal form
    $numero = $_POST['numero'];

    // Verifica se è un numero valido
    if (is_numeric($numero)) {
        // Scrivi il numero nel file contatore.txt (sovrascrive il contenuto precedente)
        file_put_contents('contatore.txt', $numero);

        // Conferma l'operazione all'utente
        echo "<h1>Numero salvato con successo!</h1>";
        echo "<p>Il numero <strong>$numero</strong> è stato scritto nel file.</p>";
        echo '<a href="/">Torna al modulo</a>';
    } else {
        echo "<h1>Errore!</h1>";
        echo "<p>Il valore inserito non è un numero valido.</p>";
        echo '<a href="/">Torna al modulo</a>';
    }
} else {
    echo "<h1>Accesso non valido!</h1>";
    echo "<p>Usa il form per inviare un numero.</p>";
    echo '<a href="/">Torna al modulo</a>';
}
?>
