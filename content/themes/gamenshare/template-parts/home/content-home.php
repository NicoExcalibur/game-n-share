<?php


$args = array(
  'post_type' => 'game',
  'posts_per_page' => 3,
  
  
);

$games = get_posts($args);

?>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-control">
      <ol class="carousel-indicators">
        <?php
      $i = 0;
         foreach ($games as $key => $game):
        ?>
       
          
          <li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $key; ?>" style="background-image: url('<?= get_field('game_cover', $game->ID); ?>')"   class="<?php echo ($i == 0) ? 'active' : ''; ?>"> </li> 
          
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
        <div class="carousel-item" data-bs-interval="2000">
          <?php endif ?>
  
            <div class="carousel-container">
              <div class="carousel-cover ">
             
                  <img class="img-fluid" src="<?= get_field('game_cover', $game->ID); ?>" />
               
              </div>
              <div class="carousel-text">
                <h5><?= $game->post_title ?></h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
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