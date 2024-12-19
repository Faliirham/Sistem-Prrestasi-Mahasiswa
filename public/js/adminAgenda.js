function adjustFontSize() {
    const titles = document.querySelectorAll('.agenda-title'); // Seleksi semua elemen dengan kelas agenda-title
    titles.forEach((title) => {
        const parentWidth = title.parentElement.offsetWidth; // Lebar kotak
        let fontSize = parseInt(window.getComputedStyle(title).fontSize); // Ukuran font saat ini

        // Kurangi ukuran font jika teks terlalu panjang
        while (title.scrollWidth > parentWidth && fontSize > 10) { // Set batas minimum font size (mis. 10px)
            fontSize--;
            title.style.fontSize = fontSize + 'px';
        }
    });
}
 // Fungsi untuk redirect ke halaman edit
  // Konfirmasi saat ingin menghapus
  function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus agenda ini?');
  }
// Panggil fungsi setelah DOM selesai dimuat
document.addEventListener('DOMContentLoaded', adjustFontSize);

// Panggil fungsi ulang jika jendela diubah ukurannya
window.addEventListener('resize', adjustFontSize);
