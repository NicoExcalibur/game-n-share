import '../scss/main.scss';

import 'bootstrap/dist/js/bootstrap.bundle';

const app = {
    btnClose: document.getElementById('btn-close'),
    blockSearch: document.getElementById('form-search'),
    formSearch: document.querySelector('.block-search__form'),

    init: function () {
        console.log('init');
        app.btnClose.addEventListener('click', app.closeSearch);
        app.formSearch.addEventListener('submit', app.handlecloseSearch);
    },
    closeSearch: function(){
        //console.log(app.blockSearch);
        app.blockSearch.classList.remove('show');
    },
    handlecloseSearch: function(evt) {
        //console.log(evt);
        evt.preventDefault();
        app.blockSearch.classList.remove('show');
    }

}
document.addEventListener('DOMContentLoaded', app.init);