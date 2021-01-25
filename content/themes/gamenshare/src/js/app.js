import '../scss/main.scss';

import 'bootstrap/dist/js/bootstrap.bundle';
import $ from 'jquery';

window.jQuery = $;



const app = {
    btnClose: document.getElementById('btn-close'),
    blockSearch: document.getElementById('form-search'),
    formSearch: document.querySelector('.block-search__form'),
    filters: document.querySelector('.dropfilter'),
    filterButton: document.querySelector('.button-filter-mobile'),
    footerEl: document.querySelector('.footer'),

    init: function () {
        //console.log('init');
        app.btnClose.addEventListener('click', app.closeSearch);
        app.formSearch.addEventListener('submit', app.handlecloseSearch);
        window.addEventListener('resize', app.filtersResponsive);
        window.addEventListener('load', app.filtersResponsive);
        window.addEventListener('scroll', app.checkIfScrolled);
        window.addEventListener('load', app.checkIfScrolled);
        app.handleAjaxFilterGames();

    },
    closeSearch: function(){
        //console.log(app.blockSearch);
        app.blockSearch.classList.remove('show');
    },
    handlecloseSearch: function(evt) {
        //console.log(evt);
        evt.preventDefault();
        app.blockSearch.classList.remove('show');
    },

    filtersResponsive: function(){
        let lWidth = window.screen.width;
        console.log(lWidth);
        console.log(app.filters);
        
        if (lWidth >= 768) { 
            app.filters.classList.remove('dropdown-menu');
            app.filterButton.classList.add('d-none');
        }else 
        {
            app.filters.classList.add('dropdown-menu');
            app.filterButton.classList.remove('d-none');
        }
    },

    checkIfScrolled: function(){
        console.log(app.footerEl.offsetHeight);
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight )
        {
            app.filterButton.style.bottom = app.footerEl.offsetHeight  + "px";
        }else if(document.body.offsetHeight - app.footerEl.offsetHeight <= window.innerHeight + window.scrollY)
        {
            app.filterButton.style.bottom =  (window.innerHeight + window.scrollY) - (document.body.offsetHeight - app.footerEl.offsetHeight) + 5 + "px";
        }else 
        {
            app.filterButton.style.bottom = "35px";
        }
    },
    handleAjaxFilterGames: function() {
        //console.log('kikou j');
        
            $('.form-check-input').change(function(){
            const filter = $('#filter');
            $.ajax({
                url:filter.attr('action'),
                data:filter.serialize(), // form data
                type:filter.attr('method'), // POST
                
                success:function(data){
                  
                    $('#response').html(data); // insert data
                }
            });
            return false;
        });
        $('#filter').submit(function(){
            const filter = $('#filter');
            $.ajax({
                url:filter.attr('action'),
                data:filter.serialize(), // form data
                type:filter.attr('method'), // POST
                beforeSend:function(xhr){
                    filter.find('button').text('Processing...'); // changing the button label
                },
                success:function(data){
                    filter.find('button').text('Filtrez'); // changing the button label back
                    $('#response').html(data); // insert data
                }
            });
            return false;
        });
 
    }
}
document.addEventListener('DOMContentLoaded', app.init);