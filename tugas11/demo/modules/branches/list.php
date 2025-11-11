<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang. Hanya Admin Pusat.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Cabang</h2>
<a href="<?php echo BASE_URL; ?>modules/branches/add" class="action-link">Tambah Cabang Baru</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Cabang</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM branches ORDER BY branch_name ASC";
            $result = mysqli_query($koneksi, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['branch_id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['branch_name']) . "</td>";
                    echo "<td>" . ($row['address'] ? htmlspecialchars($row['address']) : '-') . "</td>";
                    echo "<td>" . ($row['phone'] ? htmlspecialchars($row['phone']) : '-') . "</td>";
                    echo "<td>" . ($row['email'] ? htmlspecialchars($row['email']) : '-') . "</td>";
                    echo "<td>Edit | Hapus</td>"; // TBD
                    echo "</tr>";
                }
            } else {
                echo "<tr class='no-data'><td colspan='6'>Belum ada data cabang.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>