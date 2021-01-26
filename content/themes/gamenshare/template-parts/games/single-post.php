<div class="main d-flex flex-column">
    <img src="https://source.unsplash.com/1300x300/?videogame" class="img-fluid mx-auto mb-5" alt="...">
    <div class="game_infos d-flex justify-content-between">
        <div class="game_infos_left mw-50">
            <div class="game_infos_title mb-4"><h1 class="text-start"><?php the_title(); ?></h1></div>
            <div class="game_infos_text"><?php the_content(); ?>
            </div>
        </div>
        <?php
        $terms = get_the_terms( get_the_ID(), 'genre' );
        ?>
        <div class="game_infos_right d-flex flex-column align-items-end">
            <button type="button" class="btn button-red mb-4 pl-2">Ajouter à mes favoris</button>
            <div class="game_infos_details mb-4">
                <h4 class="content-header">Details sur le jeu : </h4>
                <ul class="list-group ">
                        <li class="list-group-item">Genre(s) : <?php foreach ($terms as $term) {
                         ?> <a href="#"> <?php echo $term->name; ?> </a>        
                        <?php }; ?></li>
                    <li class="list-group-item">Plateforme(s) : <?php the_field('platform'); ?></li>
                    <li class="list-group-item">Sorti le : <?php the_field('date', $post->ID); ?></li>
                    <li class="list-group-item">Editeur : <?php the_field('editor', $post->ID); ?></li>
                </ul>
            </div>
            <div class="game_infos_rating">
                <h4 class="content-header">Note du jeu :</h4>
                <div class=”rating_stars”>
                    étoile étoile
                </div>
            </div>
        </div>
    </div>
    <div class="comments">
        <h4 class="content-header">Commentaires :</h4>
        <div class="comments_list">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex">
                    <div class="comment_author w-25">
                        <img src="https://source.unsplash.com/50x50/" class="img-fluid mx-auto" alt="...">
                    </div>
                    <div class="comment_body d-flex flex-column">
                        <div class="comment_body_title">Titre commentaire</div>
                        <div class="comment_body_date">17 mai 2021</div>
                        <div class="comment_body_content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro cumque provident consectetur nostrum doloremque ratione quasi quae quo quis accusantium delectus, ipsa debitis laudantium repudiandae at distinctio veniam optio libero temporibus voluptatum dolorum ut quas laborum. Odit consectetur excepturi odio?</div>
                    </div>
                </li>
                <li class="list-group-item  d-flex">
                    <div class="comment_author w-25">
                        <img src="https://source.unsplash.com/50x50/" class="img-fluid mx-auto" alt="...">
                    </div>
                    <div class="comment_body d-flex flex-column">
                        <div class="comment_body_title">Titre commentaire</div>
                        <div class="comment_body_date">17 mai 2021</div>
                        <div class="comment_body_content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro cumque provident consectetur nostrum doloremque ratione quasi quae quo quis accusantium delectus, ipsa debitis laudantium repudiandae at distinctio veniam optio libero temporibus voluptatum dolorum ut quas laborum. Odit consectetur excepturi odio?</div>
                    </div>
                </li>

            </ul>
        </div>
        <div class="input-group my-4">
            <textarea class="form-control" aria-label="With textarea"></textarea>
            <span class="input-group-text">Ajouter un commentaire</span>
        </div>
    </div>
</div>