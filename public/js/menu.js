document.addEventListener('DOMContentLoaded', e => {
    const CURR_CONTROLLER = document.location.pathname.split('/')[1];
    const items = document.querySelectorAll('.navigator > ul > li > a');
    for (var i = 0; i < items.length; i++) {
        const res = items[i].href.match(CURR_CONTROLLER);
        if (CURR_CONTROLLER == 'placement') {
            items[0].classList.add('active');
        } else if (CURR_CONTROLLER != '') {
            if (res !== null) {
                items[i].classList.add('active');
                return;
            }
        }
        else
            items[0].classList.add('active');
    }
});