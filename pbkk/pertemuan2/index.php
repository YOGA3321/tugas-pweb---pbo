<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: C# Console CRUD Data Mahasiswa - PBKK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css">
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
        .screenshot-placeholder-box {
            background-color: var(--bg-color);
            padding: 25px;
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
            <span class="badge-subject">🚀 Pertemuan 2 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>Aplikasi Console CRUD Data Mahasiswa Berwarna (C# / .NET)</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Bahasa / Runtime:</strong> C# 10 / .NET SDK &bull; 
                <strong>Tipe Proyek:</strong> Console Application (CLI)
            </div>

            <hr>

            <!-- 1. Penjelasan Program -->
            <h2>1. Apa Itu Program Ini?</h2>
            <p>
                Program ini adalah <strong>Aplikasi Sistem Informasi Data Mahasiswa</strong> berbasis terminal (Console Application) yang ditulis menggunakan bahasa pemrograman <strong>C# (.NET)</strong> sesuai dengan modul latihan pada materi kuliah PBKK Pak Fajar Baskoro.
            </p>
            <p>
                Aplikasi ini menerapkan konsep dasar <strong>CRUD (Create, Read, Search, Delete)</strong> secara <em>in-memory</em> menggunakan struktur data <code>List&lt;Mahasiswa&gt;</code> dengan antarmuka terminal interaktif yang diperkaya dengan pewarnaan teks (<em>Colored Console UI</em>) menyerupai tampilan pada slide modul resmi.
            </p>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🎨 Terminal Berwarna (ConsoleColor)</h4>
                    <p>Memanfaatkan <code>Console.ForegroundColor</code> dan <code>Console.BackgroundColor</code> untuk memberikan aksen badge angka menu, header cyan, pesan sukses hijau, dan peringatan merah.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🏗️ Paradigma OOP</h4>
                    <p>Menerapkan class <code>Mahasiswa</code> dengan auto-properties (<code>{ get; set; }</code>) dan constructor untuk enkapsulasi entitas mahasiswa.</p>
                </div>
                <div class="code-summary-box">
                    <h4>📦 List Collection</h4>
                    <p>Menggunakan <code>List&lt;Mahasiswa&gt;</code> dari namespace <code>System.Collections.Generic</code> sebagai penampung data dinamis tanpa batas ukuran kaku.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🛡️ Validasi & Error Handling</h4>
                    <p>Menggunakan <code>int.TryParse</code> dan <code>double.TryParse</code> untuk menjamin input tidak menyebabkan crash, serta validasi rentang IPK 0.00 – 4.00.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Penjelasan Detail Kode Per Bagian -->
            <h2>2. Penjelasan Logika & Struktur Kode</h2>

            <h3>A. Model Class <code>Mahasiswa</code></h3>
            <p>
                Class ini merepresentasikan satu entitas data mahasiswa. Memiliki 4 atribut utama (NIM, Nama, Program Studi, dan IPK) yang menggunakan <em>Auto-Implemented Properties</em>, serta satu constructor untuk inisialisasi objek:
            </p>
            <ul>
                <li><code>public string NIM { get; set; }</code> : Menyimpan Nomor Induk Mahasiswa.</li>
                <li><code>public string Nama { get; set; }</code> : Menyimpan nama lengkap mahasiswa.</li>
                <li><code>public string Prodi { get; set; }</code> : Menyimpan jurusan/program studi.</li>
                <li><code>public double IPK { get; set; }</code> : Menyimpan nilai IPK dalam format desimal.</li>
            </ul>

            <h3>B. Alur Utama <code>Main()</code></h3>
            <p>
                Menggunakan perulangan <code>do-while</code> yang terus berjalan selama pengguna tidak memilih menu <code>5 (Keluar)</code>. Setiap putaran menampilkan menu, membaca input, mem-parsing angka dengan aman menggunakan <code>int.TryParse</code>, lalu menjalankan fungsi terkait via percabangan <code>switch-case</code>.
            </p>

            <h3>C. Pewarnaan Terminal (ConsoleColor)</h3>
            <p>
                Sesuai dengan contoh visual pada materi kuliah, teks antarmuka diberi gaya warna agar mudah dibaca:
            </p>
            <ul>
                <li><strong>Header & Garis Pembatas:</strong> Warna <code>ConsoleColor.Cyan</code></li>
                <li><strong>Badge Nomor Menu:</strong> Background kontras (Hijau untuk Tambah, Cyan untuk Tampil, Kuning untuk Cari, Merah untuk Hapus, Abu-abu untuk Keluar)</li>
                <li><strong>Notifikasi Sukses:</strong> Warna <code>ConsoleColor.Green</code></li>
                <li><strong>Pesan Error / Validasi Salah:</strong> Warna <code>ConsoleColor.Red</code></li>
            </ul>

            <h3>D. Method CRUD</h3>
            <ul>
                <li><strong><code>TambahMahasiswa()</code> (Create)</strong>: Mengambil input data dari pengguna. Terdapat perulangan <code>while (true)</code> khusus untuk IPK guna memastikan nilai yang dimasukkan bertipe angka desimal dan berada di rentang 0.0 s.d. 4.0. Setelah valid, objek baru dibuat dan dimasukkan ke list via <code>daftarMahasiswa.Add()</code>.</li>
                <li><strong><code>TampilkanMahasiswa()</code> (Read)</strong>: Memeriksa apakah list kosong. Jika ada data, dicetak dalam format tabel rapi menggunakan placeholder formatting string <code>"{0,-12} {1,-20} {2,-20} {3,5:F2}"</code> dengan 2 angka di belakang koma untuk IPK. Nilai IPK &ge; 3.5 diberi highlight warna hijau.</li>
                <li><strong><code>CariMahasiswa()</code> (Search)</strong>: Mengiterasi list mahasiswa untuk mencocokkan NIM yang dicari dengan <code>StringComparison.OrdinalIgnoreCase</code>. Jika ditemukan, detail mahasiswa akan dicetak ke layar.</li>
                <li><strong><code>HapusMahasiswa()</code> (Delete)</strong>: Mencari mahasiswa berdasarkan NIM. Jika ditemukan, data langsung dihapus dari memory menggunakan method <code>daftarMahasiswa.Remove(mahasiswaDitemukan)</code>.</li>
            </ul>

            <hr>

            <!-- 3. Cara Menjalankan Program -->
            <h2>3. Cara Menjalankan Program (CLI)</h2>
            <p>Program ini dapat dijalankan langsung di terminal menggunakan perintah .NET SDK berikut:</p>

            <div class="terminal-box">
                <span class="prompt"># 1. Buka Terminal / PowerShell dan arahkan ke folder demo:</span><br>
                cd pbkk/pertemuan2/demo<br><br>
                <span class="prompt"># 2. Jalankan aplikasi menggunakan .NET CLI:</span><br>
                dotnet run
            </div>

            <p>Program akan otomatis mengompilasi dan menampilkan antarmuka menu berwarna di layar terminal Anda.</p>

            <hr>

            <!-- 4. Source Code Lengkap -->
            <h2>4. Source Code Lengkap (Program.cs)</h2>
            <p>Berikut adalah source code lengkap aplikasi yang sudah dilengkapi pewarnaan dan siap dijalankan:</p>

            <div class="code-block-container">
                <button onclick="copyCode(this, 'code1')">Copy Code</button>
                <pre><code id="code1">using System;
using System.Collections.Generic;
using System.Text;

namespace DataMahasiswa
{
    // Class untuk merepresentasikan data mahasiswa
    class Mahasiswa
    {
        public string NIM { get; set; }
        public string Nama { get; set; }
        public string Prodi { get; set; }
        public double IPK { get; set; }

        // Constructor
        public Mahasiswa(string nim, string nama, string prodi, double ipk)
        {
            NIM = nim;
            Nama = nama;
            Prodi = prodi;
            IPK = ipk;
        }
    }

    class Program
    {
        // List untuk menyimpan data mahasiswa
        static List&lt;Mahasiswa&gt; daftarMahasiswa = new List&lt;Mahasiswa&gt;();

        static void Main(string[] args)
        {
            // Atur encoding agar mendukung karakter ikon/emoji dan judul window
            Console.OutputEncoding = Encoding.UTF8;
            try { Console.Title = "DataMahasiswa"; } catch { }

            int pilihan;

            do
            {
                TampilkanMenu();

                string input = Console.ReadLine();

                if (!int.TryParse(input, out pilihan))
                {
                    pilihan = 0;
                }

                Console.WriteLine();

                switch (pilihan)
                {
                    case 1:
                        TambahMahasiswa();
                        break;

                    case 2:
                        TampilkanMahasiswa();
                        break;

                    case 3:
                        CariMahasiswa();
                        break;

                    case 4:
                        HapusMahasiswa();
                        break;

                    case 5:
                        Console.ForegroundColor = ConsoleColor.Green;
                        Console.WriteLine("Terima kasih telah menggunakan program.");
                        Console.ResetColor();
                        break;

                    default:
                        Console.ForegroundColor = ConsoleColor.Red;
                        Console.WriteLine("Pilihan tidak tersedia!");
                        Console.ResetColor();
                        break;
                }

                if (pilihan != 5)
                {
                    Console.WriteLine();
                    Console.ForegroundColor = ConsoleColor.DarkGray;
                    Console.WriteLine("Tekan ENTER untuk melanjutkan...");
                    Console.ResetColor();
                    Console.ReadLine();
                }

            } while (pilihan != 5);
        }

        // ==========================================
        // METHOD MENAMPILKAN MENU
        // ==========================================
        static void TampilkanMenu()
        {
            try { Console.Clear(); } catch { }

            // Header Banner
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ForegroundColor = ConsoleColor.White;
            Console.Write("   🎓  ");
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("SISTEM DATA MAHASISWA");
            Console.ForegroundColor = ConsoleColor.DarkGray;
            Console.WriteLine("       KELOLA DATA MAHASISWA DENGAN MUDAH");
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ResetColor();
            Console.WriteLine();

            // Menu 1: Tambah Mahasiswa (Hijau)
            Console.BackgroundColor = ConsoleColor.DarkGreen;
            Console.ForegroundColor = ConsoleColor.White;
            Console.Write(" 1 ");
            Console.ResetColor();
            Console.ForegroundColor = ConsoleColor.White;
            Console.WriteLine("  👤 Tambah Mahasiswa");

            // Menu 2: Tampilkan Mahasiswa (Cyan)
            Console.BackgroundColor = ConsoleColor.DarkCyan;
            Console.ForegroundColor = ConsoleColor.White;
            Console.Write(" 2 ");
            Console.ResetColor();
            Console.ForegroundColor = ConsoleColor.White;
            Console.WriteLine("  📋 Tampilkan Mahasiswa");

            // Menu 3: Cari Mahasiswa (Kuning)
            Console.BackgroundColor = ConsoleColor.DarkYellow;
            Console.ForegroundColor = ConsoleColor.Black;
            Console.Write(" 3 ");
            Console.ResetColor();
            Console.ForegroundColor = ConsoleColor.White;
            Console.WriteLine("  🔍 Cari Mahasiswa");

            // Menu 4: Hapus Mahasiswa (Merah)
            Console.BackgroundColor = ConsoleColor.DarkRed;
            Console.ForegroundColor = ConsoleColor.White;
            Console.Write(" 4 ");
            Console.ResetColor();
            Console.ForegroundColor = ConsoleColor.White;
            Console.WriteLine("  🗑️  Hapus Mahasiswa");

            // Menu 5: Keluar (Abu-abu)
            Console.BackgroundColor = ConsoleColor.DarkGray;
            Console.ForegroundColor = ConsoleColor.White;
            Console.Write(" 5 ");
            Console.ResetColor();
            Console.ForegroundColor = ConsoleColor.White;
            Console.WriteLine("  🚪 Keluar");

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ResetColor();

            Console.ForegroundColor = ConsoleColor.Yellow;
            Console.Write("Pilihan: ");
            Console.ResetColor();
        }

        // ==========================================
        // METHOD TAMBAH MAHASISWA
        // ==========================================
        static void TambahMahasiswa()
        {
            try { Console.Clear(); } catch { }

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ForegroundColor = ConsoleColor.Yellow;
            Console.WriteLine("                 TAMBAH MAHASISWA                     ");
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ResetColor();

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.Write("NIM           : ");
            Console.ResetColor();
            string nim = Console.ReadLine();

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.Write("Nama          : ");
            Console.ResetColor();
            string nama = Console.ReadLine();

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.Write("Program Studi : ");
            Console.ResetColor();
            string prodi = Console.ReadLine();

            double ipk;

            while (true)
            {
                Console.ForegroundColor = ConsoleColor.Cyan;
                Console.Write("IPK (0 - 4)   : ");
                Console.ResetColor();

                if (double.TryParse(Console.ReadLine(), out ipk))
                {
                    if (ipk >= 0 && ipk <= 4)
                    {
                        break;
                    }
                }

                Console.ForegroundColor = ConsoleColor.Red;
                Console.WriteLine("⚠️  IPK harus berupa angka 0 - 4.");
                Console.ResetColor();
            }

            Mahasiswa mahasiswa = new Mahasiswa(nim, nama, prodi, ipk);
            daftarMahasiswa.Add(mahasiswa);

            Console.WriteLine();
            Console.ForegroundColor = ConsoleColor.Green;
            Console.WriteLine("✅ Data mahasiswa berhasil ditambahkan.");
            Console.ResetColor();
        }

        // ==========================================
        // METHOD MENAMPILKAN DATA
        // ==========================================
        static void TampilkanMahasiswa()
        {
            try { Console.Clear(); } catch { }

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("==========================================================");
            Console.ForegroundColor = ConsoleColor.Yellow;
            Console.WriteLine("                     DAFTAR MAHASISWA                     ");
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("==========================================================");
            Console.ResetColor();

            if (daftarMahasiswa.Count == 0)
            {
                Console.ForegroundColor = ConsoleColor.DarkYellow;
                Console.WriteLine("ℹ️  Belum ada data mahasiswa.");
                Console.ResetColor();
                return;
            }

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("{0,-12} {1,-20} {2,-20} {3,5}", "NIM", "Nama", "Prodi", "IPK");
            Console.ForegroundColor = ConsoleColor.DarkGray;
            Console.WriteLine("----------------------------------------------------------");
            Console.ResetColor();

            foreach (Mahasiswa m in daftarMahasiswa)
            {
                Console.ForegroundColor = ConsoleColor.White;
                Console.Write("{0,-12} {1,-20} {2,-20} ", m.NIM, m.Nama, m.Prodi);
                
                // Beri warna khusus untuk IPK
                if (m.IPK &gt;= 3.5)
                    Console.ForegroundColor = ConsoleColor.Green;
                else if (m.IPK &gt;= 3.0)
                    Console.ForegroundColor = ConsoleColor.Yellow;
                else
                    Console.ForegroundColor = ConsoleColor.Red;

                Console.WriteLine("{0,5:F2}", m.IPK);
                Console.ResetColor();
            }

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("==========================================================");
            Console.ForegroundColor = ConsoleColor.DarkGray;
            Console.WriteLine($"Total: {daftarMahasiswa.Count} mahasiswa terdaftar.");
            Console.ResetColor();
        }

        // ==========================================
        // METHOD MENCARI MAHASISWA
        // ==========================================
        static void CariMahasiswa()
        {
            try { Console.Clear(); } catch { }

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ForegroundColor = ConsoleColor.Yellow;
            Console.WriteLine("                   CARI MAHASISWA                     ");
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ResetColor();

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.Write("Masukkan NIM : ");
            Console.ResetColor();
            string nimCari = Console.ReadLine();

            Mahasiswa mahasiswaDitemukan = null;

            foreach (Mahasiswa m in daftarMahasiswa)
            {
                if (m.NIM.Equals(nimCari, StringComparison.OrdinalIgnoreCase))
                {
                    mahasiswaDitemukan = m;
                    break;
                }
            }

            Console.WriteLine();

            if (mahasiswaDitemukan != null)
            {
                Console.ForegroundColor = ConsoleColor.Green;
                Console.WriteLine("✅ Data ditemukan!");
                Console.ResetColor();
                Console.WriteLine("------------------------------------------------------");
                Console.ForegroundColor = ConsoleColor.Cyan;
                Console.Write("NIM   : "); Console.ForegroundColor = ConsoleColor.White; Console.WriteLine(mahasiswaDitemukan.NIM);
                Console.ForegroundColor = ConsoleColor.Cyan;
                Console.Write("Nama  : "); Console.ForegroundColor = ConsoleColor.White; Console.WriteLine(mahasiswaDitemukan.Nama);
                Console.ForegroundColor = ConsoleColor.Cyan;
                Console.Write("Prodi : "); Console.ForegroundColor = ConsoleColor.White; Console.WriteLine(mahasiswaDitemukan.Prodi);
                Console.ForegroundColor = ConsoleColor.Cyan;
                Console.Write("IPK   : ");
                if (mahasiswaDitemukan.IPK &gt;= 3.5) Console.ForegroundColor = ConsoleColor.Green;
                else if (mahasiswaDitemukan.IPK &gt;= 3.0) Console.ForegroundColor = ConsoleColor.Yellow;
                else Console.ForegroundColor = ConsoleColor.Red;
                Console.WriteLine(mahasiswaDitemukan.IPK.ToString("F2"));
                Console.ResetColor();
                Console.WriteLine("------------------------------------------------------");
            }
            else
            {
                Console.ForegroundColor = ConsoleColor.Red;
                Console.WriteLine("❌ Mahasiswa dengan NIM tersebut tidak ditemukan.");
                Console.ResetColor();
            }
        }

        // ==========================================
        // METHOD MENGHAPUS MAHASISWA
        // ==========================================
        static void HapusMahasiswa()
        {
            try { Console.Clear(); } catch { }

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ForegroundColor = ConsoleColor.Yellow;
            Console.WriteLine("                  HAPUS MAHASISWA                     ");
            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.WriteLine("======================================================");
            Console.ResetColor();

            Console.ForegroundColor = ConsoleColor.Cyan;
            Console.Write("Masukkan NIM : ");
            Console.ResetColor();
            string nimHapus = Console.ReadLine();

            Mahasiswa mahasiswaDitemukan = null;

            foreach (Mahasiswa m in daftarMahasiswa)
            {
                if (m.NIM.Equals(nimHapus, StringComparison.OrdinalIgnoreCase))
                {
                    mahasiswaDitemukan = m;
                    break;
                }
            }

            if (mahasiswaDitemukan != null)
            {
                daftarMahasiswa.Remove(mahasiswaDitemukan);
                Console.WriteLine();
                Console.ForegroundColor = ConsoleColor.Green;
                Console.WriteLine($"✅ Mahasiswa dengan NIM '{nimHapus}' berhasil dihapus.");
                Console.ResetColor();
            }
            else
            {
                Console.WriteLine();
                Console.ForegroundColor = ConsoleColor.Red;
                Console.WriteLine("❌ Data mahasiswa tidak ditemukan.");
                Console.ResetColor();
            }
        }
    }
}</code></pre>
            </div>

            <hr>

            <!-- 5. Bagian Screenshot Eksekusi Program -->
            <h2>5. Hasil Tangkapan Layar Eksekusi (Screenshot)</h2>
            <p>Berikut adalah hasil pengujian program di terminal. Klik pada gambar untuk memperbesar tampilan:</p>

            <div id="screenshot-container">
                <div class="screenshot-placeholder-box">
                    <p>📸 <em>Slot Tangkapan Layar Demo:</em> Jalankan program dengan <code>dotnet run</code> di terminal, ambil screenshot hasil uji coba yang sudah berwarna, lalu simpan file gambar di folder <code>img/</code> (misalnya <code>img/pbkk-m2-demo.png</code>) dan tautkan pada tag <code>&lt;img&gt;</code> di bawah ini.</p>
                </div>

                <!-- Template gambar dengan modal popup zoom (sama seperti tugas lainnya) -->
                <!-- 
                <img src="../../img/pbkk-m2-demo1.png" alt="Menu Utama Berwarna" onclick="openModal(this)">
                <p class="caption">Gambar 1: Tampilan menu utama sistem data mahasiswa berwarna.</p>

                <img src="../../img/pbkk-m2-demo2.png" alt="Daftar Mahasiswa Berwarna" onclick="openModal(this)">
                <p class="caption">Gambar 2: Tampilan daftar tabel mahasiswa dengan highlight warna IPK.</p>
                -->
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 2 &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
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
