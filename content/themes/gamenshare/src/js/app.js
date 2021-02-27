import '../scss/main.scss';

import 'bootstrap/dist/js/bootstrap.bundle';
import 'jquery-bar-rating/dist/jquery.barrating.min.js';
import $ from 'jquery';

window.jQuery = $;

const app = {
    btnClose: document.getElementById('btn-close'),
    blockSearch: document.getElementById('form-search'),
    formSearch: document.querySelector('.block-search__form'),
    filters: document.querySelector('.dropfilter'),
    filterButton: document.querySelector('.button-filter-mobile'),
    footerEl: document.querySelector('.footer'),
    body: document.querySelector('body'),

    init: function () {
        app.btnClose.addEventListener('click', app.closeSearch);
        app.formSearch.addEventListener('submit', app.handlecloseSearch);
        window.addEventListener('resize', app.filtersResponsive);
        window.addEventListener('load', app.filtersResponsive);
        window.addEventListener('scroll', app.checkIfScrolled);
        window.addEventListener('load', app.checkIfScrolled);
        app.handleAjaxFilterGames();
        app.handleStarRating();
        app.handleAddFavorite();
        app.handleAddCollection();
        //app.handleAddPost();
    },

    closeSearch: function () {
        app.blockSearch.classList.remove('show');
    },

    handlecloseSearch: function () {
        app.blockSearch.classList.remove('show');
    },

    filtersResponsive: function () {
        let bodyCss = app.body.classList.contains('post-type-archive-game');

        if (bodyCss) {
            let lWidth = window.screen.width;

            if (lWidth >= 768) {
                app.filters.classList.remove('dropdown-menu');
                app.filterButton.classList.add('d-none');
            } else {
                app.filters.classList.add('dropdown-menu');
                app.filterButton.classList.remove('d-none');
            }
        }
    },

    checkIfScrolled: function () {
        let bodyCss = app.body.classList.contains('post-type-archive-game');

        if (bodyCss) {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                app.filterButton.style.bottom = app.footerEl.offsetHeight + "px";
            } else if (document.body.offsetHeight - app.footerEl.offsetHeight <= window.innerHeight + window.scrollY) {
                app.filterButton.style.bottom = (window.innerHeight + window.scrollY) - (document.body.offsetHeight - app.footerEl.offsetHeight) + 5 + "px";
            } else {
                app.filterButton.style.bottom = "35px";
            }
        }
    },

    handleAjaxFilterGames: function () {

        $('.form-check-input').change(function () {
            const filter = $('#filter');
            $.ajax({
                url: filter.attr('action'),
                data: filter.serialize(), // form data
                type: filter.attr('method'), // POST

                success: function (data) {

                    $('#response').html(data); // insert data
                }
            });
            return false;
        });
        $('#filter').submit(function () {
            const filter = $('#filter');
            $.ajax({
                url: filter.attr('action'),
                data: filter.serialize(), // form data
                type: filter.attr('method'), // POST
                beforeSend: function (xhr) {
                    filter.find('button').text('Processing...'); // changing the button label
                },
                success: function (data) {
                    filter.find('button').text('Filtrez'); // changing the button label back
                    $('#response').html(data); // insert data
                }
            });
            return false;
        });
    },

    handleStarRating: function () {
        $('.rating').barrating({
            theme: 'fontawesome-stars',
            initialRating: null,
            onSelect: function (value, text, event) {

                // Get element id by data-id attribute
                var el = this;
                var el_id = el.$elem.data('id');
                // rating was selected by a user
                if (typeof (event) !== 'undefined') {

                    var split_id = el_id.split("_");
                    var postid = split_id[1]; // postid

                    // AJAX Request
                    $.ajax({
                        url: frontendajax.ajaxurl,
                        type: 'POST', //Post method
                        data: {
                            'action': 'get_star_rating',
                            'postid': postid,
                            'rating': value,
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Update average
                            var average = response['averageRating'];
                            $('#avgrating_' + postid).text(average);
                        },
                    });
                }
            }
        });
    },

    handleAddFavorite: function () {

        $('.fav-button').on('click', function () {

            var el = this;
            var el_id = el.dataset.id;
            var split_id = el_id.split("_");
            var postid = parseInt(split_id[1], 10);
            // console.log(postid);

            if ($(el).attr('data-current-state') == 0) {
                // AJAX Request
                $.ajax({
                    url: ajaxobject.ajaxurl,
                    type: 'POST', //Post method
                    data: {
                        'action': 'add_fav_game',
                        'postid': postid,
                    },
                    success: function () {
                        console.log('ajouté aux fav');
                        $(el).removeClass('add-fav-button')
                            .addClass('delete-fav-button')
                            .html('Retirer des favoris')
                            .attr('data-current-state', '1');
                    }
                });

            } else {

                // AJAX Request
                $.ajax({
                    url: ajaxobject.ajaxurl,
                    type: 'POST', //Post method
                    data: {
                        'action': 'add_fav_game',
                        'postid': postid,
                    },
                    success: function () {
                        console.log('retiré des fav');
                        $(el).removeClass('delete-fav-button')
                            .addClass('add-fav-button')
                            .html('Ajouter aux favoris')
                            .attr('data-current-state', '0');
                    }
                });
            }
        });
    },

    handleAddCollection: function () {

        $('.collec-button').on('click', function () {

            var el = this;
            var el_id = el.dataset.id;
            var split_id = el_id.split("_");
            var postid = parseInt(split_id[1], 10);
            // console.log(postid);

            if ($(el).attr('data-current-state') == 0) {
                // AJAX Request
                $.ajax({
                    url: ajaxadd.ajaxurl,
                    type: 'POST', //Post method
                    data: {
                        'action': 'add_collection',
                        'postid': postid,
                    },
                    success: function () {
                        console.log('ajouté à la collec');
                        $(el).removeClass('collec-button-add')
                            .addClass('collec-button-delete')
                            .html('Retirer de ma collection')
                            .attr('data-current-state', '1');

                    }
                });

            } else {

                // AJAX Request
                $.ajax({
                    url: ajaxadd.ajaxurl,
                    type: 'POST', //Post method
                    data: {
                        'action': 'add_collection',
                        'postid': postid,
                    },
                    success: function () {
                        console.log('retiré de la collec');
                        $(el).removeClass('collec-button-delete')
                            .addClass('collec-button-add')
                            .html('Ajouter à ma collection')
                            .attr('data-current-state', '0');
                    }
                });
            }
        });
    },
    handleAddPost: function () {
        $('#addpost').submit(function () {
            //filter.attr('action'),
            let postTitle = document.getElementById('post-title').value
            let postContent = document.getElementById('post-content').value
            let postDate = document.getElementById('post-date').value
            let postCover = document.getElementById('post-cover').value
            let postScreenshot = document.getElementById('post-screenshot').value
            let postEditor = document.getElementById('post-editor').value
            let postGenre = document.getElementById('post-genre').value
            let postPlateform = document.getElementById('post-plateform').value
            console.log(postPlateform);

            $.ajax({
                url: ajaxaddpost.ajaxurl,
                type: 'POST',

                data: {
                    action: 'insert_game',
                    'post-title': postTitle,
                    'post-content': postContent,
                    'post-date': postDate,
                    'post-cover': postCover,
                    'post-screenshot': postScreenshot,
                    'post-editor': postEditor,
                    'post-genre': postGenre,
                    'post-plateform': postPlateform
                },
                dataType: "json",
                success: function (data, textStatus, XMLHttpRequest) {
                    var id = '#apf-response';
                    $(id).html('');
                    $(id).append(data);
                    console.log(data);


                },

                error: function (MLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        });
    }
    
}

document.addEventListener('DOMContentLoaded', app.init);