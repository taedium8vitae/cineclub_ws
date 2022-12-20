<?php include('dbConnect.php'); ?>
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
                    }
?>
<!doctype html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:800,700,500,400">
        <link href="/styles.css" rel="stylesheet" type="text/css">
        <title>Cinéclub du Collège St-Michel Fribourg</title>
        <meta name="description" content="Découvrez le prochain film à venir au Cinéclub du collège St-Michel Fribourg." />
        <meta name="og:title" content="<?php 
            if ($nextMovieAnnounced == true) {
                echo $movie['title'];
            }else{
                echo "CSM Cinéclub";
            }
            ?>" />
        <meta name="og:description" content="
            <?php 
            if ($nextMovieAnnounced == true) {
                echo $movie['text'];
            }else{
                echo "Le prochain film n'a pas encore été annoncé, revenez bientôt !";
            }
            ?>
            " />
        <?php
            if ($nextMovieAnnounced == true) {
                echo '<meta name="og:image" content="/images/' . $movie['linkToImage'] . '" />';
            }
        ?>
    </head>

    <body>
        <?php include('header.php'); ?>
        <main>
            <div class="nextMovie">
                <div class="poster">
                    <?php
                        if ($nextMovieAnnounced == true) {
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
        <?php include('footer.php'); ?>
    </body>
</html>