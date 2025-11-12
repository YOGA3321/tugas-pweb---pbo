<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Pendaftaran Siswa - BIMBINGKU</title>
    <link rel="stylesheet" href="css/style-register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <main class="page">
        <section class="card left-panel">
            <div class="brand">
                <h1>BIMBINGKU</h1>
                <p>Sistem Manajemen Kursus &amp; Bimbingan</p>
            </div>
            <div class="info">
                <h3>Daftar Sekarang</h3>
                <p>Isi formulir pendaftaran di sebelah kanan. Pastikan data benar dan unggah foto terbaru.</p>
                <ul>
                    <li>Foto JPG/PNG, max 2MB</li>
                    <li>Semua field wajib diisi kecuali catatan opsional</li>
                    <li>Admin akan memverifikasi pendaftaran</li>
                </ul>
            </div>
        </section>
        
        <section class="card right-panel">
            <h2>Pendaftaran Siswa Baru</h2>
            <form id="registerForm" action="prosses/register_process.php" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col">
                        <label for="full_name">Nama Lengkap <span class="req">*</span></label>
                        <input id="full_name" name="full_name" type="text" required placeholder="Contoh: Andi Susanto">
                    </div>
                    <div class="col">
                        <label for="birth_date">Tanggal Lahir <span class="req">*</span></label>
                        <input id="birth_date" name="birth_date" type="date" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="email">Email <span class="req">*</span></label>
                        <input id="email" name="email" type="email" required placeholder="email@example.com">
                    </div>
                    <div class="col">
                        <label for="phone">Nomor HP <span class="req">*</span></label>
                        <input id="phone" name="phone" type="tel" required placeholder="0812xxxxxxx">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-full">
                        <label for="address">Alamat Lengkap <span class="req">*</span></label>
                        <textarea id="address" name="address" rows="3" required placeholder="Jl. Merdeka No. ..."></textarea>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="branch">Pilih Cabang <span class="req">*</span></label>
                        <select id="branch" name="branch_id" required>
                            <option value="">-- Pilih Cabang --</option>
                            <option value="1">Cabang Surabaya</option>
                            <option value="2">Cabang Malang</option>
                            <option value="3">Cabang Jember</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="class">Pilih Kelas <span class="req">*</span></label>
                        <select id="class" name="class_id" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="101">Matematika Dasar</option>
                            <option value="102">Bahasa Inggris</option>
                            <option value="103">Pemrograman Web</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="photo">Upload Foto Siswa <span class="req">*</span></label>
                        <input id="photo" name="photo" type="file" accept="image/png, image/jpeg" required>
                        <small class="hint">Format JPG/PNG, maks 2MB</small>
                    </div>
                    <div class="col preview-col">
                        <label>Preview Foto</label>
                        <div id="photoPreview" class="photo-preview">
                            <span class="empty">Belum ada foto</span>
                            <img id="photoImg" src="#" alt="preview" style="display:none;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-full">
                        <label for="payment_proof">Upload Bukti Pembayaran (Opsional)</label>
                        <input id="payment_proof" name="payment_proof" type="file" accept="image/png, image/jpeg, application/pdf">
                        <small class="hint">Format JPG/PNG/PDF, maks 2MB</small>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-full">
                        <label for="notes">Catatan (opsional)</label>
                        <textarea id="notes" name="notes" rows="2" placeholder="Mis. kebutuhan khusus atau catatan lainnya"></textarea>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button onclick="window.location.href='login';" type="button" class="btn btn-danger" title="Kembali ke login">Login</button>
                    <button type="submit" class="btn primary" title="apakah anda yakin ingin mengirimkan?">Kirim Pendaftaran</button>
                    <button type="reset" class="btn ghost" title="apakah anda ingin mereset?">Reset</button>
                </div>
                <div id="formMessage" class="form-message" aria-live="polite"></div>
            </form>
        </section>
    </main>
    
    <script>
    // Photo preview & client-side validation for file size/type
    const photoInput = document.getElementById('photo');
    const previewImg = document.getElementById('photoImg');
    const previewBox = document.getElementById('photoPreview');
    const emptyText = previewBox.querySelector('.empty');
    const MAX_SIZE = 2 * 1024 * 1024; // 2MB

    photoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) {
            previewImg.style.display = 'none';
            emptyText.style.display = 'block';
            return;
        }

        if (!['image/jpeg', 'image/png'].includes(file.type)) {
            alert('Tipe file tidak didukung. Gunakan JPG atau PNG.');
            photoInput.value = "";
            return;
        }

        if (file.size > MAX_SIZE) {
            alert('Ukuran file melebihi 2MB. Mohon pilih foto lebih kecil.');
            photoInput.value = "";
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
            emptyText.style.display = 'none';
        }
        reader.readAsDataURL(file);
    });

    // Basic client-side form validation feedback
    const form = document.getElementById('registerForm');
    const formMessage = document.getElementById('formMessage');
    
    form.addEventListener('submit', function (e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            formMessage.textContent = 'Form belum lengkap. Mohon periksa kembali field yang wajib.';
            formMessage.className = 'form-message error';
            return;
        }
        formMessage.textContent = 'Mengirim...';
        formMessage.className = 'form-message info';
    });
    </script>
</body>
</html>