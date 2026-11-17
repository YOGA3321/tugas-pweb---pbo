<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 50%, #f3e8ff 100%);
            color: #1e293b;
        }

        .profile-card {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            border-radius: 24px;
            padding: 38px 32px 30px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(124, 58, 237, 0.06);
            border: 1px solid rgba(226, 232, 240, 0.9);
            text-align: center;
        }

        .avatar-wrapper {
            width: 112px;
            height: 112px;
            margin: 0 auto 18px;
            padding: 4px;
            border-radius: 50%;
            background: linear-gradient(135deg, #7c3aed, #2563eb);
            box-shadow: 0 10px 24px rgba(124, 58, 237, 0.22);
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            background: #ffffff;
        }

        .badge-semester {
            display: inline-block;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.1);
            color: #6d28d9;
            margin-bottom: 12px;
        }

        .profile-name {
            font-size: 1.55rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .profile-nrp {
            font-size: 0.95rem;
            font-weight: 500;
            color: #64748b;
            margin-bottom: 24px;
        }

        .info-list {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 8px 18px;
            text-align: left;
            margin-bottom: 22px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
            gap: 12px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 0.86rem;
            color: #64748b;
            font-weight: 500;
        }

        .info-value {
            font-size: 0.92rem;
            color: #0f172a;
            font-weight: 600;
            text-align: right;
        }

        .card-footer {
            font-size: 0.78rem;
            color: #94a3b8;
        }

        .card-footer span {
            color: #6d28d9;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <main class="profile-card">
        <div class="avatar-wrapper">
            <img src="<?= base_url('images/avatar.jpg') ?>"
                 alt="Foto Profil <?= esc($nama) ?>"
                 class="avatar-img"
                 onerror="this.src='images/avatar.jpg'; this.onerror=function(){this.style.display='none';};">
        </div>

        <span class="badge-semester"><?= esc($status) ?> &bull; <?= esc($semester) ?></span>

        <h1 class="profile-name"><?= esc($nama) ?></h1>
        <p class="profile-nrp">NRP <?= esc($nrp) ?></p>

        <section class="info-list" aria-label="Biodata Mahasiswa">
            <div class="info-row">
                <span class="info-label">Nama Lengkap</span>
                <span class="info-value"><?= esc($nama) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">NRP</span>
                <span class="info-value"><?= esc($nrp) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Jurusan</span>
                <span class="info-value"><?= esc($jurusan) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Angkatan</span>
                <span class="info-value"><?= esc($angkatan) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Semester Saat Ini</span>
                <span class="info-value"><?= esc($semester) ?></span>
            </div>
        </section>

        <footer class="card-footer">
            Dibangun dengan <span>CodeIgniter 4</span> &bull; Data Statis (Tanpa Database)
        </footer>
    </main>

</body>
</html>
