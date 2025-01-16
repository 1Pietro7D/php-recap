<?php
$globale = "Sono globale";

function test() {
    global $globale;
    echo $globale; // OK
}
test();

?>

<!-- In PHP, il simbolo :: è noto come Operatore di risoluzione dell'ambito (o Scope Resolution Operator).
Viene utilizzato per accedere a metodi e proprietà statiche, costanti di classe, o per fare riferimento
a metodi e proprietà definite in una classe o in un parent. -->

<?php

// 1. Proprietà e metodi statici
// Quando una proprietà o un metodo è dichiarato come static, 
// puoi accedervi direttamente senza creare un'istanza della classe, utilizzando ::.

class Test {
    public static $variabileStatica = "Valore statico";

    public static function metodoStatico() {
        return "Questo è un metodo statico!";
    }
}

// Accesso senza creare un'istanza
echo "<h3> 1. Proprietà e metodi statici </h3>";
echo Test::$variabileStatica; // Output: Valore statico
echo Test::metodoStatico();   // Output: Questo è un metodo statico!
?>

<?php
// 2. Costanti di classe
// Puoi utilizzare :: per accedere a costanti definite in una classe.

class Test2 {
    const COSTANTE = "Valore costante";
}

// Accesso alla costante
echo "<h3> 2. Costanti di classe </h3>";
echo Test2::COSTANTE; // Output: Valore costante
?>

<?php
// 3. Fare riferimento alla classe genitore
// Puoi utilizzare parent:: per accedere a metodi o costanti della classe padre da una classe figlia.

class ParentClass {
    public static function metodoParent() {
        return "Metodo della classe genitore";
    }
}

class ChildClass extends ParentClass {
    public static function metodoChild() {
        return parent::metodoParent() . " chiamato dalla classe figlia";
    }
}
echo "<h3> 3. Fare riferimento alla classe genitore </h3>";
echo ChildClass::metodoChild();
// Output: Metodo della classe genitore chiamato dalla classe figlia
?>

<?php
// 4. Utilizzo con self::
// Puoi usare self:: per fare riferimento a proprietà, metodi o costanti della classe attuale.

class Test3 {
    const COSTANTE = "Valore dalla classe attuale";

    public static function metodo() {
        return self::COSTANTE; // Si riferisce alla costante della stessa classe
    }
}
echo "<h3> 4. Utilizzo con self:: </h3>";
echo Test3::metodo(); // Output: Valore dalla classe attuale
?>

<?php
// 5. Accesso ai metodi di un'istanza con :: (Tard Static Binding)
// Quando utilizzi static:: in una classe, consenti il cosiddetto Tard Static Binding, 
// che fa riferimento alla classe effettiva (non necessariamente alla classe in cui è definito il metodo).

class ParentClass2 {
    public static function chiSono() {
        return static::class;
    }
}

class ChildClass2 extends ParentClass2 {}
echo "<h3>  5. Accesso ai metodi di un'istanza con :: (Tard Static Binding) </h3>";
echo ParentClass2::chiSono(); // Output: ParentClass
echo ChildClass2::chiSono();  // Output: ChildClass
?>

<!-- 
Riepilogo
Utilizzo	            Significato
ClassName::property	    Accesso a una proprietà statica di una classe.
ClassName::method()	    Chiamata a un metodo statico di una classe.
ClassName::CONSTANT	    Accesso a una costante definita nella classe.
parent::method()	    Accesso a un metodo o una proprietà nella classe genitore.
self::property/method	Accesso a una proprietà o un metodo della stessa classe.
static::method()	    Tard Static Binding: risoluzione dinamica della classe chiamante per i metodi o proprietà. 
-->