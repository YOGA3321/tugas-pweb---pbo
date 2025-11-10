<?php
include('../../config.php'); 
include('../../includes/auth.php');

if ($user_role != 'Admin Pusat') {
    die("Akses dilarang.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Manajemen Info & Pengumuman</h2>
<a href="<?php echo BASE_URL; ?>modules/info/add.php" class="action-link">Buat Pengumuman Baru</a>

<table width="100%" border="1" style="border-collapse: collapse; margin-top: 10px;">
    <thead style="background: #f0f0f0;">
        <tr>
            <th style="padding: 8px;">Judul</th>
            <th style="padding: 8px;">Target Role</th>
            <th style="padding: 8px;">Dibuat Oleh</th>
            <th style="padding: 8px;">Tanggal</th>
            <th style="padding: 8px;">Aksi</th>
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
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['target_role']) . "</td>";
                echo "<td style='padding: 8px;'>" . htmlspecialchars($row['creator_name']) . "</td>";
                echo "<td style='padding: 8px;'>" . date('d M Y, H:i', strtotime($row['created_at'])) . "</td>";
                echo "<td style='padding: 8px;'>Edit | Hapus</td>"; // TBD
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='padding: 8px; text-align: center;'>Belum ada pengumuman.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>