<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat' && $user_role != 'Admin Cabang') {
    die("Akses dilarang. Anda bukan Admin.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Kelas</h2>
<a href="<?php echo BASE_URL; ?>modules/classes/add" class="action-link">Tambah Kelas Baru</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Pengajar (ID)</th>
                <th>Cabang (ID)</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM classes ORDER BY class_name ASC";
            $result = mysqli_query($koneksi, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['class_id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['class_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['teacher_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['branch_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>Edit | Hapus</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='padding: 8px; text-align: center;'>Belum ada data kelas.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div> <?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>