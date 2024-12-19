// JavaScript untuk membuka dan menutup modal Tambah Agenda
document.addEventListener('DOMContentLoaded', function () {
    const tambahAgendaBtn = document.querySelector('.tambah-agenda');
    const popupAgenda = document.getElementById('popupAgenda');
    const closeBtnAgenda = document.querySelector('.close-btn-agenda');

    tambahAgendaBtn.addEventListener('click', function () {
        popupAgenda.style.display = 'block';
    });

    closeBtnAgenda.addEventListener('click', function () {
        popupAgenda.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === popupAgenda) {
            popupAgenda.style.display = 'none';
        }
    });

    // Modal untuk Ubah Agenda
    document.addEventListener('DOMContentLoaded', function () {
        const editAgendaBtn = document.querySelector('.edit-button'); // Update this with the button or element triggering the popup
        const popupUpdateAgenda = document.querySelector('.popup-update-agenda');
        const closeBtnUpdateAgenda = document.querySelector('.close-btn-update-agenda'); // Update this with the close button inside the popup
    
        // Open the popup when the button is clicked
        editAgendaBtn.addEventListener('click', function () {
            popupUpdateAgenda.style.display = 'block';
        });
    
        // Close the popup when the close button is clicked
        closeBtnUpdateAgenda.addEventListener('click', function () {
            popupUpdateAgenda.style.display = 'none';
        });
    
        // Close the popup if clicking outside the popup content
        window.addEventListener('click', function (event) {
            if (event.target === popupUpdateAgenda) {
                popupUpdateAgenda.style.display = 'none';
            }
        });
    });    
    // Modal untuk Tambah User
    const tambahUserBtn = document.getElementById('tambah-user');
    const popupUser = document.getElementById('popupUser');
    const closeBtnUser = document.querySelector('.close-btn-user');

    tambahUserBtn.addEventListener('click', function () {
        popupUser.style.display = 'block';
    });

    closeBtnUser.addEventListener('click', function () {
        popupUser.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === popupUser) {
            popupUser.style.display = 'none';
        }
    });

    // Modal untuk Tambah Tingkat Prestasi
    const tambahPrestasiBtn = document.getElementById('tambah-prestasi');
    const popupPrestasi = document.getElementById('popupPrestasi');
    const closeBtnPrestasi = document.querySelector('.close-btn-prestasi');

    tambahPrestasiBtn.addEventListener('click', function () {
        popupPrestasi.style.display = 'block';
    });

    closeBtnPrestasi.addEventListener('click', function () {
        popupPrestasi.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === popupPrestasi) {
            popupPrestasi.style.display = 'none';
        }
    });
});