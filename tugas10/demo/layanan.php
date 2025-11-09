<?php
include 'layout/layout_header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-box-seam-fill"></i> Manajemen Layanan</h2>
    <a href="forms/form-tambah-layanan" class="btn btn-primary">
        <i class="bi bi-plus-circle-fill"></i> Tambah Layanan Baru
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Harga per Kg</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM layanan ORDER BY nama_layanan ASC";
                    $hasil = mysqli_query($koneksi, $query);
                    $no = 1;
                    
                    if (mysqli_num_rows($hasil) > 0) {
                        while($data = mysqli_fetch_assoc($hasil)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $no++ . "</th>";
                            echo "<td>" . htmlspecialchars($data['nama_layanan']) . "</td>";
                            // Format harga menjadi Rupiah
                            echo "<td>Rp " . number_format($data['harga_per_kg'], 0, ',', '.') . "</td>";
                            echo "<td>";
                            echo "<a href='forms/form-edit-layanan?id=" . $data['id_layanan'] . "' class='btn btn-warning btn-sm me-2 mb-2' style='width: 85px;'><i class='bi bi-pencil-square'></i> Edit</a>";
                            echo "<a href='proses/hapus-layanan.php?id=" . $data['id_layanan'] . "' class='btn btn-danger btn-sm mb-2' style='width: 85px;'
                                    onclick=\"konfirmasiHapus(event, '" . addslashes(htmlspecialchars($data['nama_layanan'])) . "', " . $data['id_layanan'] . ")\">
                                    <i class='bi bi-trash-fill'></i> Hapus
                                </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Jika tidak ada data
                        echo "<tr><td colspan='4' class='text-center'>Belum ada data layanan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include 'layout/layout_footer.php';
?>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    let timer = 2000;

    if (status === 'sukses_tambah') {
        Swal.fire({
            title: 'Sukses!',
            text: 'Data layanan baru berhasil ditambahkan.',
            icon: 'success',
            timer: timer,
            showConfirmButton: false
        });
    } else if (status === 'sukses_edit') {
        Swal.fire({
            title: 'Sukses!',
            text: 'Data layanan berhasil diperbarui.',
            icon: 'success',
            timer: timer,
            showConfirmButton: false
        });
    } else if (status === 'sukses_hapus') {
        Swal.fire({
            title: 'Terhapus!',
            text: 'Data layanan telah dihapus.',
            icon: 'warning',
            timer: timer,
            showConfirmButton: false
        });
    }
    
    if (status) {
        const cleanURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.replaceState({}, document.title, cleanURL);
    }

    function konfirmasiHapus(event, nama, id) {
        event.preventDefault(); 
        const url = event.currentTarget.href; // Ambil URL dari link

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus data pelanggan: " + nama,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Gunakan URL dari link
            }
        });
    }
</script>