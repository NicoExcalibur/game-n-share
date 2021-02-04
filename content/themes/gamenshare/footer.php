</section>
</main>
<footer class="footer">
    <div class="footer__container container">
        <div class="row">
            <div class="footer-info col-md-3">
                <p class="footer-infos__p">&copy; <?php bloginfo('name'); ?> <?= date('Y'); ?></p>
            </div>
            <div class="footer-menu col-md-6">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer',
                    'container'      => 'ul',
                    'menu_class' => 'nav justify-content-center'

                ]);
                ?>
            </div>
            <div class="footer-social col-md-3">
                <?php
                wp_nav_menu([
                    'theme_location' => 'social',
                    'container'      => 'ul',
                    'menu_class' => 'nav justify-content-end'

                ]);
                ?>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
<?php 
if(is_single() && 'game' == get_post_type()){
    while ( have_posts() ) :
        the_post();
    get_template_part( 'template-parts/games/script-js-staring' ); 
endwhile;
}
?>
</body>

</html>