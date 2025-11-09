<?php
include 'layout/layout_header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-people-fill"></i> Manajemen Pelanggan</h2>
    <a href="forms/form-tambah-pelanggan" class="btn btn-primary">
        <i class="bi bi-person-plus-fill"></i> Tambah Pelanggan Baru
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Handphone</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM pelanggan ORDER BY nama ASC";
                    $hasil = mysqli_query($koneksi, $query);
                    $no = 1;
                    
                    if (mysqli_num_rows($hasil) > 0) {
                        while($data = mysqli_fetch_assoc($hasil)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $no++ . "</th>";
                            echo "<td>" . htmlspecialchars($data['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['no_hp']) . "</td>";
                            echo "<td>";
                            echo "<a href='forms/form-edit-pelanggan?id=" . $data['id_pelanggan'] . "' class='btn btn-warning btn-sm me-2 mb-2' style='width: 85px;'><i class='bi bi-pencil-square'></i> Edit</a>";
                            echo "<a href='proses/hapus-pelanggan?id=" . $data['id_pelanggan'] . "' class='btn btn-danger btn-sm mb-2' style='width: 85px;'
                                    onclick=\"konfirmasiHapus(event, '" . addslashes(htmlspecialchars($data['nama'])) . "', " . $data['id_pelanggan'] . ")\">
                                    <i class='bi bi-trash-fill'></i> Hapus
                                </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Belum ada data pelanggan.</td></tr>";
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
    // Script ini tetap di sini karena hanya dipakai di halaman ini
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    let timer = 2000;

    if (status === 'sukses_tambah') {
        Swal.fire({
            title: 'Sukses!',
            text: 'Data pelanggan baru berhasil ditambahkan.',
            icon: 'success',
            timer: timer,
            showConfirmButton: false
        });
    } else if (status === 'sukses_edit') {
        Swal.fire({
            title: 'Sukses!',
            text: 'Data pelanggan berhasil diperbarui.',
            icon: 'success',
            timer: timer,
            showConfirmButton: false
        });
    } else if (status === 'sukses_hapus') {
        Swal.fire({
            title: 'Terhapus!',
            text: 'Data pelanggan telah dihapus.',
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