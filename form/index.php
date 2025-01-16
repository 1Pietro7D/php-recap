<?php
// Ottieni il percorso richiesto (esempio: /form, /salva, /leggi)
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Ottieni il metodo HTTP (esempio: GET, POST)
$method = $_SERVER['REQUEST_METHOD'];

// Router semplice
if ($uri === '' || $uri === 'form') {
    // Servi il file form.html
    require 'form.html';

} elseif ($uri === 'salva' && $method === 'POST') {
    if (!empty($_POST)) {
    // Includi ed esegui la logica di salva_numero.php
    echo "Dati ricevuti in POST:";
    print_r($_POST);
    require 'salva_numero.php';
    } else {
        echo "Nessun dato inviato in POST.";
    }

} elseif ($uri === 'leggi' && $method === 'GET') {
    // Servi il file leggi_numero.php
    require 'leggi_numero.php';

} else {
    // Gestione delle richieste non valide
    http_response_code(404);
    echo "<h1>404 - Pagina non trovata</h1>";
    echo "<p>La richiesta <strong>'$uri'</strong> non è valida.</p>";
}
?>
