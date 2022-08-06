<!doctypehtml><html lang="fr"><head><meta charset="utf-8"><meta content="width=device-width,initial-scale=1"name="viewport"><link href="https://fonts.googleapis.com/css?family=Work+Sans:800,700,500,400"rel="stylesheet"><link href="/styles.css"rel="stylesheet"type="text/css"><title>CSM Cinéclub</title></head><?php include('dbConnect.php'); ?><body><?php include('header.php'); ?><main><div class="nextMovie"><div class="poster"><?php $nextMovieAnnounced=false;foreach($movies as $movie){if($movie['date']>date('Y-m-d')){$nextMovieAnnounced=true;break;}}if($nextMovieAnnounced==true){foreach($movies as $movie){if($movie['date']>date('Y-m-d')){break;}} ?><img alt="<?php echo $movie['title'] ?>"src="https://raw.githubusercontent.com/taedium8vitae/cineclub_ws/main/images/<?php echo $movie['linkToImage'] ?>"><h2 class="movieTitle"><?php echo $movie['title'] ?></h2><h2 class="movieDate"><?php echo date('d M Y',strtotime($movie['date'])); ?></h2><?php }else{ ?><img alt="Le prochain film n'a pas encore été annoncé"src="https://raw.githubusercontent.com/taedium8vitae/cineclub_ws/main/images/noMovie.png"><h2 class="movieTitle">Aucun film à l'affiche</h2><?php } ?></div><div class="paragraph-container"><p class="synopsis"><?php if($nextMovieAnnounced==true){echo $movie['text'];}else{echo "Le prochain film n'a pas encore été annoncé, revenez plus tard ! :)";} ?></p></div></div></main><?php include('footer.php'); ?></body></html>