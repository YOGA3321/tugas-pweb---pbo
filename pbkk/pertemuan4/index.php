<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Student Registration App (WPF) - PBKK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css?v=<?= time() ?>">
    <style>
        .badge-subject {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            margin-bottom: 15px;
        }
        .code-summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        .code-summary-box {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
        }
        .code-summary-box h4 {
            margin: 0 0 8px 0;
            color: var(--text-heading);
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .code-summary-box p {
            margin: 0;
            font-size: 0.92rem;
            line-height: 1.6;
            color: var(--text-muted);
        }
        .terminal-box {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 16px 20px;
            border-radius: 10px;
            font-family: 'Consolas', 'Courier New', monospace;
            font-size: 0.92rem;
            margin: 15px 0;
            border-left: 4px solid var(--pbkk-color);
            overflow-x: auto;
        }
        .terminal-box span.prompt {
            color: #4ec9b0;
        }
        .test-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: var(--bg-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-raised-sm);
        }
        .test-table th, .test-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid rgba(163, 177, 198, 0.3);
        }
        .test-table th {
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            font-weight: 700;
        }
        .status-badge-ok {
            background: rgba(16, 185, 129, 0.15);
            color: #059669;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 700;
        }
        .qa-box {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            margin-bottom: 20px;
        }
        .qa-box h4 {
            margin: 0 0 8px 0;
            color: var(--text-heading);
            font-size: 1rem;
        }
        .qa-box p {
            margin: 0;
            font-size: 0.93rem;
            color: var(--text-muted);
            line-height: 1.6;
        }
        .architecture-card {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(79, 70, 229, 0.05));
            border: 1px solid rgba(124, 58, 237, 0.2);
            border-radius: var(--radius-md);
            padding: 24px;
            margin: 25px 0;
        }
        .architecture-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        .architecture-step {
            background: var(--bg-color);
            padding: 15px;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-raised-sm);
            border-left: 3px solid var(--pbkk-color);
        }
        .architecture-step strong {
            display: block;
            color: var(--text-heading);
            margin-bottom: 5px;
            font-size: 0.95rem;
        }
        .architecture-step span {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.4;
            display: block;
        }
        .screenshot-placeholder-box {
            background-color: var(--bg-color);
            padding: 30px 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            text-align: center;
            margin: 20px 0;
        }
        .screenshot-placeholder-box p {
            margin: 8px 0 0 0;
            font-size: 0.9rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Tombol Kembali ke Daftar Tugas PBKK -->
        <a href="../" class="tombol-kembali">&larr; Kembali ke Daftar Tugas PBKK</a>

        <div class="konten-tugas">
            <span class="badge-subject">🚀 Pertemuan 4 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>Mini Project: Student Registration App dengan WPF</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> C# .NET WPF (Windows Presentation Foundation) &bull; 
                <strong>Fitur Tambahan:</strong> Konfirmasi Sebelum Hapus &amp; Dynamic Live Counter Mahasiswa
            </div>

            <hr>

            <!-- 1. Tujuan & Deskripsi Praktikum -->
            <h2>1. Tujuan & Ringkasan Praktikum</h2>
            <p>
                Praktikum Pertemuan 4 ini berfokus pada pengenalan dan implementasi antarmuka pengguna modern berbasis <strong>WPF (Windows Presentation Foundation)</strong> di ekosistem <strong>.NET</strong>. WPF memisahkan perancangan antarmuka (menggunakan <em>eXtensible Application Markup Language</em> atau <strong>XAML</strong>) dari logika bisnis program (menggunakan <strong>C# Code-Behind</strong>).
            </p>
            <p>
                Proyek yang dibangun adalah aplikasi desktop <strong>Student Registration App</strong> (Registrasi Mahasiswa Baru) dengan arsitektur dua kolom:
            </p>
            <ul>
                <li><strong>Kolom Kiri (Formulir Registrasi):</strong> Mengumpulkan data calon mahasiswa meliputi NIM (<code>TextBox</code>), Nama Mahasiswa (<code>TextBox</code>), Program Studi (<code>ComboBox</code>), dan Jenis Kelamin (<code>RadioButton</code>) yang dilengkapi tombol <em>Simpan</em> dan <em>Reset</em>.</li>
                <li><strong>Kolom Kanan (Daftar & Pengelolaan Data):</strong> Menampilkan data mahasiswa yang telah terdaftar ke dalam <code>ListBox</code>, dilengkapi tombol <em>Hapus</em> untuk menghapus item yang dipilih serta <em>Live Counter</em> jumlah mahasiswa.</li>
            </ul>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🏗️ Alur Arsitektur Mini Project WPF</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. UI / XAML</strong>
                        <span>Desain visual deklaratif: Grid layout, TextBox, ComboBox, RadioButton, Button, ListBox.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. Events & Binding</strong>
                        <span>Menghubungkan interaksi tombol Click ke C# handler (BtnSimpan, BtnReset, BtnHapus).</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. Input Validation</strong>
                        <span>Pengecekan kelengkapan data & format sebelum diproses (mencegah data kosong).</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. Data In-Memory CRUD</strong>
                        <span>Menyimpan, menampilkan pada ListBox, serta menghapus data dengan konfirmasi dialog.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🎨 XAML Layouting (Grid)</h4>
                    <p>Mengatur layout responsif dua kolom seimbang dengan pembagian <code>ColumnDefinition Width="*"</code> dan kolom spacer pemisah <code>Width="35"</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🛡️ Validasi Form Berlapis</h4>
                    <p>Memvalidasi seluruh kontrol UI secara berurutan: NIM, Nama, pemilihan Program Studi, serta pemilihan Jenis Kelamin dengan peringatan ramah.</p>
                </div>
                <div class="code-summary-box">
                    <h4>⚠️ Dialog Konfirmasi Hapus</h4>
                    <p>Menampilkan <code>MessageBoxResult.YesNo</code> untuk mencegah penghapusan data secara tidak sengaja oleh pengguna (Level 2 Challenge).</p>
                </div>
                <div class="code-summary-box">
                    <h4>📊 Live Counter Mahasiswa</h4>
                    <p>Menghitung dan memperbarui status <code>Jumlah Mahasiswa: N</code> secara real-time setiap kali data ditambah atau dihapus.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Arsitektur Komponen & Kontrol UI -->
            <h2>2. Spesifikasi Desain Antarmuka & Kontrol (XAML)</h2>
            <p>Sesuai modul panduan <em>Hand-on Lab 1: Student Registration App</em>, kontrol-kontrol berikut disusun secara rapi di dalam <code>MainWindow.xaml</code>:</p>

            <table class="test-table">
                <thead>
                    <tr>
                        <th>Jenis Kontrol</th>
                        <th>x:Name Kontrol</th>
                        <th>Teks / Pilihan Default</th>
                        <th>Peran & Fungsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><code>TextBlock</code></td><td>-</td><td>STUDENT REGISTRATION</td><td>Header judul form sebelah kiri</td></tr>
                    <tr><td><code>TextBox</code></td><td><code>txtNim</code></td><td>(Kosong)</td><td>Input Nomor Induk Mahasiswa (NIM)</td></tr>
                    <tr><td><code>TextBox</code></td><td><code>txtNama</code></td><td>(Kosong)</td><td>Input Nama Lengkap Mahasiswa</td></tr>
                    <tr><td><code>ComboBox</code></td><td><code>cmbProdi</code></td><td>Teknik Informatika, SI, Manajemen, Akuntansi</td><td>Dropdown pemilihan program studi</td></tr>
                    <tr><td><code>RadioButton</code></td><td><code>rbLaki</code> & <code>rbPerempuan</code></td><td>Laki-laki / Perempuan</td><td>Pilihan jenis kelamin eksklusif</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnSimpan</code></td><td>Simpan (Biru)</td><td>Validasi input & simpan data ke ListBox</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnReset</code></td><td>Reset (Abu-abu)</td><td>Mengosongkan form & mengembalikan fokus kursor</td></tr>
                    <tr><td><code>TextBlock</code></td><td>-</td><td>DATA MAHASISWA</td><td>Header daftar data sebelah kanan</td></tr>
                    <tr><td><code>ListBox</code></td><td><code>lstMahasiswa</code></td><td>(Koleksi Data)</td><td>Menampilkan baris data mahasiswa tersimpan</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnHapus</code></td><td>Hapus (Merah)</td><td>Menghapus data mahasiswa terpilih dengan dialog konfirmasi</td></tr>
                    <tr><td><code>TextBlock</code></td><td><code>lblCount</code></td><td>Jumlah Mahasiswa: 0</td><td>Counter indikator dinamis total data</td></tr>
                </tbody>
            </table>

            <hr>

            <!-- 3. Alur Logika Program & Validasi -->
            <h2>3. Penjelasan Logika & Struktur Kode (Code-Behind)</h2>

            <h3>A. Mekanisme Validasi Bertingkat (<code>BtnSimpan_Click</code>)</h3>
            <p>
                Sebelum data digabungkan dan dimasukkan ke dalam <code>lstMahasiswa</code>, fungsi <code>BtnSimpan_Click</code> melakukan validasi berurutan menggunakan kondisi <code>string.IsNullOrWhiteSpace</code> dan pengecekan objek <code>SelectedItem</code>:
            </p>
            <ul>
                <li><strong>Cek NIM:</strong> Memastikan input teks NIM tidak kosong atau hanya berisi spasi. Jika kosong, tampilkan peringatan dan lakukan <code>txtNim.Focus()</code>.</li>
                <li><strong>Cek Nama:</strong> Memastikan input teks Nama terisi dengan benar.</li>
                <li><strong>Cek Program Studi:</strong> Memastikan pengguna telah memilih salah satu item pada <code>ComboBox</code> (kondisi <code>cmbProdi.SelectedItem != null</code>).</li>
                <li><strong>Cek Jenis Kelamin:</strong> Memastikan salah satu dari <code>rbLaki.IsChecked</code> atau <code>rbPerempuan.IsChecked</code> bernilai <code>true</code>.</li>
            </ul>

            <h3>B. Ekstraksi Data & Penggabungan Teks Format</h3>
            <p>
                Setelah semua validasi lolos, teks diambil dari kontrol UI dan digabungkan menjadi sebuah string terformat:
            </p>
            <div class="terminal-box">
                string prodi = ((ComboBoxItem)cmbProdi.SelectedItem).Content.ToString();<br>
                string gender = rbLaki.IsChecked == true ? "Laki-laki" : "Perempuan";<br>
                string data = $"{nim} | {nama} | {prodi} | {gender}";<br>
                lstMahasiswa.Items.Add(data);
            </div>

            <h3>C. Logika Reset Form (<code>BtnReset_Click</code>)</h3>
            <p>
                Fungsi reset membersihkan seluruh input form: mengosongkan <code>txtNim</code>, <code>txtNama</code>, mengatur <code>cmbProdi.SelectedIndex = -1</code> (tidak ada pilihan), mengatur status <code>IsChecked = false</code> pada kedua radio button, serta memindahkan kursor fokus kembali ke <code>txtNim</code>.
            </p>

            <h3>D. Logika Hapus Data Terpilih & Konfirmasi (<code>BtnHapus_Click</code>)</h3>
            <p>
                Jika pengguna mengklik tombol <em>Hapus</em> tanpa memilih item terlebih dahulu di <code>ListBox</code> (kondisi <code>lstMahasiswa.SelectedItem == null</code>), sistem memunculkan pesan peringatan. Jika item sudah dipilih, sistem memunculkan dialog konfirmasi <code>MessageBoxButton.YesNo</code>. Data hanya akan dihapus jika pengguna memilih opsi <em>Yes</em>.
            </p>

            <hr>

            <!-- 4. Panduan Menjalankan Program -->
            <h2>4. Cara Menjalankan Aplikasi di Komputer Desktop</h2>
            <p>Aplikasi ini dapat dijalankan langsung di sistem operasi Windows menggunakan perintah .NET CLI:</p>

            <div class="terminal-box">
                <span class="prompt"># 1. Buka Terminal / PowerShell dan arahkan ke folder demo:</span><br>
                cd pbkk/pertemuan4/demo<br><br>
                <span class="prompt"># 2. Build proyek untuk memastikan tidak ada kesalahan:</span><br>
                dotnet build<br><br>
                <span class="prompt"># 3. Jalankan aplikasi desktop WPF:</span><br>
                dotnet run
            </div>

            <p>Jendela desktop aplikasi <strong>Student Registration App</strong> akan terbuka secara otomatis di tengah layar.</p>

            <hr>

            <!-- 5. Source Code Lengkap -->
            <h2>5. Source Code Lengkap</h2>

            <h3>A. Tampilan Deklaratif: <code>MainWindow.xaml</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeXaml')">Copy Code</button>
                <pre><code id="codeXaml">&lt;Window x:Class="StudentRegistrationApp.MainWindow"
        xmlns="http://schemas.microsoft.com/winfx/2006/xaml/presentation"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        Title="Student Registration"
        Height="640"
        Width="880"
        WindowStartupLocation="CenterScreen"
        Background="#F8F9FA"&gt;
    
    &lt;Grid Margin="30"&gt;
        &lt;Grid.ColumnDefinitions&gt;
            &lt;ColumnDefinition Width="*"/&gt;
            &lt;ColumnDefinition Width="35"/&gt;
            &lt;ColumnDefinition Width="*"/&gt;
        &lt;/Grid.ColumnDefinitions&gt;

        &lt;!-- KOLOM KIRI: FORM REGISTRASI MAHASISWA --&gt;
        &lt;StackPanel Grid.Column="0"&gt;
            &lt;TextBlock Text="STUDENT REGISTRATION"
                       FontSize="24"
                       FontWeight="Bold"
                       Foreground="#1E293B"
                       Margin="0,0,0,20"/&gt;

            &lt;!-- Input NIM --&gt;
            &lt;TextBlock Text="NIM" FontWeight="SemiBold" Foreground="#475569" Margin="0,0,0,5"/&gt;
            &lt;TextBox x:Name="txtNim" Height="36" Margin="0,0,0,15" VerticalContentAlignment="Center" Padding="10,0" FontSize="14"/&gt;

            &lt;!-- Input Nama Mahasiswa --&gt;
            &lt;TextBlock Text="Nama Mahasiswa" FontWeight="SemiBold" Foreground="#475569" Margin="0,0,0,5"/&gt;
            &lt;TextBox x:Name="txtNama" Height="36" Margin="0,0,0,15" VerticalContentAlignment="Center" Padding="10,0" FontSize="14"/&gt;

            &lt;!-- Input Program Studi --&gt;
            &lt;TextBlock Text="Program Studi" FontWeight="SemiBold" Foreground="#475569" Margin="0,0,0,5"/&gt;
            &lt;ComboBox x:Name="cmbProdi" Height="36" Margin="0,0,0,15" VerticalContentAlignment="Center" FontSize="14"&gt;
                &lt;ComboBoxItem Content="Teknik Informatika"/&gt;
                &lt;ComboBoxItem Content="Sistem Informasi"/&gt;
                &lt;ComboBoxItem Content="Manajemen"/&gt;
                &lt;ComboBoxItem Content="Akuntansi"/&gt;
            &lt;/ComboBox&gt;

            &lt;!-- Input Jenis Kelamin --&gt;
            &lt;TextBlock Text="Jenis Kelamin" FontWeight="SemiBold" Foreground="#475569" Margin="0,0,0,8"/&gt;
            &lt;StackPanel Orientation="Horizontal" Margin="0,0,0,25"&gt;
                &lt;RadioButton x:Name="rbLaki" Content="Laki-laki" Margin="0,0,25,0" VerticalContentAlignment="Center" FontSize="14"/&gt;
                &lt;RadioButton x:Name="rbPerempuan" Content="Perempuan" VerticalContentAlignment="Center" FontSize="14"/&gt;
            &lt;/StackPanel&gt;

            &lt;!-- Tombol Aksi: Simpan &amp; Reset --&gt;
            &lt;StackPanel Orientation="Horizontal"&gt;
                &lt;Button Content="Simpan" Width="130" Height="42" Margin="0,0,12,0"
                        Background="#0D6EFD" Foreground="White" FontWeight="Bold" FontSize="14" Cursor="Hand"
                        Click="BtnSimpan_Click"/&gt;
                &lt;Button Content="Reset" Width="130" Height="42"
                        Background="#6C757D" Foreground="White" FontWeight="Bold" FontSize="14" Cursor="Hand"
                        Click="BtnReset_Click"/&gt;
            &lt;/StackPanel&gt;
        &lt;/StackPanel&gt;

        &lt;!-- KOLOM KANAN: DAFTAR DATA MAHASISWA --&gt;
        &lt;StackPanel Grid.Column="2"&gt;
            &lt;TextBlock Text="DATA MAHASISWA"
                       FontSize="24"
                       FontWeight="Bold"
                       Foreground="#1E293B"
                       Margin="0,0,0,20"/&gt;

            &lt;!-- List Data Mahasiswa --&gt;
            &lt;ListBox x:Name="lstMahasiswa" Height="360" Margin="0,0,0,15" FontSize="14" Padding="8" BorderBrush="#CBD5E1" BorderThickness="1"/&gt;

            &lt;!-- Tombol Hapus --&gt;
            &lt;StackPanel Orientation="Horizontal" HorizontalAlignment="Right"&gt;
                &lt;Button Content="Hapus" Width="130" Height="42"
                        Background="#DC3545" Foreground="White" FontWeight="Bold" FontSize="14" Cursor="Hand"
                        Click="BtnHapus_Click"/&gt;
            &lt;/StackPanel&gt;

            &lt;!-- Counter Jumlah Mahasiswa --&gt;
            &lt;TextBlock x:Name="lblCount" Text="Jumlah Mahasiswa: 0" FontStyle="Italic" Foreground="#64748B" FontSize="13" Margin="0,10,0,0"/&gt;
        &lt;/StackPanel&gt;
    &lt;/Grid&gt;
&lt;/Window&gt;</code></pre>
            </div>

            <h3>B. File Logika: <code>MainWindow.xaml.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeCs')">Copy Code</button>
                <pre><code id="codeCs">using System;
using System.Windows;
using System.Windows.Controls;

namespace StudentRegistrationApp
{
    /// &lt;summary&gt;
    /// Interaction logic for MainWindow.xaml
    /// Mini Project: Student Registration App dengan WPF
    /// &lt;/summary&gt;
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            UpdateCounter();
        }

        // ========================================================
        // EVENT TOMBOL SIMPAN &amp; VALIDASI BERLENGKAP
        // ========================================================
        private void BtnSimpan_Click(object sender, RoutedEventArgs e)
        {
            // Validasi 1: NIM harus diisi
            if (string.IsNullOrWhiteSpace(txtNim.Text))
            {
                MessageBox.Show("NIM harus diisi!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                txtNim.Focus();
                return;
            }

            // Validasi 2: Nama harus diisi
            if (string.IsNullOrWhiteSpace(txtNama.Text))
            {
                MessageBox.Show("Nama harus diisi!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                txtNama.Focus();
                return;
            }

            // Validasi 3: Program Studi harus dipilih
            if (cmbProdi.SelectedItem == null)
            {
                MessageBox.Show("Pilih program studi!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                cmbProdi.Focus();
                return;
            }

            // Validasi 4: Jenis Kelamin harus dipilih
            if (rbLaki.IsChecked != true &amp;&amp; rbPerempuan.IsChecked != true)
            {
                MessageBox.Show("Pilih jenis kelamin!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                return;
            }

            // Ambil data dari masing-masing kontrol UI
            string nim = txtNim.Text.Trim();
            string nama = txtNama.Text.Trim();
            string prodi = "";
            if (cmbProdi.SelectedItem is ComboBoxItem item)
            {
                prodi = item.Content.ToString();
            }

            string jenisKelamin = rbLaki.IsChecked == true ? "Laki-laki" : "Perempuan";

            // Format baris data
            string data = $"{nim} | {nama} | {prodi} | {jenisKelamin}";

            // Masukkan data ke dalam ListBox
            lstMahasiswa.Items.Add(data);
            UpdateCounter();

            // Tampilkan pesan konfirmasi berhasil
            MessageBox.Show("Data mahasiswa berhasil disimpan!", "Informasi", MessageBoxButton.OK, MessageBoxImage.Information);

            // Bersihkan form input agar siap input data berikutnya
            BtnReset_Click(sender, e);
        }

        // ========================================================
        // EVENT TOMBOL RESET
        // ========================================================
        private void BtnReset_Click(object sender, RoutedEventArgs e)
        {
            txtNim.Clear();
            txtNama.Clear();
            cmbProdi.SelectedIndex = -1;
            rbLaki.IsChecked = false;
            rbPerempuan.IsChecked = false;
            txtNim.Focus();
        }

        // ========================================================
        // EVENT TOMBOL HAPUS (DENGAN KONFIRMASI)
        // ========================================================
        private void BtnHapus_Click(object sender, RoutedEventArgs e)
        {
            if (lstMahasiswa.SelectedItem != null)
            {
                // Konfirmasi sebelum menghapus data (Level 2 Challenge)
                MessageBoxResult confirm = MessageBox.Show(
                    "Apakah Anda yakin ingin menghapus data mahasiswa yang dipilih?",
                    "Konfirmasi Hapus",
                    MessageBoxButton.YesNo,
                    MessageBoxImage.Question
                );

                if (confirm == MessageBoxResult.Yes)
                {
                    lstMahasiswa.Items.Remove(lstMahasiswa.SelectedItem);
                    UpdateCounter();
                    MessageBox.Show("Data berhasil dihapus!", "Informasi", MessageBoxButton.OK, MessageBoxImage.Information);
                }
            }
            else
            {
                MessageBox.Show("Pilih data yang ingin dihapus!", "Peringatan", MessageBoxButton.OK, MessageBoxImage.Warning);
            }
        }

        // ========================================================
        // HELPER: COUNTER JUMLAH MAHASISWA
        // ========================================================
        private void UpdateCounter()
        {
            if (lblCount != null)
            {
                lblCount.Text = $"Jumlah Mahasiswa: {lstMahasiswa.Items.Count}";
            }
        }
    }
}</code></pre>
            </div>

            <h3>C. File Konfigurasi Project: <code>demo.csproj</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeCsproj')">Copy Code</button>
                <pre><code id="codeCsproj">&lt;Project Sdk="Microsoft.NET.Sdk"&gt;

  &lt;PropertyGroup&gt;
    &lt;OutputType&gt;WinExe&lt;/OutputType&gt;
    &lt;TargetFramework&gt;net10.0-windows&lt;/TargetFramework&gt;
    &lt;Nullable&gt;disable&lt;/Nullable&gt;
    &lt;ImplicitUsings&gt;enable&lt;/ImplicitUsings&gt;
    &lt;UseWPF&gt;true&lt;/UseWPF&gt;
    &lt;RootNamespace&gt;StudentRegistrationApp&lt;/RootNamespace&gt;
    &lt;AssemblyName&gt;StudentRegistrationApp&lt;/AssemblyName&gt;
  &lt;/PropertyGroup&gt;

&lt;/Project&gt;</code></pre>
            </div>

            <hr>

            <!-- 6. Tabel Skenario Pengujian Aplikasi -->
            <h2>6. Tabel Pengujian Fungsionalitas Aplikasi</h2>
            <p>Berdasarkan panduan <strong>Step 11 &mdash; Uji Aplikasi</strong> dari modul praktikum, berikut adalah hasil uji fungsionalitas keseluruhan aplikasi:</p>

            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Aksi Pengguna</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 100px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Semua field kosong</td>
                        <td>Klik tombol <strong>Simpan</strong> langsung</td>
                        <td>Muncul validasi peringatan <code>"NIM harus diisi!"</code> dan kursor fokus ke input NIM.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>NIM belum diisi</td>
                        <td>Isi Nama, Prodi, Gender, kosongkan NIM &rarr; Klik <strong>Simpan</strong></td>
                        <td>Muncul popup peringatan <code>"NIM harus diisi!"</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Nama belum diisi</td>
                        <td>Isi NIM, Prodi, Gender, kosongkan Nama &rarr; Klik <strong>Simpan</strong></td>
                        <td>Muncul popup peringatan <code>"Nama harus diisi!"</code> dan kursor fokus ke input Nama.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Prodi belum dipilih</td>
                        <td>Isi NIM, Nama, Gender, biarkan ComboBox belum dipilih &rarr; Klik <strong>Simpan</strong></td>
                        <td>Muncul popup peringatan <code>"Pilih program studi!"</code> dan fokus ke dropdown Prodi.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Gender belum dipilih</td>
                        <td>Isi NIM, Nama, pilih Prodi, jangan centang radio gender &rarr; Klik <strong>Simpan</strong></td>
                        <td>Muncul popup peringatan <code>"Pilih jenis kelamin!"</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Semua data benar &amp; lengkap</td>
                        <td>Isi NIM: <code>5025241225</code>, Nama: <code>Ageng Prayogo</code>, Prodi: <code>Teknik Informatika</code>, Gender: <code>Laki-laki</code> &rarr; Klik <strong>Simpan</strong></td>
                        <td>Muncul pesan sukses, form otomatis bersih, data masuk ke ListBox, dan counter bertambah.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Tombol Reset diklik</td>
                        <td>Ketik data pada form lalu klik tombol <strong>Reset</strong></td>
                        <td>Formulir kembali kosong dan fokus kursor kembali ke input NIM.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Pilih data lalu Hapus (Disetujui)</td>
                        <td>Klik salah satu baris di ListBox &rarr; Klik tombol <strong>Hapus</strong> &rarr; Pilih <strong>Yes</strong></td>
                        <td>Item terhapus dari ListBox, pesan sukses muncul, dan counter berkurang.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Pilih data lalu Batal Hapus</td>
                        <td>Pilih item di ListBox &rarr; Klik <strong>Hapus</strong> &rarr; Pilih <strong>No</strong></td>
                        <td>Penghapusan dibatalkan, data tetap berada di ListBox, dan counter tidak berubah.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Hapus tanpa memilih item</td>
                        <td>Klik tombol <strong>Hapus</strong> saat tidak ada item terpilih di ListBox</td>
                        <td>Muncul popup peringatan <code>"Pilih data yang ingin dihapus!"</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 7. Pertanyaan Pemahaman & Konsep WPF -->
            <h2>7. Pertanyaan Pemahaman &amp; Konsep WPF</h2>

            <div class="qa-box">
                <h4>Q1: Apa perbedaan mendasar antara WPF (Windows Presentation Foundation) dan Windows Forms?</h4>
                <p><strong>Jawaban:</strong> Windows Forms menggunakan rendering GDI/GDI+ standar yang terikat erat pada kontrol Windows native, di mana UI dan logika sering kali tercampur dalam file designer C#. Sebaliknya, WPF menggunakan mesin rendering berbasis DirectX dengan pemisahan yang bersih antara deklarasi UI (menggunakan XAML) dan logika bisnis (C#). WPF juga mendukung vector graphics resolusi tinggi, data binding yang sangat fleksibel, dan sistem styling/templating yang jauh lebih powerful.</p>
            </div>

            <div class="qa-box">
                <h4>Q2: Mengapa XAML digunakan untuk mendesain antarmuka pada WPF?</h4>
                <p><strong>Jawaban:</strong> XAML (eXtensible Application Markup Language) berbasis XML memudahkan deklarasi struktur hirarki antarmuka secara terstruktur, mudah dibaca, dan independen dari logika komputasi. Ini memungkinkan kolaborasi yang mulus antara UI designer dan software engineer (*separation of concerns*).</p>
            </div>

            <div class="qa-box">
                <h4>Q3: Bagaimana mekanisme kerja layout <code>Grid</code> dengan <code>ColumnDefinition Width="*"</code>?</h4>
                <p><strong>Jawaban:</strong> Properti <code>Width="*"</code> menggunakan sistem <em>Star Sizing</em> (proporsional). Ketika dua kolom sama-sama diberi nilai <code>*</code>, ruang horizontal yang tersedia pada Window akan dibagi rata 50:50 setelah kolom berukuran absolut (seperti kolom pemisah <code>Width="35"</code>) dialokasikan.</p>
            </div>

            <div class="qa-box">
                <h4>Q4: Apa fungsi properti <code>x:Name</code> pada elemen XAML?</h4>
                <p><strong>Jawaban:</strong> Properti <code>x:Name</code> mendaftarkan elemen XAML ke dalam scope kode C# (Code-Behind). Dengan memberikan <code>x:Name="txtNim"</code>, kita dapat langsung mengakses objek kontrol tersebut dari file <code>MainWindow.xaml.cs</code> untuk membaca nilai teksnya (<code>txtNim.Text</code>), membersihkannya (<code>txtNim.Clear()</code>), atau mengatur fokus kursor (<code>txtNim.Focus()</code>).</p>
            </div>

            <div class="qa-box">
                <h4>Q5: Mengapa validasi <code>string.IsNullOrWhiteSpace()</code> lebih dianjurkan daripada <code>text == ""</code>?</h4>
                <p><strong>Jawaban:</strong> Karena <code>string.IsNullOrWhiteSpace()</code> memvalidasi tiga kondisi sekaligus: apakah nilai string bernilai <code>null</code>, berukuran kosong (<code>""</code>), atau hanya terdiri dari karakter spasi kosong (*whitespace*). Ini mencegah input palsu seperti spasi kosong lolos dari validasi.</p>
            </div>

            <hr>

            <!-- 8. Dokumentasi Tangkapan Layar -->
            <h2>8. Tangkapan Layar Aplikasi</h2>
            <div class="screenshot-placeholder-box">
                <div style="font-size: 3rem; margin-bottom: 10px;">📋 🖥️</div>
                <h4 style="margin: 0; color: var(--text-heading);">Antarmuka Aplikasi Student Registration App (WPF)</h4>
                <p>Aplikasi desktop aktif dan dapat dijalankan via <code>dotnet run</code> di folder <code>pbkk/pertemuan4/demo/</code>.</p>
                <div style="margin-top: 15px; display: inline-block; padding: 8px 16px; background: rgba(124, 58, 237, 0.1); color: var(--pbkk-color); border-radius: 8px; font-size: 0.88rem; font-weight: 600;">
                    ✓ Status: Build Succeeded (net10.0-windows)
                </div>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 4 &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
        </footer>
    </div>

    <!-- Modal Gambar Zoom -->
    <div id="myModal" class="modal" onclick="closeModal()">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
    function copyCode(button, elementId) {
        const codeElement = document.getElementById(elementId);
        navigator.clipboard.writeText(codeElement.innerText).then(function() {
            button.innerText = 'Copied!';
            setTimeout(function() { button.innerText = 'Copy Code'; }, 2000);
        }, function(err) {
            button.innerText = 'Gagal';
        });
    }

    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    function openModal(element) {
        modal.style.display = "block";
        modal.style.opacity = "1";
        modalImg.src = element.src;
    }

    function closeModal() {
        modal.style.opacity = "0";
        setTimeout(function() {
            modal.style.display = "none";
        }, 300);
    }
    </script>
</body>
</html>
