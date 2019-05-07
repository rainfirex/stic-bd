(() => {
    const btnSearch = document.getElementById('btn_search');
    const frmSearch = document.getElementById('frm_search');
    if (btnSearch == null || frmSearch == null) {
        return;
    }
    btnSearch.addEventListener('click', ev => {
        if (frmSearch.classList.contains('hidden')) {
            frmSearch.classList.remove('hidden');
        } else {
            frmSearch.classList.add('hidden');
        }
    });
})();

