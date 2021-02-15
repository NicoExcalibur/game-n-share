<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title">
			<?php
			/* translators: Search query. */
			printf( __( 'Résultats de la recherche pour: %s'), '<span class="search-term">' . get_search_query() . '</span>' );
			?>
			</h1>
		<?php else : ?>
			<h1 class="page-title"><?php echo 'Aucun resultat'; ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main d-flex flex-wrap justify-content-between" role="main">
            <div class="games row col-md-9" id="response">
		<?php
		if ( have_posts()) :
			// Start the Loop.
			while ( have_posts() ) :
				the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="game">
                        <div class="game__imagecover">
                            <?php if (get_field('game_cover')) : ?>
                                <img class="img-fluid" src="<?php the_field('game_cover'); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="game__info">
                            <h2 class="game__info--title"><?php the_title(); ?></h2>
                            <a href="<?php the_permalink(); ?>" class="btn button button-red">Voir la fiche</a>
                        </div>
                    </div>
                </div>
            <?php
			endwhile; // End the loop.
		else :
			?>

			<p><?php echo 'Désolé, nous n\'avons pas de résultat correspondant à votre recherche. Veuillez réessayer avec d\'autres mots clés'; ?></p>
        <?php
		endif;
		?>
        </div>
