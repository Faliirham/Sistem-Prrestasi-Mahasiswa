document.addEventListener("DOMContentLoaded", function () {
  // Ambil semua elemen status di tabel
  const statusElements = document.querySelectorAll("td.status");

  statusElements.forEach((element) => {
      const status = element.getAttribute("data-status");
      let color = "#ffffff"; // Default warna latar belakang

      // Tentukan warna berdasarkan status
      if (status === "Ditolak") {
          color = "#FF2800";
      } else if (status === "Diterima") {
          color = "#01FB37";
      } else if (status === "Proses") {
          color = "#FEB110";
      }

      // Terapkan warna ke elemen td
      element.style.backgroundColor = color;
  });
});
