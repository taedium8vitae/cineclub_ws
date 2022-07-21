<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:800,700,500,400">
        <link href="/styles.css" rel="stylesheet" type="text/css">
        <title>CSM Cinéclub</title>
    </head>

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

    <body>
        <header class="primary-header">
            <div class="container">
                <div class="logo">
                    <a href="/">CSM Cinéclub</a>
                </div>
                <nav class="primary-navigation">
                    <ul role="list" class="nav-list">
                        <li><a href="#">Films</a></li>
                        <li><a href="#">A Propos</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <div class="nextMovie">
                <div class="poster">
                    <?php
                    // Vérifier si le prochain film a été ajouté à la base de données
                    $nextMovieAnnounced = false;
                    foreach ($movies as $movie) {
                        if ($movie['date'] > date('Y-m-d')) {
                            $nextMovieAnnounced = true;
                            break;
                        }
                    }
                    // Mettre la variable $movie sur le prochain film
                    if ($nextMovieAnnounced == true) {
                        foreach ($movies as $movie) {
                            if ($movie['date'] > date('Y-m-d')) {
                                break;
                            }
                        }
                        // Afficher le prochain film
                        ?>
                        <img src="/images/<?php echo $movie['linkToImage'] ?>" alt="<?php echo $movie['title'] ?>">
                        <h2 class="movieTitle"><?php echo $movie['title'] ?></h2>
                        <h2 class="movieDate"><?php echo date('d M Y',strtotime($movie['date'])); ?></h2>
                        <?php
                    } else {
                        // Afficher que le prochain film n'a pas encore été annoncé
                        ?>
                        <img src="/images/noMovie.png" alt="Le prochain film n'a pas encore été annoncé">
                        <h2 class="movieTitle">Aucun film à l'affiche</h2>
                        <?php
                    }
                    ?>
                </div>
                <div class="paragraph-container">
                    <p class="synopsis">
                        <?php
                        // Afficher le synopsis du prochain film
                        if ($nextMovieAnnounced == true) {
                            echo $movie['text'];
                        } else {
                            echo "Le prochain film n'a pas encore été annoncé, revenez plus tard ! :)";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; Copyright 2022 - Cinéclub du collège St-Michel</p>
        </footer>
    </body>
</html>