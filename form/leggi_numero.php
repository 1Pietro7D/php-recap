<?php
// Leggi il numero dal file contatore.txt
if (file_exists('contatore.txt')) {
    $numeroSalvato = file_get_contents('contatore.txt');
    echo "<h1>Numero salvato</h1>";
    echo "<p>L'ultimo numero salvato è: <strong>$numeroSalvato</strong></p>";
} else {
    echo "<h1>Nessun numero salvato</h1>";
    echo "<p>Il file contatore.txt non esiste.</p>";
}
echo '<a href="form">Torna al modulo</a>';
?>
