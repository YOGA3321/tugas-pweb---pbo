<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Student Management System MVVM (.NET Avalonia) - PBKK</title>
    
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
        .screenshot-frame {
            background-color: var(--bg-color);
            padding: 18px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            text-align: center;
            margin: 20px 0;
        }
        .screenshot-frame img {
            margin: 0;
            border-radius: 10px;
            border: 1px solid rgba(148, 163, 184, 0.35);
        }
        .github-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.04), rgba(124, 58, 237, 0.06));
            border: 1px solid rgba(124, 58, 237, 0.25);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin: 20px 0 25px;
        }
        .github-box-info strong {
            display: block;
            color: var(--text-heading);
            font-size: 0.96rem;
        }
        .github-box-info span {
            font-size: 0.86rem;
            color: var(--text-muted);
            word-break: break-all;
        }
        .btn-github {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 10px;
            background: #1e293b;
            color: #ffffff !important;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            transition: var(--transition);
        }
        .btn-github:hover {
            background: var(--pbkk-color);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Tombol Kembali ke Daftar Tugas PBKK -->
        <a href="../" class="tombol-kembali">&larr; Kembali ke Daftar Tugas PBKK</a>

        <div class="konten-tugas">
            <span class="badge-subject">🚀 Pertemuan 5 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>Student Management System dengan Pola Arsitektur MVVM (.NET Avalonia UI)</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> C# .NET 10, Avalonia UI 12 (Cross-Platform XAML), CommunityToolkit.Mvvm &bull; 
                <strong>Fitur Unggulan:</strong> CRUD Lengkap, Pencarian &amp; Filter Prodi, Dashboard Statistik Real-Time (LINQ)
            </div>

            <div class="github-box">
                <div class="github-box-info">
                    <strong>📦 Repositori GitHub Source Code</strong>
                    <span>https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan5/demo</span>
                </div>
                <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan5/demo" target="_blank" rel="noopener noreferrer" class="btn-github">🔗 Lihat di GitHub &rarr;</a>
            </div>

            <hr>

            <!-- 1. Pendahuluan & Tujuan -->
            <h2>1. Pendahuluan &amp; Ringkasan Praktikum</h2>
            <p>
                Pada praktikum Pertemuan 5 mata kuliah <strong>Pemrograman Berbasis Kerangka Kerja (PBKK)</strong>, aplikasi registrasi mahasiswa dari Pertemuan 4 dikembangkan menjadi sebuah <strong>Student Management System</strong> menggunakan arsitektur <strong>Model-View-ViewModel (MVVM)</strong> di atas platform <strong>.NET 10</strong> dan <strong>Avalonia UI</strong> (kerangka kerja XAML cross-platform yang berjalan native di Linux maupun Windows).
            </p>
            <p>
                Jika pada Pertemuan 4 logika aplikasi masih ditulis secara <em>Event-Driven</em> di file Code-Behind (<code>MainWindow.xaml.cs</code>), maka pada Pertemuan 5 seluruh logika bisnis, validasi form, pencarian, filter program studi, kalkulasi statistik, hingga konfirmasi penghapusan dipindahkan sepenuhnya ke lapisan <strong>ViewModel</strong> melalui mekanisme <strong>Two-Way Data Binding</strong> dan <strong>RelayCommand</strong>.
            </p>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🏗️ Arsitektur Pola MVVM (Model - View - ViewModel)</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. Model (<code>Student.cs</code>)</strong>
                        <span>Merepresentasikan entitas data mahasiswa: NIM, Nama, Program Studi, Gender, Tanggal Lahir, Nomor Telepon, dan Alamat.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. View (<code>MainWindow.axaml</code>)</strong>
                        <span>Antarmuka deklaratif XAML (Split Layout) yang bebas dari logika bisnis di Code-Behind, terhubung murni melalui <code>{Binding}</code>.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. ViewModel (<code>MainViewModel.cs</code>)</strong>
                        <span>Mengelola <code>ObservableCollection&lt;Student&gt;</code>, properti form reaktif (<code>[ObservableProperty]</code>), <code>[RelayCommand]</code>, dan statistik LINQ.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. Data Binding &amp; Notifikasi</strong>
                        <span>Menggunakan <code>CommunityToolkit.Mvvm</code> (<code>ObservableObject</code> &amp; <code>INotifyPropertyChanged</code>) agar UI diperbarui otomatis saat state berubah.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>📊 Dashboard Statistik Real-Time</h4>
                    <p>Menghitung total mahasiswa, jumlah per jurusan (Informatika &amp; Sistem Informasi), serta distribusi gender secara langsung menggunakan <code>LINQ Count()</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🔎 Pencarian &amp; Filter Dinamis</h4>
                    <p>Pencarian instan berdasarkan NIM, Nama, Prodi, atau Alamat serta filter dropdown Program Studi yang otomatis memperbarui isi <code>DataGrid</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>✏️ CRUD Lengkap + Validasi Duplikat</h4>
                    <p>Mendukung Tambah, Tampil, Edit (Update data terpilih langsung di form), dan Hapus data mahasiswa dengan validasi field wajib serta anti-duplikasi NIM.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🛡️ Konfirmasi Hapus Pure MVVM</h4>
                    <p>Dialog konfirmasi hapus dan banner notifikasi status dikendalikan melalui properti boolean di ViewModel tanpa mencampuri Code-Behind View.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Perbandingan Pertemuan 4 vs Pertemuan 5 -->
            <h2>2. Perbandingan Pengerjaan (Pertemuan 4 vs Pertemuan 5)</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Aspek</th>
                        <th>Pertemuan 4 (Event-Driven)</th>
                        <th>Pertemuan 5 (Pola MVVM)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Arsitektur Program</strong></td>
                        <td><em>Event-Driven</em> dengan logika langsung di Code-Behind (<code>MainWindow.xaml.cs</code>).</td>
                        <td><strong>Model-View-ViewModel (MVVM)</strong> dengan pemisahan layer Model, View, dan ViewModel.</td>
                    </tr>
                    <tr>
                        <td><strong>Komponen Tampilan Data</strong></td>
                        <td>Menggunakan <code>ListBox</code> sederhana berisi string terformat.</td>
                        <td>Menggunakan <code>DataGrid</code> terstruktur dengan 7 kolom data mahasiswa.</td>
                    </tr>
                    <tr>
                        <td><strong>Mekanisme Koneksi Data</strong></td>
                        <td>Manipulasi kontrol UI manual (<code>txtNim.Text</code>, <code>lstMahasiswa.Items.Add</code>).</td>
                        <td><em>Two-Way Data Binding</em> berbasis <code>ObservableCollection</code> dan <code>[ObservableProperty]</code>.</td>
                    </tr>
                    <tr>
                        <td><strong>Penanganan Aksi Tombol</strong></td>
                        <td>Event handler <code>Click="BtnSimpan_Click"</code>.</td>
                        <td><code>ICommand</code> / <code>[RelayCommand]</code> (<code>SimpanDataCommand</code>, <code>MulaiEditCommand</code>, <code>KonfirmasiHapusCommand</code>).</td>
                    </tr>
                    <tr>
                        <td><strong>Kelengkapan Fitur</strong></td>
                        <td>Input dasar (NIM, Nama, Prodi, Gender), Tambah &amp; Hapus.</td>
                        <td>Form lengkap (+Tanggal Lahir, No. Telepon, Alamat), Edit data, Pencarian, Filter Prodi, &amp; Dashboard Statistik.</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 3. Penjelasan Struktur & Komponen -->
            <h2>3. Penjelasan Struktur Kode &amp; Data Binding</h2>

            <h3>A. Lapisan Model (<code>Models/Student.cs</code>)</h3>
            <p>
                Kelas <code>Student</code> menampung 7 properti data utama mahasiswa (<code>NIM</code>, <code>Nama</code>, <code>Prodi</code>, <code>Gender</code>, <code>TanggalLahir</code>, <code>Alamat</code>, <code>NoTelepon</code>) ditambah properti helper <code>TanggalLahirDisplay</code> untuk memformat tanggal lahir menjadi <code>dd/MM/yyyy</code> di dalam tabel <code>DataGrid</code>.
            </p>

            <h3>B. Lapisan ViewModel (<code>ViewModels/MainViewModel.cs</code>)</h3>
            <ul>
                <li><strong>Koleksi Data:</strong> <code>Students</code> menyimpan seluruh data mahasiswa in-memory, sedangkan <code>FilteredStudents</code> di-bind ke <code>DataGrid.ItemsSource</code> agar hasil pencarian dan filter tampil reaktif.</li>
                <li><strong>Properti Reaktif:</strong> Menggunakan atribut <code>[ObservableProperty]</code> dari <code>CommunityToolkit.Mvvm</code> pada C# <em>partial properties</em> untuk <code>Nim</code>, <code>Nama</code>, <code>SelectedProdi</code>, <code>IsLakiLaki</code>, <code>IsPerempuan</code>, <code>TanggalLahir</code>, <code>Alamat</code>, <code>NoTelepon</code>, <code>SearchQuery</code>, dan <code>SelectedFilterProdi</code>.</li>
                <li><strong>Command Pattern:</strong> Aksi tombol diikat menggunakan <code>[RelayCommand]</code>: <code>SimpanData()</code> (menangani mode Tambah maupun Edit), <code>MulaiEdit()</code>, <code>MintaKonfirmasiHapus()</code>, <code>KonfirmasiHapus()</code>, <code>BatalHapus()</code>, dan <code>ResetForm()</code>.</li>
                <li><strong>Kalkulasi Statistik LINQ:</strong> Method <code>RefreshStatistics()</code> memicu <code>OnPropertyChanged</code> untuk <code>TotalStudents</code>, <code>TotalInformatika</code>, <code>TotalSistemInformasi</code>, <code>TotalLakiLaki</code>, dan <code>TotalPerempuan</code>.</li>
            </ul>

            <h3>C. Lapisan View (<code>Views/MainWindow.axaml</code>)</h3>
            <p>
                View disusun dalam tata letak dua kolom (<em>Split Layout</em>) menggunakan <code>Grid</code>: kolom kiri selebar <code>330px</code> berisi formulir input registrasi/edit mahasiswa, sementara kolom kanan menampilkan 5 kartu statistik, toolbar pencarian/filter/aksi, dan tabel <code>DataGrid</code>. File <code>MainWindow.axaml.cs</code> hanya berisi <code>InitializeComponent()</code>.
            </p>

            <hr>

            <!-- 4. Panduan Menjalankan Program -->
            <h2>4. Cara Menjalankan Aplikasi (.NET CLI)</h2>
            <p>Aplikasi cross-platform ini dapat dijalankan di Linux, Windows, maupun macOS menggunakan .NET 10 SDK:</p>

            <div class="terminal-box">
                <span class="prompt"># 1. Arahkan terminal ke direktori proyek Pertemuan 5:</span><br>
                cd pbkk/pertemuan5/demo<br><br>
                <span class="prompt"># 2. Build proyek untuk memastikan dependensi dan XAML valid:</span><br>
                dotnet build<br><br>
                <span class="prompt"># 3. Jalankan aplikasi desktop Avalonia MVVM:</span><br>
                dotnet run
            </div>

            <hr>

            <!-- 5. Source Code Lengkap -->
            <h2>5. Source Code Lengkap</h2>

            <h3>A. Model: <code>Models/Student.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeModel5')">Copy Code</button>
                <pre><code id="codeModel5">using System;

namespace StudentManagementMVVM.Models;

/// &lt;summary&gt;
/// Model entitas data mahasiswa untuk pola arsitektur MVVM.
/// &lt;/summary&gt;
public class Student
{
    public string NIM { get; set; } = string.Empty;
    public string Nama { get; set; } = string.Empty;
    public string Prodi { get; set; } = string.Empty;
    public string Gender { get; set; } = string.Empty;
    public DateTime? TanggalLahir { get; set; }
    public string Alamat { get; set; } = string.Empty;
    public string NoTelepon { get; set; } = string.Empty;

    public string TanggalLahirDisplay =&gt;
        TanggalLahir.HasValue ? TanggalLahir.Value.ToString("dd/MM/yyyy") : "-";
}</code></pre>
            </div>

            <h3>B. ViewModel: <code>ViewModels/MainViewModel.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeVm5')">Copy Code</button>
                <pre><code id="codeVm5">using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using CommunityToolkit.Mvvm.ComponentModel;
using CommunityToolkit.Mvvm.Input;
using StudentManagementMVVM.Models;

namespace StudentManagementMVVM.ViewModels;

public partial class MainViewModel : ViewModelBase
{
    // Koleksi master in-memory (Pertemuan 5)
    public ObservableCollection&lt;Student&gt; Students { get; } = new();

    // Koleksi hasil filter/pencarian yang di-bind ke DataGrid
    public ObservableCollection&lt;Student&gt; FilteredStudents { get; } = new();

    public IReadOnlyList&lt;string&gt; ProdiOptions { get; } =
    [
        "Teknik Informatika",
        "Sistem Informasi",
        "Teknologi Informasi",
        "Manajemen",
        "Akuntansi"
    ];

    public IReadOnlyList&lt;string&gt; FilterProdiOptions { get; } =
    [
        "Semua Prodi",
        "Teknik Informatika",
        "Sistem Informasi",
        "Teknologi Informasi",
        "Manajemen",
        "Akuntansi"
    ];

    // ========================================================
    // PROPERTI FORM INPUT (TWO-WAY DATA BINDING)
    // ========================================================
    [ObservableProperty]
    public partial string Nim { get; set; } = string.Empty;

    [ObservableProperty]
    public partial string Nama { get; set; } = string.Empty;

    [ObservableProperty]
    public partial string? SelectedProdi { get; set; }

    [ObservableProperty]
    public partial bool IsLakiLaki { get; set; }

    [ObservableProperty]
    public partial bool IsPerempuan { get; set; }

    [ObservableProperty]
    public partial DateTime? TanggalLahir { get; set; } = new DateTime(2005, 5, 14);

    [ObservableProperty]
    public partial string Alamat { get; set; } = string.Empty;

    [ObservableProperty]
    public partial string NoTelepon { get; set; } = string.Empty;

    // ========================================================
    // SELEKSI, MODE EDIT &amp; FILTER PENCARIAN
    // ========================================================
    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(HasSelectedStudent))]
    public partial Student? SelectedStudent { get; set; }

    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(FormTitle))]
    [NotifyPropertyChangedFor(nameof(SubmitButtonText))]
    public partial bool IsEditMode { get; set; }

    private string? _editingOriginalNim;

    [ObservableProperty]
    public partial string SearchQuery { get; set; } = string.Empty;

    [ObservableProperty]
    public partial string SelectedFilterProdi { get; set; } = "Semua Prodi";

    // ========================================================
    // STATUS NOTIFIKASI &amp; KONFIRMASI HAPUS (PURE MVVM)
    // ========================================================
    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(HasStatusMessage))]
    public partial string StatusMessage { get; set; } = string.Empty;

    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(StatusBackground))]
    [NotifyPropertyChangedFor(nameof(StatusBorderBrush))]
    [NotifyPropertyChangedFor(nameof(StatusForeground))]
    public partial bool IsErrorStatus { get; set; }

    [ObservableProperty]
    public partial bool IsDeleteConfirmVisible { get; set; }

    [ObservableProperty]
    public partial string DeleteConfirmMessage { get; set; } = string.Empty;

    public bool HasSelectedStudent =&gt; SelectedStudent is not null;
    public bool HasStatusMessage =&gt; !string.IsNullOrWhiteSpace(StatusMessage);

    public string FormTitle =&gt; IsEditMode ? "EDIT DATA MAHASISWA" : "REGISTRASI MAHASISWA";
    public string SubmitButtonText =&gt; IsEditMode ? "Update Data" : "Simpan Data";

    public string StatusBackground =&gt; IsErrorStatus ? "#FEF2F2" : "#ECFDF5";
    public string StatusBorderBrush =&gt; IsErrorStatus ? "#FCA5A5" : "#6EE7B7";
    public string StatusForeground =&gt; IsErrorStatus ? "#B91C1C" : "#047857";

    // ========================================================
    // STATISTIK REAL-TIME BERBASIS LINQ
    // ========================================================
    public int TotalStudents =&gt; Students.Count;
    public int TotalInformatika =&gt; Students.Count(s =&gt; s.Prodi == "Teknik Informatika");
    public int TotalSistemInformasi =&gt; Students.Count(s =&gt; s.Prodi == "Sistem Informasi");
    public int TotalLakiLaki =&gt; Students.Count(s =&gt; s.Gender == "Laki-laki");
    public int TotalPerempuan =&gt; Students.Count(s =&gt; s.Gender == "Perempuan");
    public int FilteredCount =&gt; FilteredStudents.Count;

    public MainViewModel()
    {
        SeedInitialData();
        ApplyFilter();
        RefreshStatistics();
    }

    partial void OnSearchQueryChanged(string value) =&gt; ApplyFilter();
    partial void OnSelectedFilterProdiChanged(string value) =&gt; ApplyFilter();

    private void SeedInitialData()
    {
        Students.Add(new Student
        {
            NIM = "5025241225",
            Nama = "Ageng Prayogo",
            Prodi = "Teknik Informatika",
            Gender = "Laki-laki",
            TanggalLahir = new DateTime(2005, 8, 17),
            Alamat = "Jl. Teknik Kimia, Keputih, Surabaya",
            NoTelepon = "081234567890"
        });
        Students.Add(new Student
        {
            NIM = "5026241042",
            Nama = "Nadia Putri Maharani",
            Prodi = "Sistem Informasi",
            Gender = "Perempuan",
            TanggalLahir = new DateTime(2006, 2, 11),
            Alamat = "Jl. Dharmahusada Indah No. 18, Surabaya",
            NoTelepon = "085712349876"
        });
        Students.Add(new Student
        {
            NIM = "5025241108",
            Nama = "Rafi Pratama Putra",
            Prodi = "Teknik Informatika",
            Gender = "Laki-laki",
            TanggalLahir = new DateTime(2005, 11, 3),
            Alamat = "Perum Bumi Marina Emas Blok C-4, Surabaya",
            NoTelepon = "082198765432"
        });
        Students.Add(new Student
        {
            NIM = "5027241019",
            Nama = "Aulia Zahra Ramadhani",
            Prodi = "Teknologi Informasi",
            Gender = "Perempuan",
            TanggalLahir = new DateTime(2006, 4, 22),
            Alamat = "Jl. Mulyosari Tengah No. 27, Surabaya",
            NoTelepon = "081345678912"
        });
    }

    // ========================================================
    // COMMAND: SIMPAN / UPDATE DATA MAHASISWA
    // ========================================================
    [RelayCommand]
    private void SimpanData()
    {
        string nimTrim = Nim.Trim();
        string namaTrim = Nama.Trim();
        string alamatTrim = Alamat.Trim();
        string telpTrim = NoTelepon.Trim();

        if (string.IsNullOrWhiteSpace(nimTrim))
        {
            SetStatus("NIM mahasiswa wajib diisi!", isError: true);
            return;
        }

        if (string.IsNullOrWhiteSpace(namaTrim))
        {
            SetStatus("Nama lengkap mahasiswa wajib diisi!", isError: true);
            return;
        }

        if (string.IsNullOrWhiteSpace(SelectedProdi))
        {
            SetStatus("Program studi harus dipilih!", isError: true);
            return;
        }

        if (!IsLakiLaki &amp;&amp; !IsPerempuan)
        {
            SetStatus("Jenis kelamin harus dipilih!", isError: true);
            return;
        }

        if (string.IsNullOrWhiteSpace(telpTrim))
        {
            SetStatus("Nomor telepon wajib diisi!", isError: true);
            return;
        }

        if (string.IsNullOrWhiteSpace(alamatTrim))
        {
            SetStatus("Alamat domisili wajib diisi!", isError: true);
            return;
        }

        string gender = IsLakiLaki ? "Laki-laki" : "Perempuan";

        if (IsEditMode &amp;&amp; _editingOriginalNim is not null)
        {
            bool nimConflict = Students.Any(s =&gt;
                !s.NIM.Equals(_editingOriginalNim, StringComparison.OrdinalIgnoreCase) &amp;&amp;
                s.NIM.Equals(nimTrim, StringComparison.OrdinalIgnoreCase));

            if (nimConflict)
            {
                SetStatus($"NIM '{nimTrim}' sudah digunakan oleh mahasiswa lain!", isError: true);
                return;
            }

            Student? target = Students.FirstOrDefault(s =&gt;
                s.NIM.Equals(_editingOriginalNim, StringComparison.OrdinalIgnoreCase));

            if (target is not null)
            {
                target.NIM = nimTrim;
                target.Nama = namaTrim;
                target.Prodi = SelectedProdi;
                target.Gender = gender;
                target.TanggalLahir = TanggalLahir;
                target.Alamat = alamatTrim;
                target.NoTelepon = telpTrim;
            }

            ApplyFilter();
            RefreshStatistics();
            ResetFormInternal();
            SetStatus($"Data mahasiswa '{namaTrim}' ({nimTrim}) berhasil diperbarui!", isError: false);
            return;
        }

        if (Students.Any(s =&gt; s.NIM.Equals(nimTrim, StringComparison.OrdinalIgnoreCase)))
        {
            SetStatus($"NIM '{nimTrim}' sudah terdaftar dalam sistem!", isError: true);
            return;
        }

        Students.Add(new Student
        {
            NIM = nimTrim,
            Nama = namaTrim,
            Prodi = SelectedProdi,
            Gender = gender,
            TanggalLahir = TanggalLahir,
            Alamat = alamatTrim,
            NoTelepon = telpTrim
        });

        ApplyFilter();
        RefreshStatistics();
        ResetFormInternal();
        SetStatus($"Mahasiswa '{namaTrim}' ({nimTrim}) berhasil ditambahkan!", isError: false);
    }

    // ========================================================
    // COMMAND: EDIT DATA TERPILIH
    // ========================================================
    [RelayCommand]
    private void MulaiEdit()
    {
        if (SelectedStudent is null)
        {
            SetStatus("Pilih data mahasiswa pada tabel yang ingin diedit!", isError: true);
            return;
        }

        IsDeleteConfirmVisible = false;
        IsEditMode = true;
        _editingOriginalNim = SelectedStudent.NIM;

        Nim = SelectedStudent.NIM;
        Nama = SelectedStudent.Nama;
        SelectedProdi = SelectedStudent.Prodi;
        IsLakiLaki = SelectedStudent.Gender == "Laki-laki";
        IsPerempuan = SelectedStudent.Gender == "Perempuan";
        TanggalLahir = SelectedStudent.TanggalLahir;
        Alamat = SelectedStudent.Alamat;
        NoTelepon = SelectedStudent.NoTelepon;

        SetStatus($"Mode edit aktif untuk '{SelectedStudent.Nama}'. Ubah data lalu klik Update Data.", isError: false);
    }

    // ========================================================
    // COMMAND: HAPUS DENGAN KONFIRMASI OVERLAY
    // ========================================================
    [RelayCommand]
    private void MintaKonfirmasiHapus()
    {
        if (SelectedStudent is null)
        {
            SetStatus("Pilih baris mahasiswa pada tabel sebelum menghapus!", isError: true);
            return;
        }

        DeleteConfirmMessage = $"Apakah Anda yakin ingin menghapus data mahasiswa \"{SelectedStudent.Nama}\" (NIM: {SelectedStudent.NIM})?";
        IsDeleteConfirmVisible = true;
    }

    [RelayCommand]
    private void KonfirmasiHapus()
    {
        if (SelectedStudent is null)
        {
            IsDeleteConfirmVisible = false;
            return;
        }

        string deletedName = SelectedStudent.Nama;
        string deletedNim = SelectedStudent.NIM;

        Students.Remove(SelectedStudent);

        if (IsEditMode &amp;&amp; deletedNim.Equals(_editingOriginalNim, StringComparison.OrdinalIgnoreCase))
        {
            ResetFormInternal();
        }

        SelectedStudent = null;
        IsDeleteConfirmVisible = false;
        ApplyFilter();
        RefreshStatistics();
        SetStatus($"Data mahasiswa '{deletedName}' ({deletedNim}) telah dihapus.", isError: false);
    }

    [RelayCommand]
    private void BatalHapus()
    {
        IsDeleteConfirmVisible = false;
    }

    // ========================================================
    // COMMAND: RESET FORM
    // ========================================================
    [RelayCommand]
    private void ResetForm()
    {
        ResetFormInternal();
        SetStatus("Formulir telah dibersihkan.", isError: false);
    }

    private void ResetFormInternal()
    {
        IsEditMode = false;
        _editingOriginalNim = null;
        Nim = string.Empty;
        Nama = string.Empty;
        SelectedProdi = null;
        IsLakiLaki = false;
        IsPerempuan = false;
        TanggalLahir = new DateTime(2005, 5, 14);
        Alamat = string.Empty;
        NoTelepon = string.Empty;
    }

    private void ApplyFilter()
    {
        string keyword = SearchQuery.Trim();
        string prodiFilter = SelectedFilterProdi;

        var results = Students.Where(s =&gt;
        {
            bool matchProdi = string.IsNullOrEmpty(prodiFilter) ||
                              prodiFilter == "Semua Prodi" ||
                              s.Prodi.Equals(prodiFilter, StringComparison.OrdinalIgnoreCase);

            bool matchKeyword = string.IsNullOrEmpty(keyword) ||
                                s.NIM.Contains(keyword, StringComparison.OrdinalIgnoreCase) ||
                                s.Nama.Contains(keyword, StringComparison.OrdinalIgnoreCase) ||
                                s.Prodi.Contains(keyword, StringComparison.OrdinalIgnoreCase) ||
                                s.Alamat.Contains(keyword, StringComparison.OrdinalIgnoreCase);

            return matchProdi &amp;&amp; matchKeyword;
        }).ToList();

        FilteredStudents.Clear();
        foreach (var item in results)
        {
            FilteredStudents.Add(item);
        }

        OnPropertyChanged(nameof(FilteredCount));
    }

    private void RefreshStatistics()
    {
        OnPropertyChanged(nameof(TotalStudents));
        OnPropertyChanged(nameof(TotalInformatika));
        OnPropertyChanged(nameof(TotalSistemInformasi));
        OnPropertyChanged(nameof(TotalLakiLaki));
        OnPropertyChanged(nameof(TotalPerempuan));
    }

    private void SetStatus(string message, bool isError)
    {
        IsErrorStatus = isError;
        StatusMessage = message;
    }
}</code></pre>
            </div>

            <h3>C. View XAML: <code>Views/MainWindow.axaml</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeAxaml5')">Copy Code</button>
                <pre><code id="codeAxaml5">&lt;Window xmlns="https://github.com/avaloniaui"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        xmlns:vm="using:StudentManagementMVVM.ViewModels"
        xmlns:d="http://schemas.microsoft.com/expression/blend/2008"
        xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006"
        mc:Ignorable="d" d:DesignWidth="1460" d:DesignHeight="780"
        x:Class="StudentManagementMVVM.Views.MainWindow"
        x:DataType="vm:MainViewModel"
        Icon="/Assets/avalonia-logo.ico"
        Title="Student Management System — Pertemuan 5 (MVVM)"
        Width="1460" Height="780"
        MinWidth="1040" MinHeight="680"
        WindowStartupLocation="CenterScreen"
        Background="#F1F5F9"&gt;

    &lt;Design.DataContext&gt;
        &lt;vm:MainViewModel /&gt;
    &lt;/Design.DataContext&gt;

    &lt;Grid RowDefinitions="Auto,*,Auto" Margin="20"&gt;
        &lt;!-- HEADER BANNER --&gt;
        &lt;Border Grid.Row="0" Background="#FFFFFF" CornerRadius="14" Padding="20,14"
                BorderBrush="#E2E8F0" BorderThickness="1" Margin="0,0,0,14"&gt;
            &lt;Grid ColumnDefinitions="*,Auto"&gt;
                &lt;StackPanel Grid.Column="0" Spacing="2"&gt;
                    &lt;TextBlock Text="STUDENT MANAGEMENT SYSTEM"
                               FontSize="21" FontWeight="Bold" Foreground="#0F172A" /&gt;
                    &lt;TextBlock Text="Aplikasi Manajemen Data Mahasiswa berbasis .NET Avalonia UI dengan Pola Arsitektur MVVM &amp;amp; Dashboard Statistik"
                               FontSize="12.5" Foreground="#64748B" /&gt;
                &lt;/StackPanel&gt;
                &lt;Border Grid.Column="1" VerticalAlignment="Center"
                        Background="#EDE9FE" CornerRadius="20" Padding="14,7"
                        BorderBrush="#DDD6FE" BorderThickness="1"&gt;
                    &lt;TextBlock Text="Pertemuan 5 • MVVM In-Memory"
                               FontSize="12" FontWeight="SemiBold" Foreground="#6D28D9" /&gt;
                &lt;/Border&gt;
            &lt;/Grid&gt;
        &lt;/Border&gt;

        &lt;!-- KONTEN UTAMA: SPLIT LAYOUT --&gt;
        &lt;Grid Grid.Row="1" ColumnDefinitions="330,16,*"&gt;

            &lt;!-- PANEL KIRI: FORM REGISTRASI &amp; EDIT MAHASISWA --&gt;
            &lt;Border Grid.Column="0" Background="#FFFFFF" CornerRadius="14" Padding="16,14"
                    BorderBrush="#E2E8F0" BorderThickness="1"&gt;
                &lt;ScrollViewer VerticalScrollBarVisibility="Auto"&gt;
                    &lt;StackPanel Spacing="8"&gt;
                        &lt;Border Background="#F8FAFC" CornerRadius="8" Padding="10,7"
                                BorderBrush="#E2E8F0" BorderThickness="1"&gt;
                            &lt;TextBlock Text="{Binding FormTitle}"
                                       FontSize="13.5" FontWeight="Bold" Foreground="#1E293B" /&gt;
                        &lt;/Border&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="NIM" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;TextBox Text="{Binding Nim}" PlaceholderText="Contoh: 5025241225" Height="33" /&gt;
                        &lt;/StackPanel&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="Nama Lengkap" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;TextBox Text="{Binding Nama}" PlaceholderText="Masukkan nama lengkap mahasiswa" Height="33" /&gt;
                        &lt;/StackPanel&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="Program Studi" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;ComboBox ItemsSource="{Binding ProdiOptions}"
                                      SelectedItem="{Binding SelectedProdi}"
                                      PlaceholderText="-- Pilih Program Studi --"
                                      HorizontalAlignment="Stretch" Height="33" /&gt;
                        &lt;/StackPanel&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="Jenis Kelamin" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;StackPanel Orientation="Horizontal" Spacing="22" Margin="0,1"&gt;
                                &lt;RadioButton GroupName="GenderGroup" Content="Laki-laki"
                                             IsChecked="{Binding IsLakiLaki}" FontSize="12.5" /&gt;
                                &lt;RadioButton GroupName="GenderGroup" Content="Perempuan"
                                             IsChecked="{Binding IsPerempuan}" FontSize="12.5" /&gt;
                            &lt;/StackPanel&gt;
                        &lt;/StackPanel&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="Tanggal Lahir" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;CalendarDatePicker SelectedDate="{Binding TanggalLahir}"
                                                HorizontalAlignment="Stretch"
                                                Height="33"
                                                PlaceholderText="Pilih tanggal lahir" /&gt;
                        &lt;/StackPanel&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="Nomor Telepon" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;TextBox Text="{Binding NoTelepon}" PlaceholderText="Contoh: 081234567890" Height="33" /&gt;
                        &lt;/StackPanel&gt;

                        &lt;StackPanel Spacing="3"&gt;
                            &lt;TextBlock Text="Alamat Domisili" FontSize="12" FontWeight="SemiBold" Foreground="#475569" /&gt;
                            &lt;TextBox Text="{Binding Alamat}"
                                     PlaceholderText="Masukkan alamat lengkap"
                                     AcceptsReturn="True"
                                     TextWrapping="Wrap"
                                     Height="54" /&gt;
                        &lt;/StackPanel&gt;

                        &lt;Grid ColumnDefinitions="*,10,*" Margin="0,6,0,0"&gt;
                            &lt;Button Grid.Column="0"
                                    Content="{Binding SubmitButtonText}"
                                    Command="{Binding SimpanDataCommand}"
                                    HorizontalAlignment="Stretch"
                                    HorizontalContentAlignment="Center"
                                    VerticalContentAlignment="Center"
                                    Height="38"
                                    Background="#2563EB" Foreground="#FFFFFF"
                                    FontWeight="Bold" CornerRadius="8" /&gt;
                            &lt;Button Grid.Column="2"
                                    Content="Reset Form"
                                    Command="{Binding ResetFormCommand}"
                                    HorizontalAlignment="Stretch"
                                    HorizontalContentAlignment="Center"
                                    VerticalContentAlignment="Center"
                                    Height="38"
                                    Background="#64748B" Foreground="#FFFFFF"
                                    FontWeight="SemiBold" CornerRadius="8" /&gt;
                        &lt;/Grid&gt;
                    &lt;/StackPanel&gt;
                &lt;/ScrollViewer&gt;
            &lt;/Border&gt;

            &lt;!-- PANEL KANAN: DASHBOARD STATISTIK + FILTER + DATAGRID --&gt;
            &lt;Grid Grid.Column="2" RowDefinitions="Auto,Auto,*,Auto"&gt;
                &lt;Grid Grid.Row="0" ColumnDefinitions="*,*,*,*,*" Margin="0,0,0,12"&gt;
                    &lt;Border Grid.Column="0" Background="#FFFFFF" CornerRadius="12" Padding="14,10"
                            BorderBrush="#E2E8F0" BorderThickness="1" Margin="0,0,8,0"&gt;
                        &lt;StackPanel Spacing="2"&gt;
                            &lt;TextBlock Text="Total Mahasiswa" FontSize="11.5" Foreground="#64748B" FontWeight="SemiBold" /&gt;
                            &lt;TextBlock Text="{Binding TotalStudents}" FontSize="22" FontWeight="Bold" Foreground="#1E293B" /&gt;
                        &lt;/StackPanel&gt;
                    &lt;/Border&gt;
                    &lt;Border Grid.Column="1" Background="#EFF6FF" CornerRadius="12" Padding="14,10"
                            BorderBrush="#BFDBFE" BorderThickness="1" Margin="0,0,8,0"&gt;
                        &lt;StackPanel Spacing="2"&gt;
                            &lt;TextBlock Text="Informatika" FontSize="11.5" Foreground="#1D4ED8" FontWeight="SemiBold" /&gt;
                            &lt;TextBlock Text="{Binding TotalInformatika}" FontSize="22" FontWeight="Bold" Foreground="#1E40AF" /&gt;
                        &lt;/StackPanel&gt;
                    &lt;/Border&gt;
                    &lt;Border Grid.Column="2" Background="#F5F3FF" CornerRadius="12" Padding="14,10"
                            BorderBrush="#DDD6FE" BorderThickness="1" Margin="0,0,8,0"&gt;
                        &lt;StackPanel Spacing="2"&gt;
                            &lt;TextBlock Text="Sistem Info" FontSize="11.5" Foreground="#6D28D9" FontWeight="SemiBold" /&gt;
                            &lt;TextBlock Text="{Binding TotalSistemInformasi}" FontSize="22" FontWeight="Bold" Foreground="#5B21B6" /&gt;
                        &lt;/StackPanel&gt;
                    &lt;/Border&gt;
                    &lt;Border Grid.Column="3" Background="#ECFDF5" CornerRadius="12" Padding="14,10"
                            BorderBrush="#A7F3D0" BorderThickness="1" Margin="0,0,8,0"&gt;
                        &lt;StackPanel Spacing="2"&gt;
                            &lt;TextBlock Text="Laki-laki" FontSize="11.5" Foreground="#047857" FontWeight="SemiBold" /&gt;
                            &lt;TextBlock Text="{Binding TotalLakiLaki}" FontSize="22" FontWeight="Bold" Foreground="#065F46" /&gt;
                        &lt;/StackPanel&gt;
                    &lt;/Border&gt;
                    &lt;Border Grid.Column="4" Background="#FDF2F8" CornerRadius="12" Padding="14,10"
                            BorderBrush="#FBCFE8" BorderThickness="1"&gt;
                        &lt;StackPanel Spacing="2"&gt;
                            &lt;TextBlock Text="Perempuan" FontSize="11.5" Foreground="#BE185D" FontWeight="SemiBold" /&gt;
                            &lt;TextBlock Text="{Binding TotalPerempuan}" FontSize="22" FontWeight="Bold" Foreground="#9D174D" /&gt;
                        &lt;/StackPanel&gt;
                    &lt;/Border&gt;
                &lt;/Grid&gt;

                &lt;Border Grid.Row="1" Background="#FFFFFF" CornerRadius="12" Padding="12"
                        BorderBrush="#E2E8F0" BorderThickness="1" Margin="0,0,0,12"&gt;
                    &lt;Grid ColumnDefinitions="*,10,175,10,Auto,8,Auto"&gt;
                        &lt;TextBox Grid.Column="0"
                                 Text="{Binding SearchQuery}"
                                 PlaceholderText="Cari NIM, Nama, Prodi, atau Alamat..."
                                 Height="35" /&gt;
                        &lt;ComboBox Grid.Column="2"
                                  ItemsSource="{Binding FilterProdiOptions}"
                                  SelectedItem="{Binding SelectedFilterProdi}"
                                  HorizontalAlignment="Stretch"
                                  Height="35" /&gt;
                        &lt;Button Grid.Column="4"
                                Content="Edit Terpilih"
                                Command="{Binding MulaiEditCommand}"
                                Height="35" Padding="14,0"
                                VerticalContentAlignment="Center"
                                Background="#F59E0B" Foreground="#FFFFFF"
                                FontWeight="SemiBold" CornerRadius="8" /&gt;
                        &lt;Button Grid.Column="6"
                                Content="Hapus Terpilih"
                                Command="{Binding MintaKonfirmasiHapusCommand}"
                                Height="35" Padding="14,0"
                                VerticalContentAlignment="Center"
                                Background="#DC2626" Foreground="#FFFFFF"
                                FontWeight="SemiBold" CornerRadius="8" /&gt;
                    &lt;/Grid&gt;
                &lt;/Border&gt;

                &lt;Border Grid.Row="2" Background="#FFFFFF" CornerRadius="14" Padding="14"
                        BorderBrush="#E2E8F0" BorderThickness="1"&gt;
                    &lt;Grid RowDefinitions="Auto,*"&gt;
                        &lt;Grid Grid.Row="0" ColumnDefinitions="*,Auto" Margin="4,0,4,8"&gt;
                            &lt;TextBlock Text="DAFTAR DATA MAHASISWA"
                                       FontSize="13.5" FontWeight="Bold" Foreground="#1E293B" /&gt;
                            &lt;TextBlock Grid.Column="1"
                                       Text="{Binding FilteredCount, StringFormat='Menampilkan {0} data'}"
                                       FontSize="12" Foreground="#64748B" VerticalAlignment="Center" /&gt;
                        &lt;/Grid&gt;

                        &lt;DataGrid Grid.Row="1"
                                  ItemsSource="{Binding FilteredStudents}"
                                  SelectedItem="{Binding SelectedStudent}"
                                  AutoGenerateColumns="False"
                                  IsReadOnly="True"
                                  SelectionMode="Single"
                                  GridLinesVisibility="All"
                                  HeadersVisibility="Column"
                                  FontSize="12.5"
                                  BorderThickness="1"
                                  BorderBrush="#E2E8F0"
                                  CornerRadius="8"&gt;
                            &lt;DataGrid.Columns&gt;
                                &lt;DataGridTextColumn Header="NIM" Binding="{Binding NIM}" Width="Auto" /&gt;
                                &lt;DataGridTextColumn Header="Nama Lengkap" Binding="{Binding Nama}" Width="Auto" /&gt;
                                &lt;DataGridTextColumn Header="Program Studi" Binding="{Binding Prodi}" Width="Auto" /&gt;
                                &lt;DataGridTextColumn Header="Gender" Binding="{Binding Gender}" Width="Auto" /&gt;
                                &lt;DataGridTextColumn Header="Tgl Lahir" Binding="{Binding TanggalLahirDisplay}" Width="Auto" /&gt;
                                &lt;DataGridTextColumn Header="No. Telepon" Binding="{Binding NoTelepon}" Width="Auto" /&gt;
                                &lt;DataGridTextColumn Header="Alamat" Binding="{Binding Alamat}" Width="*" /&gt;
                            &lt;/DataGrid.Columns&gt;
                        &lt;/DataGrid&gt;
                    &lt;/Grid&gt;
                &lt;/Border&gt;

                &lt;Border Grid.Row="3"
                        IsVisible="{Binding IsDeleteConfirmVisible}"
                        Background="#FEF2F2" BorderBrush="#F87171" BorderThickness="1.5"
                        CornerRadius="12" Padding="14,10" Margin="0,10,0,0"&gt;
                    &lt;Grid ColumnDefinitions="*,Auto,8,Auto"&gt;
                        &lt;TextBlock Grid.Column="0"
                                   Text="{Binding DeleteConfirmMessage}"
                                   Foreground="#991B1B" FontWeight="SemiBold"
                                   VerticalAlignment="Center" TextWrapping="Wrap" /&gt;
                        &lt;Button Grid.Column="1"
                                Content="Ya, Hapus"
                                Command="{Binding KonfirmasiHapusCommand}"
                                Background="#DC2626" Foreground="#FFFFFF"
                                FontWeight="Bold" Padding="14,7" CornerRadius="8" /&gt;
                        &lt;Button Grid.Column="3"
                                Content="Batal"
                                Command="{Binding BatalHapusCommand}"
                                Background="#E2E8F0" Foreground="#1E293B"
                                FontWeight="SemiBold" Padding="14,7" CornerRadius="8" /&gt;
                    &lt;/Grid&gt;
                &lt;/Border&gt;
            &lt;/Grid&gt;
        &lt;/Grid&gt;

        &lt;!-- FOOTER STATUS BAR --&gt;
        &lt;Grid Grid.Row="2" ColumnDefinitions="*,Auto" Margin="0,12,0,0"&gt;
            &lt;Border Grid.Column="0"
                    IsVisible="{Binding HasStatusMessage}"
                    Background="{Binding StatusBackground}"
                    BorderBrush="{Binding StatusBorderBrush}"
                    BorderThickness="1" CornerRadius="10" Padding="14,8" Margin="0,0,14,0"&gt;
                &lt;TextBlock Text="{Binding StatusMessage}"
                           Foreground="{Binding StatusForeground}"
                           FontSize="12.5" FontWeight="SemiBold" /&gt;
            &lt;/Border&gt;
            &lt;TextBlock Grid.Column="1"
                       Text="Ageng Prayogo (5025241225) • PBKK Pertemuan 5"
                       FontSize="12" Foreground="#64748B" VerticalAlignment="Center" /&gt;
        &lt;/Grid&gt;
    &lt;/Grid&gt;
&lt;/Window&gt;</code></pre>
            </div>

            <h3>D. Konfigurasi Styles &amp; Project: <code>App.axaml</code> &amp; <code>StudentManagementMVVM.csproj</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeApp5')">Copy Code</button>
                <pre><code id="codeApp5">&lt;!-- App.axaml --&gt;
&lt;Application xmlns="https://github.com/avaloniaui"
             xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
             x:Class="StudentManagementMVVM.App"
             xmlns:local="using:StudentManagementMVVM"
             RequestedThemeVariant="Light"&gt;

    &lt;Application.DataTemplates&gt;
        &lt;local:ViewLocator /&gt;
    &lt;/Application.DataTemplates&gt;

    &lt;Application.Styles&gt;
        &lt;FluentTheme /&gt;
        &lt;StyleInclude Source="avares://Avalonia.Controls.DataGrid/Themes/Fluent.xaml" /&gt;
    &lt;/Application.Styles&gt;
&lt;/Application&gt;

&lt;!-- StudentManagementMVVM.csproj --&gt;
&lt;Project Sdk="Microsoft.NET.Sdk"&gt;
  &lt;PropertyGroup&gt;
    &lt;OutputType&gt;WinExe&lt;/OutputType&gt;
    &lt;TargetFramework&gt;net10.0&lt;/TargetFramework&gt;
    &lt;Nullable&gt;enable&lt;/Nullable&gt;
    &lt;ApplicationManifest&gt;app.manifest&lt;/ApplicationManifest&gt;
  &lt;/PropertyGroup&gt;

  &lt;ItemGroup&gt;
    &lt;Folder Include="Models\" /&gt;
    &lt;AvaloniaResource Include="Assets\**" /&gt;
  &lt;/ItemGroup&gt;

  &lt;ItemGroup&gt;
    &lt;PackageReference Include="Avalonia" Version="12.1.6" /&gt;
    &lt;PackageReference Include="Avalonia.Controls.DataGrid" Version="12.1.2" /&gt;
    &lt;PackageReference Include="Avalonia.Desktop" Version="12.1.6" /&gt;
    &lt;PackageReference Include="Avalonia.Themes.Fluent" Version="12.1.6" /&gt;
    &lt;PackageReference Include="Avalonia.Fonts.Inter" Version="12.1.6" /&gt;
    &lt;PackageReference Include="CommunityToolkit.Mvvm" Version="8.4.2" /&gt;
  &lt;/ItemGroup&gt;
&lt;/Project&gt;</code></pre>
            </div>

            <hr>

            <!-- 6. Tabel Pengujian -->
            <h2>6. Tabel Pengujian Fungsionalitas Aplikasi</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Skenario Pengujian</th>
                        <th>Aksi Pengguna</th>
                        <th>Hasil yang Diharapkan</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Validasi input kosong</td>
                        <td>Klik <strong>Simpan Data</strong> saat form masih kosong</td>
                        <td>Status banner merah tampil: <code>"NIM mahasiswa wajib diisi!"</code></td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tambah mahasiswa baru</td>
                        <td>Isi NIM, Nama, Prodi, Gender, Tgl Lahir, No. Telp, Alamat &rarr; klik <strong>Simpan Data</strong></td>
                        <td>Data masuk ke <code>DataGrid</code>, kartu statistik bertambah otomatis, form di-reset.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Cegah duplikasi NIM</td>
                        <td>Masukkan NIM yang sudah terdaftar lalu klik <strong>Simpan Data</strong></td>
                        <td>Sistem menolak penyimpanan dan menampilkan peringatan duplikat NIM.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pencarian &amp; Filter Prodi</td>
                        <td>Ketik kata kunci di kotak pencarian atau pilih Prodi di dropdown filter</td>
                        <td><code>FilteredStudents</code> di <code>DataGrid</code> langsung tersaring secara real-time.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Edit &amp; Update data</td>
                        <td>Pilih baris pada tabel &rarr; klik <strong>Edit Terpilih</strong> &rarr; ubah data &rarr; klik <strong>Update Data</strong></td>
                        <td>Form terisi data terpilih, perubahan disimpan, dan statistik ikut menyesuaikan.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Hapus dengan konfirmasi</td>
                        <td>Pilih baris &rarr; klik <strong>Hapus Terpilih</strong> &rarr; klik <strong>Ya, Hapus</strong></td>
                        <td>Panel konfirmasi muncul, data dihapus setelah disetujui, dan counter statistik berkurang.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 7. Screenshot Aplikasi -->
            <h2>7. Tangkapan Layar Aplikasi (Screenshot)</h2>
            <p>Berikut adalah tangkapan layar asli aplikasi desktop <strong>Student Management System (MVVM)</strong> saat dijalankan di .NET 10. Klik gambar untuk memperbesar tampilan:</p>

            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m5-mvvm1.png" alt="Student Management System MVVM Avalonia UI" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Tampilan utama Student Management System (Pertemuan 5) dengan Split Layout Form, Dashboard Statistik Real-Time, Filter Pencarian, dan DataGrid.</p>
                </div>
            </div>

            <hr>

            <!-- 8. Pertanyaan Pemahaman -->
            <h2>8. Pertanyaan Pemahaman &amp; Konsep MVVM</h2>

            <div class="qa-box">
                <h4>Q1: Apa tujuan utama penggunaan pola arsitektur MVVM pada aplikasi desktop .NET?</h4>
                <p><strong>Jawaban:</strong> MVVM memisahkan antarmuka pengguna (<strong>View</strong>) dari logika presentasi/state (<strong>ViewModel</strong>) dan struktur data (<strong>Model</strong>). Pemisahan ini membuat kode lebih modular, mudah diuji secara terisolasi (<em>unit testable</em>), dan memungkinkan perubahan UI XAML tanpa merusak logika bisnis.</p>
            </div>

            <div class="qa-box">
                <h4>Q2: Mengapa menggunakan <code>ObservableCollection&lt;T&gt;</code> dibandingkan <code>List&lt;T&gt;</code> untuk DataGrid?</h4>
                <p><strong>Jawaban:</strong> <code>ObservableCollection&lt;T&gt;</code> mengimplementasikan antarmuka <code>INotifyCollectionChanged</code>, sehingga setiap penambahan, penghapusan, atau pembersihan item otomatis mengirimkan sinyal ke kontrol UI (<code>DataGrid</code>) agar tampilan langsung diperbarui tanpa perlu me-refresh komponen secara manual.</p>
            </div>

            <div class="qa-box">
                <h4>Q3: Apa fungsi atribut <code>[ObservableProperty]</code> dan <code>[RelayCommand]</code> dari CommunityToolkit.Mvvm?</h4>
                <p><strong>Jawaban:</strong> Keduanya menggunakan <em>Source Generator</em> pada waktu kompilasi untuk menghasilkan implementasi <code>INotifyPropertyChanged</code> (event <code>OnPropertyChanged</code>) dan properti <code>ICommand</code> (seperti <code>SimpanDataCommand</code>) secara otomatis, sehingga kode ViewModel tetap ringkas dan bebas boilerplate.</p>
            </div>

            <div class="qa-box">
                <h4>Q4: Mengapa file <code>MainWindow.axaml.cs</code> pada proyek ini hampir kosong?</h4>
                <p><strong>Jawaban:</strong> Karena seluruh interaksi tombol, input teks, seleksi tabel, validasi, dan notifikasi diikat secara deklaratif di XAML ke properti dan command pada <code>MainViewModel</code> melalui <code>DataContext</code>, menjaga prinsip <em>zero business logic in Code-Behind</em>.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 5 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
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
