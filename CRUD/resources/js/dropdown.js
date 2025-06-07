document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.details-toggle-button').forEach(button => {
        button.addEventListener('click', function (event) {
            event.stopPropagation();

            const targetMenu = this.nextElementSibling;

            closeAllDropdowns(targetMenu);

            targetMenu.classList.toggle('show');
        });
    });

    window.addEventListener('click', function (event) {

        if (!event.target.closest('.details-menu')) {
            closeAllDropdowns();
        }
    });


    function closeAllDropdowns(exceptThisOne = null) {
        document.querySelectorAll('.details-menu.show').forEach(menu => {
            if (menu !== exceptThisOne) {
                menu.classList.remove('show');
            }
        });
    }
});
