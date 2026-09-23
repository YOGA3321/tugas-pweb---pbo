using System;
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
        static List<Mahasiswa> daftarMahasiswa = new List<Mahasiswa>();

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
                if (m.IPK >= 3.5)
                    Console.ForegroundColor = ConsoleColor.Green;
                else if (m.IPK >= 3.0)
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
                if (mahasiswaDitemukan.IPK >= 3.5) Console.ForegroundColor = ConsoleColor.Green;
                else if (mahasiswaDitemukan.IPK >= 3.0) Console.ForegroundColor = ConsoleColor.Yellow;
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
}
