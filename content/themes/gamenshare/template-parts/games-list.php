<section class="content container">
    <h1 class="">Jeux Vidéo</h1>
    <div class="row">
        <div class="filters col-md-3 dropup">
            <button type="button" class="btn button-filter-mobile btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Filtrer
                </button>
            <div class="dropdown-menu">
                <form action="">
                    <fieldset>
                        <legend>Filter par genres</legend>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="aventure" id="aventure" class="form-check-input">
                            <label for="aventure" class="form-check-label">Aventure</label>
                        </div>

                    </fieldset>
                </form>
            </div>
            
        </div>
        <div class="games row col-md-9">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                <div class="col-sm-6 col-md-4">
                    <div class="game">
                        <div class="game__imagecover"><img src="./img/jeux-video.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="game__info">
                        <h2 class="game__info--title"><?php the_title(); ?></h2>
                        <a href="<?php the_permalink(); ?>" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
            <?php endwhile;
            endif; ?>
            <div class="col-sm-6 col-md-4">
                <div class="game">
                    <div class="game__imagecover"><img src="./img/jeux-video.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="game__info">
                        <h2 class="game__info--title">Assassin's Creed Valhalla</h2>
                        <a href="" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="game">
                    <div class="game__imagecover"><img src="./img/jeux-video.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="game__info">
                        <h2 class="game__info--title">Assassin's Creed Valhalla</h2>
                        <a href="" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="game">
                    <div class="game__imagecover"><img src="./img/jeux-video.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="game__info">
                        <h2 class="game__info--title">Assassin's Creed Valhalla</h2>
                        <a href="" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="game">
                    <div class="game__imagecover"><img src="./img/jeux-video.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="game__info">
                        <h2 class="game__info--title">Assassin's Creed Valhalla</h2>
                        <a href="" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="game">
                    <div class="game__imagecover"><img src="./img/jeux-video.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="game__info">
                        <h2 class="game__info--title">Assassin's Creed Valhalla</h2>
                        <a href="" class="btn button button-red">Voir la fiche</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>