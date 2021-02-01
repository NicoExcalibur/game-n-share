<?php
$terms = get_terms('genre');
$termSlug = wp_list_pluck($terms, 'slug');

$args = array(
  'post_type' => 'game',
  'posts_per_page' => 3,
  'tax_query' =>
  array(
    'relation' => 'AND',
    array(
      'taxonomy' => 'genre',
      'field'    => 'slug',
      'terms'    => $termSlug,
    ),
  )
);

$games = get_posts($args);
if(!empty($games)):
?>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

  <div class="carousel-container">
    <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
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
    <div class="carousel-small-cover carousel__right">
      <ol class="carousel-indicators2">
    <?php
            $i = 0;
       foreach ($games as $game):
      ?>
      <?php if ($i == 0):  ?>
       
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i++; ?>" class="active"></li>
        <?php else: ?>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i++; ?>"></li>
        <?php endif ?>
        <img class="img-fluid" src="<?= get_field('game_cover', $game->ID); ?>" />
       </li>
       <?php
      
         $i++;
      endforeach;
      ?>
      </ol>
    </div>
  </div>
  <?php
  endif;
  ?>
</div>