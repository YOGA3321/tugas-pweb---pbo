<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang. Hanya Admin Pusat.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Pengguna</h2>
<a href="<?php echo BASE_URL; ?>modules/users/add.php" class="action-link">Tambah Pengguna Baru</a>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: 10px;">
    <thead style="background: #f0f0f0;">
        <tr>
            <th style="padding: 8px;">ID</th>
            <th style="padding: 8px;">Nama</th>
            <th style="padding: 8px;">Email</th>
            <th style="padding: 8px;">Role</th>
            <th style="padding: 8px;">Cabang</th>
            <th style="padding: 8px;">Status</th>
            <th style="padding: 8px;">Aksi</th>
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
                echo "<td style='padding: 8px;'>" . $row['user_id'] . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['role_name']) . "</td>";
                echo "<td style='padding: 8px;'>" . ($row['branch_name'] ? htmlspecialchars($row['branch_name']) : '-') . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td style='padding: 8px;'>Edit | Hapus</td>"; // TBD
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='padding: 8px; text-align: center;'>Belum ada data pengguna.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>