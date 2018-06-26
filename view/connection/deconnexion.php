<?php
session_start(); //Anche se distruggiamo la sessione bisogna inserire un sessionstart

//ora bisogna svuotare tutte le variabili di Sessione
$_SESSION =  array(); //Non mettiamo nulla per indicare che le variabili sono vuote

session_destroy();
header("Location: connect.php");

?>