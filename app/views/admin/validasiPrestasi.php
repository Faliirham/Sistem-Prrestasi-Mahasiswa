<main class="main-content">
            <div class="validasi-message-title">
                    <h2>Validasi Prestasi</h2>
                </div>
            <div class="validasi-message-container">
            <button class="tambah-data" onclick="window.location.href='<?BASEURL?>/admin/validasiInput'">Tambah Data</button>
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA MAHASISWA</th>
                            <th>JUARA</th>
                            <th>KATEGORI</th>
                            <th>VALIDASI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alvino Valerian</td>
                            <td>Juara 1</td>
                            <td>Nasional</td>
                            <td class="status">
                                <p class="diterima">Diterima</p>
                            </td>
                            <td class="action-buttons">
                                <a href="validasiInput_Admin.php" class="validasi-message-btn-icon">👁</a>
                                <a href="#" class="edit-button"><img src="../img/Edit_Icon.png" alt="Edit"></a>
                                <a href="#" class="delete-button"><img src="../img/Delete_Icon.png" alt="Delete"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ahmad Naufal</td>
                            <td>Juara 2</td>
                            <td>Nasional</td>
                            <td class="status">
                                <p class="diterima">Diterima</p>
                            </td>
                            <td class="action-buttons">
                                <a href="validasiInput_Admin.php" class="validasi-message-btn-icon">👁</a>
                                <a href="#" class="edit-button"><img src="../img/Edit_Icon.png" alt="Edit"></a>
                                <a href="#" class="delete-button"><img src="../img/Delete_Icon.png" alt="Delete"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Billy Maulana</td>
                            <td>Juara 3</td>
                            <td>Nasional</td>
                            <td class="status">
                                <p class="proses">Proses</p>
                            </td>
                            <td class="action-buttons">
                                <a href="validasiInput_Admin.php" class="validasi-message-btn-icon">👁</a>
                                <a href="#" class="edit-button"><img src="../img/Edit_Icon.png" alt="Edit"></a>
                                <a href="#" class="delete-button"><img src="../img/Delete_Icon.png" alt="Delete"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Fali Irham</td>
                            <td>Harapan 1</td>
                            <td>Nasional</td>
                            <td class="status">
                                <p class="diterima">Diterima</p>
                            </td>
                            <td class="action-buttons">
                                <a href="validasiInput_Admin.php" class="validasi-message-btn-icon">👁</a>
                                <a href="#" class="edit-button"><img src="../img/Edit_Icon.png" alt="Edit"></a>
                                <a href="#" class="delete-button"><img src="../img/Delete_Icon.png" alt="Delete"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

  <script>
    function ubahStatus() {
  var dropdown = document.getElementById("validasi-status");
  var status = dropdown.value;

  dropdown.style.backgroundColor = "#ffffff";  
  if (status === "ditolak") {
    dropdown.style.backgroundColor = "#FF2800"; 
  } else if (status === "diterima") {
    dropdown.style.backgroundColor = "#01FB37"; 
  }
}
    function redirectToValidasi() {
  window.location.href = "validasiInput_Admin.php";
}
  </script>
</body>
</html>