import '../scss/main.scss';

import 'bootstrap/dist/js/bootstrap.bundle';

const app = {
    btnClose: document.getElementById('btn-close'),
    blockSearch: document.getElementById('form-search'),
    formSearch: document.querySelector('.block-search__form'),
    filters: document.querySelector('.dropdown-menu'),
    filterButton: document.querySelector('.button-filter-mobile'),

    init: function () {
        //console.log('init');
        app.btnClose.addEventListener('click', app.closeSearch);
        app.formSearch.addEventListener('submit', app.handlecloseSearch);
        window.addEventListener('resize', app.filtersResponsive);
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
        //console.log(lWidth);

        if (lWidth >= 768) {
            
            app.filters.classList.remove('dropdown-menu');
            app.filterButton.classList.add('d-none');
        }else {
            app.filters.classList.add('dropdown-menu');
            app.filterButton.classList.remove('d-none');
        }
    }

}
document.addEventListener('DOMContentLoaded', app.init);

