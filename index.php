<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/styles.css" rel="stylesheet" type="text/css">
        <title>CSM Cinéclub</title>
    </head>
    <?php
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
    </head>
    <body>
        <header class="head">
            <h1>Cinéclub du collège St-Michel</h1>
        </header>
        <div class="media_scroller snaps-inline">
            <?php
            $today = date("Y-m-d");
            foreach(array_reverse($movies) as $movie){
                ?>
                    <div class="movie<?php if($today <= $movie['date']){echo ' future';} ?>">
                        <img class="poster" src="/images/<?php echo $movie['linkToImage']; ?>" alt="<?php echo $movie['title']; ?>">
                        <h2><?php echo $movie['title']; ?></h2>
                        <p class="date"><?php echo substr($movie['date'], 0, -3); ?></p>
                    </div>
                <?php
                }
                ?>
        </div>
        <footer>
            <p class="foot">&copy; Copyright 2022 - Cinéclub du collège St-Michel</p>
        </footer>
    </body>
</html>