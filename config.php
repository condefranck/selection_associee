<?php
    $host = "localhost";
    $user = "root";
    $bdd = "selection";
    $passwd  = "";

    // Connexion au serveur
    mysql_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
    mysql_select_db($bdd) or die("erreur de connexion a la base de donnees");
?>