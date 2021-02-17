<div class="block-search collapse" id="form-search">
    <form class="block-search__form d-flex" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform">
        <input class="form-control me-2" type="search" placeholder="Rechercher" name="s" value="<?php echo the_search_query(); ?>" aria-label="Search">
        <button class="btn  button-red" type="submit">Rechecher</button>
    </form>
    <button type="button" id="btn-close" class="btn-close btn-close-white" aria-label="Close"></button>
</div>