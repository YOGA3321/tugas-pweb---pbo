<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang. Hanya Admin Pusat.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Pengguna</h2>
<a href="<?php echo BASE_URL; ?>modules/users/add" class="action-link">Tambah Pengguna Baru</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Cabang</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT u.user_id, u.name, u.email, u.status, r.role_name, b.branch_name 
                      FROM users u 
                      LEFT JOIN roles r ON u.role_id = r.role_id 
                      LEFT JOIN branches b ON u.branch_id = b.branch_id
                      ORDER BY u.name ASC";
            
            $result = mysqli_query($koneksi, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role_name']) . "</td>";
                    echo "<td>" . ($row['branch_name'] ? htmlspecialchars($row['branch_name']) : '-') . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>Edit | Hapus</td>"; // TBD
                    echo "</tr>";
                }
            } else {
                echo "<tr class='no-data'><td colspan='7'>Belum ada data pengguna.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>