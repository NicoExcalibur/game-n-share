<?php


$args = array(
  'post_type' => 'game',
  'posts_per_page' => 3,
);

$games = get_posts($args);

?>
<h1>Accueil</h1>
<p class="carousel-header mb-0 p-3">Voici les derniers jeux ajoutés récemment :</p>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-control">
      <ol class="carousel-indicators">
        <?php
      $i = 0;
         foreach ($games as $key => $game):
        ?>
       
          
          <li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $key; ?>" style="background: url('<?= get_field('game_cover', $game->ID); ?>') center; background-size: cover;"   class="<?php echo ($i == 0) ? 'active' : ''; ?>"> </li> 
          
         </li>
         <?php
        
           $i++;
        endforeach;
        ?>
    </ol>
    </div>
    <div class="carousel-inner carousel__left">
      <?php
            $i = 0;
       foreach ($games as $game):
      ?>
      <?php if ($i == 0):  ?>
          <div class="carousel-item active" data-bs-interval="10000">
      <?php else: ?>
        <div class="carousel-item" data-bs-interval="5000">
          <?php endif ?>
  
            <div class="carousel-container">
              <div class="carousel-cover ">
             
                  <a href="<?= $game->guid ?>"><img class="img-fluid rounded" src="<?= get_field('game_cover', $game->ID); ?>" /></a>
               
              </div>
              <div class="carousel-text d-flex flex-column justify-content-around">
                <h5><?= $game->post_title ?></h5>
                <p><?= $game->post_excerpt; ?></p>
                <a href=http://ec2-3-93-20-11.compute-1.amazonaws.com//game-n-share/jeux-video/<?= $game->post_name; ?>" class="btn button button-red w-25 align-self-center">Voir la fiche</a>
              </div>
            </div>
          </div>
          .
      <?php
         $i++;
      endforeach;
      ?>
    </div> 
   
</div>
