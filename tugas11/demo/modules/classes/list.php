<?php
// PERBAIKAN: Panggil config.php PERTAMA dan dengan path yang BENAR
include('../../config.php'); 
include('../../includes/auth.php');

// Hanya Admin Pusat atau Admin Cabang yang boleh akses
if ($user_role != 'Admin Pusat' && $user_role != 'Admin Cabang') {
    die("Akses dilarang. Anda bukan Admin.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Kelas</h2>
<a href="<?php echo BASE_URL; ?>modules/classes/add.php" class="action-link">Tambah Kelas Baru</a>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: 10px;">
    <thead style="background: #f0f0f0;">
        <tr>
            <th style="padding: 8px;">ID</th>
            <th style="padding: 8px;">Nama Kelas</th>
            <th style="padding: 8px;">Pengajar (ID)</th>
            <th style="padding: 8px;">Cabang (ID)</th>
            <th style="padding: 8px;">Status</th>
            <th style="padding: 8px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM classes ORDER BY class_name ASC";
        $result = mysqli_query($koneksi, $query); // PERBAIKAN: Gunakan $koneksi
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='padding: 8px;'>" . $row['class_id'] . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['class_name']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['teacher_id']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['branch_id']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td style='padding: 8px;'>Edit | Hapus</td>"; // TBD
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='padding: 8px; text-align: center;'>Belum ada data kelas.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
mysqli_close($koneksi); // PERBAIKAN: Gunakan $koneksi
include('../../includes/footer.php');
?>