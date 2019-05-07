(e=>{
    const formContainer  = document.getElementById('form-container');
    const btnShowFrm = document.getElementById('btn_show_frm');
    const btnHideFrm = document.getElementById('btn_hide_frm');

    btnShowFrm.addEventListener('click', closeForm);

    btnHideFrm.addEventListener('click', closeForm);

    function closeForm() {
        if (formContainer.classList.contains('hidden')) {
            formContainer.classList.remove('hidden')
        } else {
            formContainer.classList.add('hidden')
        }
    }
})();