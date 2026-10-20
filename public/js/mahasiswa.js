(function () {
    var form = document.getElementById('formMahasiswa');
    if (!form) return;

    var baseurl = document.body.getAttribute('data-baseurl');
    var judul = document.getElementById('formModalLabel');
    var tombolSubmit = document.getElementById('tombolSubmit');
    var inputId = document.getElementById('formId');

    function siapkanTambah() {
        judul.textContent = 'Tambah Data Mahasiswa';
        tombolSubmit.textContent = 'Tambah Data';
        form.action = baseurl + '/mahasiswa/tambah';
        form.reset();
        inputId.value = '';
    }

    function siapkanUbah(id) {
        judul.textContent = 'Ubah Data Mahasiswa';
        tombolSubmit.textContent = 'Ubah Data';
        form.action = baseurl + '/mahasiswa/ubah';
        form.reset();

        var kirim = new FormData();
        kirim.append('id', id);

        fetch(baseurl + '/mahasiswa/getUbah', { method: 'POST', body: kirim })
            .then(function (respon) { return respon.json(); })
            .then(function (data) {
                if (!data) return;
                inputId.value = data.id;
                document.getElementById('nim').value = data.nim;
                document.getElementById('nama').value = data.nama;
                document.getElementById('email').value = data.email || '';
                document.getElementById('jurusan').value = data.jurusan || '';
            })
            .catch(function () {
                alert('Data gagal dimuat.');
            });
    }

    document.querySelectorAll('.tombol-tambah').forEach(function (tombol) {
        tombol.addEventListener('click', siapkanTambah);
    });

    document.querySelectorAll('.tampil-modal-ubah').forEach(function (tombol) {
        tombol.addEventListener('click', function (event) {
            event.preventDefault();
            siapkanUbah(tombol.getAttribute('data-id'));
        });
    });
})();
