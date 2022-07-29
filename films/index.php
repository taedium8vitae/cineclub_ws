<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:800,700,500,400">
        <link href="../styles.css" rel="stylesheet" type="text/css">
        <title>CSM Cinéclub | Films</title>
    </head>

    <?php include('../dbConnect.php'); ?>

    <body>
        <?php include ('../header.php'); ?>
        <div class="moviesContainer">
            <?php
            $today = Date("Y-m-d");
            foreach(array_reverse($movies) as $movie){
                if($today <= $movie['date']){}else{
            ?>
                        <div class="movie">
                            <img class="smallPoster" src="https://raw.githubusercontent.com/taedium8vitae/cineclub_ws/main/images/<?php echo $movie['linkToImage']; ?>" alt="<?php echo $movie['title']; ?>">
                            <h2 class="smallTitle"><?php echo $movie['title']; ?></h2>
                            <p class="smallDate"><?php echo date('d M Y',strtotime($movie['date'])); ?></p>
                        </div>
            <?php }} ?>
        </div>
        <?php include('../footer.php'); ?>
    </body>
        