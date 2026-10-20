(function () {
    var toggler = document.getElementById('navbarToggler');
    var collapse = document.getElementById('navbarNav');
    if (!toggler || !collapse) return;

    toggler.addEventListener('click', function () {
        var terbuka = collapse.classList.toggle('show');
        toggler.setAttribute('aria-expanded', terbuka ? 'true' : 'false');
    });
})();

document.querySelectorAll('[data-dismiss="alert"]').forEach(function (tombol) {
    tombol.addEventListener('click', function () {
        var alert = tombol.closest('.alert');
        if (alert) alert.remove();
    });
});
