$(document).ready(function($) {
    $(document).on('click', '.btn_print', function(event) {
        event.preventDefault();

        // Pilih elemen yang akan dicetak
        var element = document.getElementById('file');

        // Pengaturan custom untuk pdf
        var opt = {
            margin: 0,
            filename: 'SIPPMA_' + new Date().getTime() + '.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { dpi: 300, scale: 1 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' },
        };

        // Menggunakan html2pdf untuk menyimpan PDF
        html2pdf().set(opt).from(element).save();
    });
});
