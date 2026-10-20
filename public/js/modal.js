(function () {
    function bukaModal(modal) {
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
    }

    function tutupModal(modal) {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    }

    document.querySelectorAll('[data-toggle="modal"]').forEach(function (pemicu) {
        pemicu.addEventListener('click', function () {
            var modal = document.querySelector(pemicu.getAttribute('data-target'));
            if (modal) bukaModal(modal);
        });
    });

    document.querySelectorAll('.modal').forEach(function (modal) {
        modal.addEventListener('click', function (event) {
            if (event.target === modal) tutupModal(modal);
        });
        modal.querySelectorAll('[data-dismiss="modal"]').forEach(function (tombol) {
            tombol.addEventListener('click', function () { tutupModal(modal); });
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.modal.show').forEach(function (modal) {
                tutupModal(modal);
            });
        }
    });
})();
