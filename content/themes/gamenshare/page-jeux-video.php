<?php 

get_header();

?>

<?php 
while ( have_posts() ) :
				the_post();


get_template_part( 'template-parts/games/content-games', 'page' ); 

endwhile;
?>





<?php 

get_footer();

