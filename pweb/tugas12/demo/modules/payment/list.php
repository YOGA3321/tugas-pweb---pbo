<?php
include('../../config.php'); 
include('../../includes/auth.php');

if (!in_array($user_role, ['Admin Pusat', 'Admin Cabang', 'Keuangan'])) {
    die("Akses dilarang.");
}

include('../../includes/header.php');
?>

<h2 class="page-title">Verifikasi Pembayaran Pendaftaran</h2>
<p style="margin-top: -20px; color: var(--muted);">Daftar siswa baru yang menunggu persetujuan.</p>

<div class="table-wrapper">
    <table class="table-modern">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Email / Telepon</th>
                <th>Tgl Daftar</th>
                <th>Kelas</th>
                <th>Cabang</th>
                <th>Bukti Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT s.*, c.class_name, b.branch_name 
                      FROM students s
                      LEFT JOIN classes c ON s.class_id = c.class_id
                      LEFT JOIN branches b ON s.branch_id = b.branch_id
                      WHERE s.status = 'Menunggu'
                      ORDER BY s.registration_date ASC";
            
            $result = mysqli_query($koneksi, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>";
                    echo "  <strong>" . htmlspecialchars($row['name']) . "</strong><br>";
                    echo "  <small>(ID: " . $row['student_id'] . ")</small>";
                    echo "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "<br>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . date('d M Y', strtotime($row['registration_date'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['class_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['branch_name']) . "</td>";
                    
                    echo "<td>";
                    if (!empty($row['payment_proof'])) {
                        $proof_url = BASE_URL . 'uploads/payments/' . $row['payment_proof'];
                        echo "<a href='" . $proof_url . "' target='_blank' class='btn primary' style='font-size: 12px; padding: 5px 8px;'>Lihat Bukti</a>";
                    } else {
                        echo "<span style='color: red; font-size: 12px;'>Belum diupload</span>";
                    }
                    echo "</td>";
                    
                    echo "<td style='display: flex; gap: 5px; flex-direction: column;'>";
                    // Form Setujui
                    echo "  <form action='" . BASE_URL . "prosses/payment_verify_process.php' method='POST' onsubmit='return confirm(\"Setujui siswa ini?\");' style='margin: 0;'>";
                    echo "    <input type='hidden' name='student_id' value='" . $row['student_id'] . "'>";
                    echo "    <input type='hidden' name='new_status' value='Diterima'>";
                    echo "    <button type='submit' class='btn primary' style='width: 100%; background: #28a745; font-size: 12px; padding: 5px 8px;'>Setujui</button>";
                    echo "  </form>";
                    // Form Tolak
                    echo "  <form action='" . BASE_URL . "prosses/payment_verify_process.php' method='POST' onsubmit='return confirm(\"Tolak siswa ini?\");' style='margin: 0;'>";
                    echo "    <input type='hidden' name='student_id' value='" . $row['student_id'] . "'>";
                    echo "    <input type='hidden' name='new_status' value='Ditolak'>";
                    echo "    <button type='submit' class='btn' style='width: 100%; background: #dc3545; color: white; font-size: 12px; padding: 5px 8px;'>Tolak</button>";
                    echo "  </form>";
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr class='no-data'><td colspan='7'>Tidak ada pendaftaran yang menunggu verifikasi.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
mysqli_close($koneksi);
include('../../includes/footer.php');
?>