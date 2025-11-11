<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Info & Pengumuman</h2>
<a href="<?php echo BASE_URL; ?>modules/info/add" class="action-link">Buat Pengumuman Baru</a>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Target Role</th>
                <th>Dibuat Oleh</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Join dengan tabel users untuk mendapatkan nama pembuat
            $query = "SELECT a.*, u.name AS creator_name 
                      FROM announcements a 
                      LEFT JOIN users u ON a.created_by = u.user_id 
                      ORDER BY a.created_at DESC";
            
            $result = mysqli_query($koneksi, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['target_role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['creator_name']) . "</td>";
                    echo "<td>" . date('d M Y, H:i', strtotime($row['created_at'])) . "</td>";
                    echo "<td>Edit | Hapus</td>"; // TBD
                    echo "</tr>";
                }
            } else {
                echo "<tr class='no-data'><td colspan='5'>Belum ada pengumuman.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>