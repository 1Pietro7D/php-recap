<?php
function fibonacciRicorsivo($n) {
    if ($n <= 1) {
        return $n; // Caso base: F(0) = 0, F(1) = 1
    }
    return fibonacciRicorsivo($n - 1) + fibonacciRicorsivo($n - 2);
}

// Esempio di utilizzo
$termine = 10; // Termini da calcolare
echo "Fibonacci ricorsivo:\n";
for ($i = 0; $i < $termine; $i++) {
    echo fibonacciRicorsivo($i) . " ";
}
?>

<?php
function fibonacciIterativo($n) {
    if ($n <= 1) {
        return $n; // Caso base
    }

    $a = 0; // F(0)
    $b = 1; // F(1)

    for ($i = 2; $i <= $n; $i++) {
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }

    return $b;
}

// Esempio di utilizzo
$termine = 10; // Termini da calcolare
echo "Fibonacci iterativo:\n";
for ($i = 0; $i < $termine; $i++) {
    echo fibonacciIterativo($i) . " ";
}
?>
