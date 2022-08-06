<?php
    // Connexion à la base de données

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', 'root');
    }
    catch(Exception $e){
        die('Error : '.$e->getMessage());
    }
    $sqlQuery = "SELECT * FROM movies_list";
    $moviesStatement = $bdd->prepare($sqlQuery);
    $moviesStatement->execute();
    $movies = $moviesStatement->fetchAll();
?>