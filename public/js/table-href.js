(() => {
    const table = document.getElementById('table');
    if (table == null)
        return;
    table.addEventListener('click', ev => {
        if (ev.target.localName === 'td') {
            if(ev.target.parentElement.hasAttribute('data-href')) {
                const url = ev.target.parentElement.getAttribute('data-href');
                if (url.match(/http+/))
                    document.location.href = url;
            }
        }
    });
})();