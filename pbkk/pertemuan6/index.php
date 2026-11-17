<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Student Management System + Database SQLite (EF Core) - PBKK</title>
    
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
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(16, 185, 129, 0.05));
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
            <span class="badge-subject">🗄️ Pertemuan 6 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>Integrasi Student Management System MVVM ke Database SQLite (Entity Framework Core)</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> C# .NET 10, Avalonia UI 12, CommunityToolkit.Mvvm, EF Core 10, SQLite &bull; 
                <strong>Pola Desain:</strong> MVVM + Repository Pattern (Async CRUD)
            </div>

            <div class="github-box">
                <div class="github-box-info">
                    <strong>📦 Repositori GitHub Source Code</strong>
                    <span>https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan6/demo</span>
                </div>
                <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbkk/pertemuan6/demo" target="_blank" rel="noopener noreferrer" class="btn-github">🔗 Lihat di GitHub &rarr;</a>
            </div>

            <hr>

            <!-- 1. Pendahuluan & Tujuan -->
            <h2>1. Pendahuluan &amp; Ringkasan Praktikum</h2>
            <p>
                Pada Pertemuan 6, aplikasi <strong>Student Management System (MVVM)</strong> dari Pertemuan 5 ditingkatkan agar tidak lagi sekadar menyimpan data secara sementara di memori (<em>in-memory</em>), melainkan terhubung secara persisten ke basis data relasional <strong>SQLite</strong> (<code>students.db</code>) menggunakan <strong>Entity Framework Core (EF Core)</strong>.
            </p>
            <p>
                Dengan integrasi database, seluruh data mahasiswa yang ditambahkan, diperbarui, maupun dihapus akan tetap tersimpan meskipun aplikasi ditutup dan dijalankan kembali. Operasi database dijalankan secara <strong>asinkron (<code>async/await</code>)</strong> melalui <strong>Repository Pattern</strong> agar antarmuka desktop tetap responsif.
            </p>

            <div class="architecture-card">
                <h3 style="margin-top:0; color:var(--text-heading); font-size:1.15rem;">🏗️ Arsitektur MVVM + Repository + EF Core SQLite</h3>
                <div class="architecture-grid">
                    <div class="architecture-step">
                        <strong>1. Entity Model (<code>Student.cs</code>)</strong>
                        <span>Entitas tabel <code>Students</code> lengkap dengan Primary Key <code>Id</code> (Auto-Increment), atribut validasi <code>[Required]</code>, dan <code>CreatedAt</code>.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>2. DbContext (<code>AppDbContext.cs</code>)</strong>
                        <span>Mengonfigurasi provider <code>UseSqlite("Data Source=students.db")</code> serta indeks unik pada kolom <code>NIM</code>.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>3. Repository (<code>StudentRepository.cs</code>)</strong>
                        <span>Mengenkapsulasi query LINQ EF Core asinkron: <code>EnsureCreatedAsync()</code>, seeding awal, filter query, insert, update, delete, dan statistik.</span>
                    </div>
                    <div class="architecture-step">
                        <strong>4. Async MVVM (<code>MainViewModel.cs</code>)</strong>
                        <span>Mengikat <code>AsyncRelayCommand</code> ke tombol UI, menampilkan indikator koneksi <code>● SQLite Connected</code>, dan menyinkronkan data dengan database.</span>
                    </div>
                </div>
            </div>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>💾 Persistensi Otomatis (EnsureCreated)</h4>
                    <p>Saat pertama kali dijalankan, <code>AppDbContext</code> otomatis membuat file database <code>students.db</code> beserta tabel <code>Students</code> dan mengisi 5 data awal jika kosong.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🔑 Unique Index Constraint (NIM)</h4>
                    <p>Kolom <code>NIM</code> dilindungi dengan <code>HasIndex(s =&gt; s.NIM).IsUnique()</code> di level skema SQLite sekaligus validasi di repository.</p>
                </div>
                <div class="code-summary-box">
                    <h4>⚡ Query Filter &amp; Statistik Database</h4>
                    <p>Pencarian kata kunci dan filter Prodi langsung mengeksekusi query LINQ ke SQLite, serta tombol <strong>Refresh DB</strong> untuk sinkronisasi ulang data.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🧩 Pemisahan Interface Repository</h4>
                    <p>Menggunakan antarmuka <code>IStudentRepository</code> sehingga ViewModel tidak bergantung langsung pada detail koneksi database dan mudah diuji.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Perbandingan Pertemuan 5 vs Pertemuan 6 -->
            <h2>2. Evolusi Arsitektur (Pertemuan 5 vs Pertemuan 6)</h2>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Aspek</th>
                        <th>Pertemuan 5 (In-Memory MVVM)</th>
                        <th>Pertemuan 6 (Database SQLite + EF Core)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Penyimpanan Data</strong></td>
                        <td>Sementara di RAM (<code>ObservableCollection</code>), hilang saat aplikasi ditutup.</td>
                        <td><strong>Persisten di SQLite</strong> (<code>students.db</code>) melalui Entity Framework Core.</td>
                    </tr>
                    <tr>
                        <td><strong>Primary Key &amp; Skema</strong></td>
                        <td>Mengandalkan NIM sebagai pengenal di memori.</td>
                        <td>Memiliki kolom <code>Id</code> (<code>AUTOINCREMENT</code>) dan <code>UNIQUE INDEX</code> pada <code>NIM</code>.</td>
                    </tr>
                    <tr>
                        <td><strong>Layer Akses Data</strong></td>
                        <td>Langsung memanipulasi list di dalam ViewModel.</td>
                        <td>Menggunakan <strong>Repository Pattern</strong> (<code>IStudentRepository</code> &amp; <code>AppDbContext</code>).</td>
                    </tr>
                    <tr>
                        <td><strong>Eksekusi Command</strong></td>
                        <td>Sinkron (<code>void SimpanData()</code>).</td>
                        <td>Asinkron (<code>async Task SimpanDataAsync()</code>) agar UI tidak freeze saat akses I/O DB.</td>
                    </tr>
                    <tr>
                        <td><strong>Fitur Tambahan</strong></td>
                        <td>CRUD in-memory, pencarian lokal, dan statistik LINQ.</td>
                        <td>Auto-create &amp; auto-seed DB, badge status koneksi SQLite, tombol <strong>Refresh DB</strong>, dan kolom <code>ID</code> tabel.</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 3. Skema Tabel Database -->
            <h2>3. Struktur Skema Tabel SQLite (<code>Students</code>)</h2>
            <p>Berikut adalah struktur tabel <code>Students</code> yang dihasilkan otomatis oleh Entity Framework Core di dalam file <code>students.db</code>:</p>
            <table class="test-table">
                <thead>
                    <tr>
                        <th>Kolom</th>
                        <th>Tipe SQLite</th>
                        <th>Aturan / Constraint</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><code>Id</code></td><td><code>INTEGER</code></td><td><code>PRIMARY KEY AUTOINCREMENT</code></td><td>Identitas unik internal setiap baris</td></tr>
                    <tr><td><code>NIM</code></td><td><code>TEXT</code></td><td><code>NOT NULL, UNIQUE INDEX</code></td><td>Nomor Induk Mahasiswa (maks. 20 karakter)</td></tr>
                    <tr><td><code>Nama</code></td><td><code>TEXT</code></td><td><code>NOT NULL</code></td><td>Nama lengkap mahasiswa (maks. 120 karakter)</td></tr>
                    <tr><td><code>Prodi</code></td><td><code>TEXT</code></td><td><code>NOT NULL</code></td><td>Program studi mahasiswa</td></tr>
                    <tr><td><code>Gender</code></td><td><code>TEXT</code></td><td><code>NOT NULL</code></td><td>Jenis kelamin (Laki-laki / Perempuan)</td></tr>
                    <tr><td><code>TanggalLahir</code></td><td><code>TEXT</code></td><td><code>NULL</code></td><td>Tanggal lahir mahasiswa</td></tr>
                    <tr><td><code>Alamat</code></td><td><code>TEXT</code></td><td><code>NOT NULL</code></td><td>Alamat domisili mahasiswa</td></tr>
                    <tr><td><code>NoTelepon</code></td><td><code>TEXT</code></td><td><code>NOT NULL</code></td><td>Nomor telepon aktif</td></tr>
                    <tr><td><code>CreatedAt</code></td><td><code>TEXT</code></td><td><code>NOT NULL</code></td><td>Waktu pencatatan record ke database</td></tr>
                </tbody>
            </table>

            <hr>

            <!-- 4. Panduan Menjalankan Program -->
            <h2>4. Cara Menjalankan Aplikasi (.NET CLI)</h2>
            <p>Pastikan paket NuGet telah ter-restore, lalu jalankan proyek Pertemuan 6 dengan perintah berikut:</p>

            <div class="terminal-box">
                <span class="prompt"># 1. Masuk ke folder demo Pertemuan 6:</span><br>
                cd pbkk/pertemuan6/demo<br><br>
                <span class="prompt"># 2. Build aplikasi:</span><br>
                dotnet build<br><br>
                <span class="prompt"># 3. Jalankan aplikasi (otomatis membuat &amp; menghubungkan students.db):</span><br>
                dotnet run
            </div>

            <hr>

            <!-- 5. Source Code Lengkap -->
            <h2>5. Source Code Lengkap</h2>

            <h3>A. Entity Model: <code>Models/Student.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeModel6')">Copy Code</button>
                <pre><code id="codeModel6">using System;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace StudentManagementDB.Models;

/// &lt;summary&gt;
/// Entitas Student yang dipetakan ke tabel Students pada database SQLite via EF Core.
/// &lt;/summary&gt;
public class Student
{
    [Key]
    [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
    public int Id { get; set; }

    [Required]
    [MaxLength(20)]
    public string NIM { get; set; } = string.Empty;

    [Required]
    [MaxLength(120)]
    public string Nama { get; set; } = string.Empty;

    [Required]
    [MaxLength(80)]
    public string Prodi { get; set; } = string.Empty;

    [Required]
    [MaxLength(20)]
    public string Gender { get; set; } = string.Empty;

    public DateTime? TanggalLahir { get; set; }

    [Required]
    [MaxLength(250)]
    public string Alamat { get; set; } = string.Empty;

    [Required]
    [MaxLength(25)]
    public string NoTelepon { get; set; } = string.Empty;

    public DateTime CreatedAt { get; set; } = DateTime.Now;

    [NotMapped]
    public string TanggalLahirDisplay =&gt;
        TanggalLahir.HasValue ? TanggalLahir.Value.ToString("dd/MM/yyyy") : "-";

    [NotMapped]
    public string CreatedAtDisplay =&gt; CreatedAt.ToString("dd/MM/yyyy HH:mm");
}</code></pre>
            </div>

            <h3>B. Database Context: <code>Data/AppDbContext.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeDb6')">Copy Code</button>
                <pre><code id="codeDb6">using System;
using System.IO;
using Microsoft.EntityFrameworkCore;
using StudentManagementDB.Models;

namespace StudentManagementDB.Data;

/// &lt;summary&gt;
/// Entity Framework Core DbContext untuk koneksi database SQLite.
/// &lt;/summary&gt;
public class AppDbContext : DbContext
{
    private readonly string _dbPath;

    public static string DefaultDbPath =&gt; Path.Combine(AppContext.BaseDirectory, "students.db");

    public DbSet&lt;Student&gt; Students =&gt; Set&lt;Student&gt;();

    public AppDbContext() : this(DefaultDbPath)
    {
    }

    public AppDbContext(string dbPath)
    {
        _dbPath = dbPath;
    }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
    {
        if (!optionsBuilder.IsConfigured)
        {
            optionsBuilder.UseSqlite($"Data Source={_dbPath}");
        }
    }

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        base.OnModelCreating(modelBuilder);

        modelBuilder.Entity&lt;Student&gt;(entity =&gt;
        {
            entity.ToTable("Students");
            entity.HasIndex(s =&gt; s.NIM).IsUnique();
        });
    }
}</code></pre>
            </div>

            <h3>C. Repository Interface &amp; Implementasi: <code>Services/IStudentRepository.cs</code> &amp; <code>Services/StudentRepository.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeRepo6')">Copy Code</button>
                <pre><code id="codeRepo6">// ===== Services/IStudentRepository.cs =====
using System.Collections.Generic;
using System.Threading.Tasks;
using StudentManagementDB.Models;

namespace StudentManagementDB.Services;

public record StudentStatistics(
    int TotalStudents,
    int TotalInformatika,
    int TotalSistemInformasi,
    int TotalLakiLaki,
    int TotalPerempuan);

public interface IStudentRepository
{
    string DatabasePath { get; }
    Task InitializeAndSeedAsync();
    Task&lt;List&lt;Student&gt;&gt; GetAllAsync(string? searchQuery = null, string? prodiFilter = null);
    Task&lt;Student&gt; AddAsync(Student student);
    Task&lt;Student&gt; UpdateAsync(Student student);
    Task DeleteAsync(int id);
    Task&lt;StudentStatistics&gt; GetStatisticsAsync();
}

// ===== Services/StudentRepository.cs =====
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using StudentManagementDB.Data;
using StudentManagementDB.Models;

namespace StudentManagementDB.Services;

/// &lt;summary&gt;
/// Implementasi Repository Pattern dengan Entity Framework Core (SQLite).
/// &lt;/summary&gt;
public class StudentRepository : IStudentRepository
{
    public string DatabasePath { get; }

    public StudentRepository() : this(AppDbContext.DefaultDbPath)
    {
    }

    public StudentRepository(string databasePath)
    {
        DatabasePath = databasePath;
    }

    private AppDbContext CreateContext() =&gt; new(DatabasePath);

    public async Task InitializeAndSeedAsync()
    {
        await using var db = CreateContext();
        await db.Database.EnsureCreatedAsync();

        if (!await db.Students.AnyAsync())
        {
            db.Students.AddRange(
                new Student
                {
                    NIM = "5025241225",
                    Nama = "Ageng Prayogo",
                    Prodi = "Teknik Informatika",
                    Gender = "Laki-laki",
                    TanggalLahir = new DateTime(2005, 8, 17),
                    Alamat = "Jl. Teknik Kimia, Keputih, Surabaya",
                    NoTelepon = "081234567890",
                    CreatedAt = DateTime.Now
                },
                new Student
                {
                    NIM = "5026241042",
                    Nama = "Nadia Putri Maharani",
                    Prodi = "Sistem Informasi",
                    Gender = "Perempuan",
                    TanggalLahir = new DateTime(2006, 2, 11),
                    Alamat = "Jl. Dharmahusada Indah No. 18, Surabaya",
                    NoTelepon = "085712349876",
                    CreatedAt = DateTime.Now
                },
                new Student
                {
                    NIM = "5025241108",
                    Nama = "Rafi Pratama Putra",
                    Prodi = "Teknik Informatika",
                    Gender = "Laki-laki",
                    TanggalLahir = new DateTime(2005, 11, 3),
                    Alamat = "Perum Bumi Marina Emas Blok C-4, Surabaya",
                    NoTelepon = "082198765432",
                    CreatedAt = DateTime.Now
                },
                new Student
                {
                    NIM = "5027241019",
                    Nama = "Aulia Zahra Ramadhani",
                    Prodi = "Teknologi Informasi",
                    Gender = "Perempuan",
                    TanggalLahir = new DateTime(2006, 4, 22),
                    Alamat = "Jl. Mulyosari Tengah No. 27, Surabaya",
                    NoTelepon = "081345678912",
                    CreatedAt = DateTime.Now
                },
                new Student
                {
                    NIM = "5026241077",
                    Nama = "Dimas Bagus Prasetyo",
                    Prodi = "Sistem Informasi",
                    Gender = "Laki-laki",
                    TanggalLahir = new DateTime(2005, 12, 9),
                    Alamat = "Jl. Gebang Lor No. 55, Sukolilo, Surabaya",
                    NoTelepon = "089511223344",
                    CreatedAt = DateTime.Now
                }
            );
            await db.SaveChangesAsync();
        }
    }

    public async Task&lt;List&lt;Student&gt;&gt; GetAllAsync(string? searchQuery = null, string? prodiFilter = null)
    {
        await using var db = CreateContext();
        IQueryable&lt;Student&gt; query = db.Students.AsNoTracking();

        if (!string.IsNullOrWhiteSpace(prodiFilter) &amp;&amp; prodiFilter != "Semua Prodi")
        {
            query = query.Where(s =&gt; s.Prodi == prodiFilter);
        }

        if (!string.IsNullOrWhiteSpace(searchQuery))
        {
            string keyword = searchQuery.Trim().ToLower();
            query = query.Where(s =&gt;
                s.NIM.ToLower().Contains(keyword) ||
                s.Nama.ToLower().Contains(keyword) ||
                s.Prodi.ToLower().Contains(keyword) ||
                s.Alamat.ToLower().Contains(keyword));
        }

        return await query.OrderBy(s =&gt; s.Id).ToListAsync();
    }

    public async Task&lt;Student&gt; AddAsync(Student student)
    {
        await using var db = CreateContext();

        bool exists = await db.Students.AnyAsync(s =&gt; s.NIM.ToLower() == student.NIM.ToLower());
        if (exists)
        {
            throw new InvalidOperationException($"NIM '{student.NIM}' sudah terdaftar di database!");
        }

        student.CreatedAt = DateTime.Now;
        db.Students.Add(student);
        await db.SaveChangesAsync();
        return student;
    }

    public async Task&lt;Student&gt; UpdateAsync(Student student)
    {
        await using var db = CreateContext();

        var existing = await db.Students.FindAsync(student.Id)
            ?? throw new InvalidOperationException("Data mahasiswa tidak ditemukan di database.");

        bool nimConflict = await db.Students.AnyAsync(s =&gt;
            s.Id != student.Id &amp;&amp; s.NIM.ToLower() == student.NIM.ToLower());

        if (nimConflict)
        {
            throw new InvalidOperationException($"NIM '{student.NIM}' sudah digunakan oleh mahasiswa lain!");
        }

        existing.NIM = student.NIM;
        existing.Nama = student.Nama;
        existing.Prodi = student.Prodi;
        existing.Gender = student.Gender;
        existing.TanggalLahir = student.TanggalLahir;
        existing.Alamat = student.Alamat;
        existing.NoTelepon = student.NoTelepon;

        await db.SaveChangesAsync();
        return existing;
    }

    public async Task DeleteAsync(int id)
    {
        await using var db = CreateContext();
        var existing = await db.Students.FindAsync(id);
        if (existing is not null)
        {
            db.Students.Remove(existing);
            await db.SaveChangesAsync();
        }
    }

    public async Task&lt;StudentStatistics&gt; GetStatisticsAsync()
    {
        await using var db = CreateContext();
        var list = await db.Students.AsNoTracking().ToListAsync();

        return new StudentStatistics(
            TotalStudents: list.Count,
            TotalInformatika: list.Count(s =&gt; s.Prodi == "Teknik Informatika"),
            TotalSistemInformasi: list.Count(s =&gt; s.Prodi == "Sistem Informasi"),
            TotalLakiLaki: list.Count(s =&gt; s.Gender == "Laki-laki"),
            TotalPerempuan: list.Count(s =&gt; s.Gender == "Perempuan")
        );
    }
}</code></pre>
            </div>

            <h3>D. ViewModel Asinkron: <code>ViewModels/MainViewModel.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeVm6')">Copy Code</button>
                <pre><code id="codeVm6">using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.IO;
using System.Threading.Tasks;
using CommunityToolkit.Mvvm.ComponentModel;
using CommunityToolkit.Mvvm.Input;
using StudentManagementDB.Models;
using StudentManagementDB.Services;

namespace StudentManagementDB.ViewModels;

public partial class MainViewModel : ViewModelBase
{
    private readonly IStudentRepository _repository;
    private bool _isInitialized;

    public ObservableCollection&lt;Student&gt; Students { get; } = new();

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

    [ObservableProperty] public partial string Nim { get; set; } = string.Empty;
    [ObservableProperty] public partial string Nama { get; set; } = string.Empty;
    [ObservableProperty] public partial string? SelectedProdi { get; set; }
    [ObservableProperty] public partial bool IsLakiLaki { get; set; }
    [ObservableProperty] public partial bool IsPerempuan { get; set; }
    [ObservableProperty] public partial DateTime? TanggalLahir { get; set; } = new DateTime(2005, 5, 14);
    [ObservableProperty] public partial string Alamat { get; set; } = string.Empty;
    [ObservableProperty] public partial string NoTelepon { get; set; } = string.Empty;

    [ObservableProperty] public partial Student? SelectedStudent { get; set; }

    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(FormTitle))]
    [NotifyPropertyChangedFor(nameof(SubmitButtonText))]
    public partial bool IsEditMode { get; set; }

    private int? _editingStudentId;

    [ObservableProperty] public partial string SearchQuery { get; set; } = string.Empty;
    [ObservableProperty] public partial string SelectedFilterProdi { get; set; } = "Semua Prodi";

    [ObservableProperty] public partial int TotalStudents { get; set; }
    [ObservableProperty] public partial int TotalInformatika { get; set; }
    [ObservableProperty] public partial int TotalSistemInformasi { get; set; }
    [ObservableProperty] public partial int TotalLakiLaki { get; set; }
    [ObservableProperty] public partial int TotalPerempuan { get; set; }
    [ObservableProperty] public partial int FilteredCount { get; set; }

    [ObservableProperty] public partial string DbConnectionBadge { get; set; } = "Menghubungkan SQLite...";

    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(HasStatusMessage))]
    public partial string StatusMessage { get; set; } = string.Empty;

    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(StatusBackground))]
    [NotifyPropertyChangedFor(nameof(StatusBorderBrush))]
    [NotifyPropertyChangedFor(nameof(StatusForeground))]
    public partial bool IsErrorStatus { get; set; }

    [ObservableProperty] public partial bool IsDeleteConfirmVisible { get; set; }
    [ObservableProperty] public partial string DeleteConfirmMessage { get; set; } = string.Empty;

    public bool HasStatusMessage =&gt; !string.IsNullOrWhiteSpace(StatusMessage);
    public string FormTitle =&gt; IsEditMode ? "EDIT DATA MAHASISWA (DB)" : "TAMBAH DATA KE DATABASE";
    public string SubmitButtonText =&gt; IsEditMode ? "Update ke DB" : "Simpan ke DB";

    public string StatusBackground =&gt; IsErrorStatus ? "#FEF2F2" : "#ECFDF5";
    public string StatusBorderBrush =&gt; IsErrorStatus ? "#FCA5A5" : "#6EE7B7";
    public string StatusForeground =&gt; IsErrorStatus ? "#B91C1C" : "#047857";

    public MainViewModel() : this(new StudentRepository())
    {
    }

    public MainViewModel(IStudentRepository repository)
    {
        _repository = repository;
        _ = InitializeAsync();
    }

    public async Task InitializeAsync()
    {
        try
        {
            await _repository.InitializeAndSeedAsync();
            _isInitialized = true;
            await LoadFromDatabaseAsync();
            string dbFile = Path.GetFileName(_repository.DatabasePath);
            DbConnectionBadge = $"● SQLite Connected ({dbFile})";
            SetStatus($"Database SQLite '{dbFile}' siap. {TotalStudents} data mahasiswa dimuat dari tabel Students.", isError: false);
        }
        catch (Exception ex)
        {
            DbConnectionBadge = "● SQLite Error";
            SetStatus($"Gagal menghubungkan database: {ex.Message}", isError: true);
        }
    }

    partial void OnSearchQueryChanged(string value)
    {
        if (_isInitialized) _ = LoadFromDatabaseAsync();
    }

    partial void OnSelectedFilterProdiChanged(string value)
    {
        if (_isInitialized) _ = LoadFromDatabaseAsync();
    }

    private async Task LoadFromDatabaseAsync()
    {
        var list = await _repository.GetAllAsync(SearchQuery, SelectedFilterProdi);
        Students.Clear();
        foreach (var item in list)
        {
            Students.Add(item);
        }
        FilteredCount = Students.Count;

        var stats = await _repository.GetStatisticsAsync();
        TotalStudents = stats.TotalStudents;
        TotalInformatika = stats.TotalInformatika;
        TotalSistemInformasi = stats.TotalSistemInformasi;
        TotalLakiLaki = stats.TotalLakiLaki;
        TotalPerempuan = stats.TotalPerempuan;
    }

    [RelayCommand]
    private async Task SimpanDataAsync()
    {
        string nimTrim = Nim.Trim();
        string namaTrim = Nama.Trim();
        string alamatTrim = Alamat.Trim();
        string telpTrim = NoTelepon.Trim();

        if (string.IsNullOrWhiteSpace(nimTrim)) { SetStatus("NIM mahasiswa wajib diisi!", true); return; }
        if (string.IsNullOrWhiteSpace(namaTrim)) { SetStatus("Nama lengkap mahasiswa wajib diisi!", true); return; }
        if (string.IsNullOrWhiteSpace(SelectedProdi)) { SetStatus("Program studi harus dipilih!", true); return; }
        if (!IsLakiLaki &amp;&amp; !IsPerempuan) { SetStatus("Jenis kelamin harus dipilih!", true); return; }
        if (string.IsNullOrWhiteSpace(telpTrim)) { SetStatus("Nomor telepon wajib diisi!", true); return; }
        if (string.IsNullOrWhiteSpace(alamatTrim)) { SetStatus("Alamat domisili wajib diisi!", true); return; }

        string gender = IsLakiLaki ? "Laki-laki" : "Perempuan";

        try
        {
            if (IsEditMode &amp;&amp; _editingStudentId.HasValue)
            {
                await _repository.UpdateAsync(new Student
                {
                    Id = _editingStudentId.Value,
                    NIM = nimTrim,
                    Nama = namaTrim,
                    Prodi = SelectedProdi,
                    Gender = gender,
                    TanggalLahir = TanggalLahir,
                    Alamat = alamatTrim,
                    NoTelepon = telpTrim
                });

                await LoadFromDatabaseAsync();
                ResetFormInternal();
                SetStatus($"Perubahan data '{namaTrim}' ({nimTrim}) berhasil disimpan ke SQLite!", false);
            }
            else
            {
                await _repository.AddAsync(new Student
                {
                    NIM = nimTrim,
                    Nama = namaTrim,
                    Prodi = SelectedProdi,
                    Gender = gender,
                    TanggalLahir = TanggalLahir,
                    Alamat = alamatTrim,
                    NoTelepon = telpTrim
                });

                await LoadFromDatabaseAsync();
                ResetFormInternal();
                SetStatus($"Mahasiswa baru '{namaTrim}' ({nimTrim}) berhasil disimpan ke database SQLite!", false);
            }
        }
        catch (Exception ex)
        {
            SetStatus(ex.Message, isError: true);
        }
    }

    [RelayCommand]
    private void MulaiEdit()
    {
        if (SelectedStudent is null)
        {
            SetStatus("Pilih baris mahasiswa di tabel untuk diedit!", isError: true);
            return;
        }

        IsDeleteConfirmVisible = false;
        IsEditMode = true;
        _editingStudentId = SelectedStudent.Id;

        Nim = SelectedStudent.NIM;
        Nama = SelectedStudent.Nama;
        SelectedProdi = SelectedStudent.Prodi;
        IsLakiLaki = SelectedStudent.Gender == "Laki-laki";
        IsPerempuan = SelectedStudent.Gender == "Perempuan";
        TanggalLahir = SelectedStudent.TanggalLahir;
        Alamat = SelectedStudent.Alamat;
        NoTelepon = SelectedStudent.NoTelepon;

        SetStatus($"Mode edit DB aktif untuk ID #{SelectedStudent.Id} ({SelectedStudent.Nama}).", false);
    }

    [RelayCommand]
    private void MintaKonfirmasiHapus()
    {
        if (SelectedStudent is null)
        {
            SetStatus("Pilih data mahasiswa pada tabel sebelum menghapus!", isError: true);
            return;
        }

        DeleteConfirmMessage = $"Hapus permanen data \"{SelectedStudent.Nama}\" (ID #{SelectedStudent.Id}, NIM: {SelectedStudent.NIM}) dari database SQLite?";
        IsDeleteConfirmVisible = true;
    }

    [RelayCommand]
    private async Task KonfirmasiHapusAsync()
    {
        if (SelectedStudent is null)
        {
            IsDeleteConfirmVisible = false;
            return;
        }

        try
        {
            int targetId = SelectedStudent.Id;
            string targetName = SelectedStudent.Nama;
            string targetNim = SelectedStudent.NIM;

            await _repository.DeleteAsync(targetId);

            if (IsEditMode &amp;&amp; _editingStudentId == targetId)
            {
                ResetFormInternal();
            }

            SelectedStudent = null;
            IsDeleteConfirmVisible = false;
            await LoadFromDatabaseAsync();
            SetStatus($"Data '{targetName}' ({targetNim}) berhasil dihapus dari database SQLite.", false);
        }
        catch (Exception ex)
        {
            IsDeleteConfirmVisible = false;
            SetStatus($"Gagal menghapus data: {ex.Message}", isError: true);
        }
    }

    [RelayCommand]
    private void BatalHapus() =&gt; IsDeleteConfirmVisible = false;

    [RelayCommand]
    private void ResetForm()
    {
        ResetFormInternal();
        SetStatus("Formulir dibersihkan.", isError: false);
    }

    [RelayCommand]
    private async Task RefreshDatabaseAsync()
    {
        try
        {
            await LoadFromDatabaseAsync();
            SetStatus($"Sinkronisasi ulang berhasil: {TotalStudents} record dimuat dari SQLite.", isError: false);
        }
        catch (Exception ex)
        {
            SetStatus($"Gagal refresh database: {ex.Message}", isError: true);
        }
    }

    private void ResetFormInternal()
    {
        IsEditMode = false;
        _editingStudentId = null;
        Nim = string.Empty;
        Nama = string.Empty;
        SelectedProdi = null;
        IsLakiLaki = false;
        IsPerempuan = false;
        TanggalLahir = new DateTime(2005, 5, 14);
        Alamat = string.Empty;
        NoTelepon = string.Empty;
    }

    private void SetStatus(string message, bool isError)
    {
        IsErrorStatus = isError;
        StatusMessage = message;
    }
}</code></pre>
            </div>

            <h3>E. View XAML &amp; Project Config: <code>Views/MainWindow.axaml</code> &amp; <code>StudentManagementDB.csproj</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeAxaml6')">Copy Code</button>
                <pre><code id="codeAxaml6">&lt;!-- Views/MainWindow.axaml --&gt;
&lt;Window xmlns="https://github.com/avaloniaui"
        xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"
        xmlns:vm="using:StudentManagementDB.ViewModels"
        xmlns:d="http://schemas.microsoft.com/expression/blend/2008"
        xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006"
        mc:Ignorable="d" d:DesignWidth="1480" d:DesignHeight="790"
        x:Class="StudentManagementDB.Views.MainWindow"
        x:DataType="vm:MainViewModel"
        Icon="/Assets/avalonia-logo.ico"
        Title="Student Management System — Pertemuan 6 (MVVM + SQLite EF Core)"
        Width="1480" Height="790"
        MinWidth="1060" MinHeight="680"
        WindowStartupLocation="CenterScreen"
        Background="#F1F5F9"&gt;

    &lt;Design.DataContext&gt;
        &lt;vm:MainViewModel /&gt;
    &lt;/Design.DataContext&gt;

    &lt;Grid RowDefinitions="Auto,*,Auto" Margin="20"&gt;
        &lt;!-- HEADER BANNER --&gt;
        &lt;Border Grid.Row="0" Background="#FFFFFF" CornerRadius="14" Padding="20,14"
                BorderBrush="#E2E8F0" BorderThickness="1" Margin="0,0,0,14"&gt;
            &lt;Grid ColumnDefinitions="*,Auto,10,Auto"&gt;
                &lt;StackPanel Grid.Column="0" Spacing="2"&gt;
                    &lt;TextBlock Text="STUDENT MANAGEMENT SYSTEM • DATABASE EDITION"
                               FontSize="20.5" FontWeight="Bold" Foreground="#0F172A" /&gt;
                    &lt;TextBlock Text="Integrasi Persisten SQLite + Entity Framework Core (Repository Pattern &amp;amp; Async MVVM)"
                               FontSize="12.5" Foreground="#64748B" /&gt;
                &lt;/StackPanel&gt;
                &lt;Border Grid.Column="1" VerticalAlignment="Center"
                        Background="#ECFDF5" CornerRadius="20" Padding="14,7"
                        BorderBrush="#A7F3D0" BorderThickness="1"&gt;
                    &lt;TextBlock Text="{Binding DbConnectionBadge}"
                               FontSize="12" FontWeight="SemiBold" Foreground="#047857" /&gt;
                &lt;/Border&gt;
                &lt;Border Grid.Column="3" VerticalAlignment="Center"
                        Background="#EDE9FE" CornerRadius="20" Padding="14,7"
                        BorderBrush="#DDD6FE" BorderThickness="1"&gt;
                    &lt;TextBlock Text="Pertemuan 6 • EF Core SQLite"
                               FontSize="12" FontWeight="SemiBold" Foreground="#6D28D9" /&gt;
                &lt;/Border&gt;
            &lt;/Grid&gt;
        &lt;/Border&gt;

        &lt;!-- KONTEN UTAMA --&gt;
        &lt;Grid Grid.Row="1" ColumnDefinitions="330,16,*"&gt;
            &lt;!-- PANEL KIRI: FORM INPUT DATABASE --&gt;
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

            &lt;!-- PANEL KANAN: STATISTIK + QUERY TOOLBAR + DATAGRID --&gt;
            &lt;Grid Grid.Column="2" RowDefinitions="Auto,Auto,*,Auto"&gt;
                &lt;Grid Grid.Row="0" ColumnDefinitions="*,*,*,*,*" Margin="0,0,0,12"&gt;
                    &lt;Border Grid.Column="0" Background="#FFFFFF" CornerRadius="12" Padding="14,10"
                            BorderBrush="#E2E8F0" BorderThickness="1" Margin="0,0,8,0"&gt;
                        &lt;StackPanel Spacing="2"&gt;
                            &lt;TextBlock Text="Total di DB" FontSize="11.5" Foreground="#64748B" FontWeight="SemiBold" /&gt;
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
                    &lt;Grid ColumnDefinitions="*,10,165,10,Auto,8,Auto,8,Auto"&gt;
                        &lt;TextBox Grid.Column="0"
                                 Text="{Binding SearchQuery}"
                                 PlaceholderText="Query SQLite: Cari NIM, Nama, Prodi, atau Alamat..."
                                 Height="35" /&gt;
                        &lt;ComboBox Grid.Column="2"
                                  ItemsSource="{Binding FilterProdiOptions}"
                                  SelectedItem="{Binding SelectedFilterProdi}"
                                  HorizontalAlignment="Stretch"
                                  Height="35" /&gt;
                        &lt;Button Grid.Column="4"
                                Content="Refresh DB"
                                Command="{Binding RefreshDatabaseCommand}"
                                Height="35" Padding="12,0"
                                VerticalContentAlignment="Center"
                                Background="#0EA5E9" Foreground="#FFFFFF"
                                FontWeight="SemiBold" CornerRadius="8" /&gt;
                        &lt;Button Grid.Column="6"
                                Content="Edit"
                                Command="{Binding MulaiEditCommand}"
                                Height="35" Padding="14,0"
                                VerticalContentAlignment="Center"
                                Background="#F59E0B" Foreground="#FFFFFF"
                                FontWeight="SemiBold" CornerRadius="8" /&gt;
                        &lt;Button Grid.Column="8"
                                Content="Hapus"
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
                            &lt;TextBlock Text="DATA MAHASISWA TERSIMPAN (TABEL: Students)"
                                       FontSize="13.5" FontWeight="Bold" Foreground="#1E293B" /&gt;
                            &lt;TextBlock Grid.Column="1"
                                       Text="{Binding FilteredCount, StringFormat='Query result: {0} baris'}"
                                       FontSize="12" Foreground="#64748B" VerticalAlignment="Center" /&gt;
                        &lt;/Grid&gt;

                        &lt;DataGrid Grid.Row="1"
                                  ItemsSource="{Binding Students}"
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
                                &lt;DataGridTextColumn Header="ID" Binding="{Binding Id}" Width="Auto" /&gt;
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
                                Content="Ya, Hapus dari DB"
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
                       Text="Ageng Prayogo (5025241225) • PBKK Pertemuan 6"
                       FontSize="12" Foreground="#64748B" VerticalAlignment="Center" /&gt;
        &lt;/Grid&gt;
    &lt;/Grid&gt;
&lt;/Window&gt;

&lt;!-- StudentManagementDB.csproj --&gt;
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
    &lt;PackageReference Include="Microsoft.EntityFrameworkCore.Sqlite" Version="10.0.15" /&gt;
  &lt;/ItemGroup&gt;
&lt;/Project&gt;</code></pre>
            </div>

            <hr>

            <!-- 6. Tabel Pengujian -->
            <h2>6. Tabel Pengujian Fungsionalitas Database</h2>
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
                        <td>Inisialisasi &amp; Seeding SQLite</td>
                        <td>Jalankan aplikasi untuk pertama kali</td>
                        <td>File <code>students.db</code> terbentuk otomatis, tabel <code>Students</code> terisi 5 record awal, badge menampilkan <code>● SQLite Connected</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Insert ke SQLite (Create)</td>
                        <td>Isi formulir mahasiswa baru lalu klik <strong>Simpan ke DB</strong></td>
                        <td>Data tersimpan ke tabel <code>Students</code>, mendapat <code>Id</code> otomatis, dan tetap ada setelah aplikasi dibuka ulang.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Query Pencarian &amp; Filter DB</td>
                        <td>Ketik keyword pencarian atau pilih filter Prodi</td>
                        <td><code>StudentRepository.GetAllAsync()</code> mengeksekusi query terfilter ke SQLite dan memperbarui <code>DataGrid</code>.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Update Data di SQLite</td>
                        <td>Pilih baris &rarr; klik <strong>Edit</strong> &rarr; ubah data &rarr; klik <strong>Update ke DB</strong></td>
                        <td>Baris terkait diperbarui di database SQLite dan kartu statistik ikut diperbarui.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Delete Permanen di SQLite</td>
                        <td>Pilih baris &rarr; klik <strong>Hapus</strong> &rarr; konfirmasi <strong>Ya, Hapus dari DB</strong></td>
                        <td>Record dihapus permanen dari <code>students.db</code> dan jumlah total pada kartu statistik berkurang.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Validasi Unique NIM</td>
                        <td>Simpan NIM yang sudah ada di tabel <code>Students</code></td>
                        <td>Repository menolak operasi dan menampilkan pesan error duplikat NIM.</td>
                        <td><span class="status-badge-ok">&#10003; Berhasil</span></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- 7. Screenshot Aplikasi -->
            <h2>7. Tangkapan Layar Aplikasi (Screenshot)</h2>
            <p>Berikut adalah tangkapan layar asli aplikasi <strong>Student Management System &bull; Database Edition</strong> yang terhubung ke database SQLite <code>students.db</code>. Klik gambar untuk memperbesar:</p>

            <div id="screenshot-container">
                <div class="screenshot-frame">
                    <img src="../../img/pbkk-m6-db1.png" alt="Student Management System EF Core SQLite Screenshot" onclick="openModal(this)">
                    <p class="caption">Gambar 1: Antarmuka aplikasi Pertemuan 6 dengan indikator koneksi SQLite aktif (<code>students.db</code>), 5 record tersimpan di tabel <code>Students</code>, dan statistik database real-time.</p>
                </div>
            </div>

            <hr>

            <!-- 8. Pertanyaan Pemahaman -->
            <h2>8. Pertanyaan Pemahaman &amp; Konsep Database .NET</h2>

            <div class="qa-box">
                <h4>Q1: Apa peran <code>DbContext</code> dan <code>DbSet&lt;Student&gt;</code> pada Entity Framework Core?</h4>
                <p><strong>Jawaban:</strong> <code>DbContext</code> bertindak sebagai jembatan utama antara objek C# dan database relasional (mengelola koneksi, pelacakan perubahan/<em>change tracking</em>, dan penyimpanan transaksi). Sementara <code>DbSet&lt;Student&gt;</code> merepresentasikan tabel <code>Students</code> sehingga kita dapat melakukan operasi CRUD menggunakan sintaks LINQ yang type-safe.</p>
            </div>

            <div class="qa-box">
                <h4>Q2: Apa kelebihan menggunakan <code>Database.EnsureCreatedAsync()</code> pada aplikasi desktop SQLite?</h4>
                <p><strong>Jawaban:</strong> <code>EnsureCreatedAsync()</code> secara otomatis membuat file database <code>students.db</code> beserta seluruh skema tabel dan indeksnya saat aplikasi pertama kali dijalankan jika database belum ada, sehingga aplikasi langsung siap pakai di komputer mana pun tanpa proses setup server manual.</p>
            </div>

            <div class="qa-box">
                <h4>Q3: Mengapa operasi repository dibuat asinkron (<code>async/await</code>)?</h4>
                <p><strong>Jawaban:</strong> Operasi baca/tulis disk pada database merupakan pekerjaan I/O-bound. Menggunakan <code>async/await</code> (<code>ToListAsync()</code>, <code>SaveChangesAsync()</code>) memastikan UI thread Avalonia tetap responsif dan tidak macet (<em>freeze</em>) selama query database berlangsung.</p>
            </div>

            <div class="qa-box">
                <h4>Q4: Mengapa menerapkan Repository Pattern (<code>IStudentRepository</code>) di atas <code>AppDbContext</code>?</h4>
                <p><strong>Jawaban:</strong> Repository Pattern memisahkan logika query database dari ViewModel. Jika suatu saat backend database diganti dari SQLite ke MySQL atau SQL Server, kita cukup mengubah konfigurasi provider di layer Data/Service tanpa perlu mengubah logika bisnis di <code>MainViewModel</code> maupun tampilan XAML.</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 6 &bull; <a href="https://github.com/YOGA3321/tugas-pweb---pbo" target="_blank" rel="noopener noreferrer">GitHub Repository</a> &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
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
