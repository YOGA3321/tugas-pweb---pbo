# SkillForge - Student Portfolio & Internship Readiness System

> **Tugas Evaluasi Tengah Semester (ETS) - Pemrograman Berbasis Kerangka Kerja (PBKK)**  
> **Kelompok 10**  
> - **Farrel Prastita Ramadhan** (NRP: 5025241219)  
> - **Ageng Prayogo** (NRP: 5025241225)  
> Departemen Teknik Informatika - Institut Teknologi Sepuluh Nopember (ITS)

---

## 🌟 Tentang Aplikasi
**SkillForge** adalah aplikasi desktop modern berbasis **.NET 8 WPF (Windows Presentation Foundation)** yang dirancang untuk membantu mahasiswa mengarsipkan portofolio proyek mata kuliah/mandiri, menganalisis kecocokan kompetensi (*job-readiness assessment*) terhadap lowongan magang mitra industri, serta memantau perjalanan aplikasi magang (*application pipeline kanban*).

### Fitur Utama:
1. **Dashboard Analitik**: 4 KPI metrik portofolio, rekomendasi magang prioritas, dan tabel karya terbaru.
2. **Katalog & Manajemen Portofolio**: CRUD portofolio proyek terhubung ke Microsoft SQL Server, relasi N-to-M ke teknologi/skill, filter pencarian real-time, dan ekspor portofolio ke format Markdown (.md).
3. **Mesin Asesmen Kesiapan Magang (*Readiness Engine*)**: Kalkulasi skor persentase kesiapan berdasarkan bobot skill yang dipersyaratkan oleh lowongan industri vs bukti riil portofolio mahasiswa.
4. **Pelacak Lamaran (*Pipeline Kanban*)**: 4 tahapan alur seleksi (*Wishlist*, *Terkirim*, *Wawancara*, *Diterima*).
5. **Modern Shadcn Zinc Theme**: Tampilan minimalis berstandar industri dengan 100% ikon vektor Path Geometri (Lucide-inspired) tanpa emoji, serta dukungan penuh **Mode Gelap (Dark Mode)** dan **Mode Terang (Light Mode)** beresolusi tinggi.

---

## 🛠️ Tech Stack & Arsitektur
- **Platform**: .NET 8 Desktop (
et8.0-windows)
- **UI Framework**: Windows Presentation Foundation (WPF) dengan XAML Vector Geometries
- **Pattern**: Model-View-ViewModel (MVVM) menggunakan CommunityToolkit.Mvvm
- **Database**: Microsoft SQL Server LocalDB / Express (Microsoft.Data.SqlClient)
- **Visualisasi Data**: LiveChartsCore.SkiaSharpView.WPF

---

## 🚀 Panduan Menjalankan Aplikasi

### Prasyarat:
1. **.NET 8 SDK / .NET Desktop Runtime 8.0 (x64)** (dapat dicek dengan dotnet --info).
2. **Microsoft SQL Server LocalDB** (bawaan Visual Studio atau SQL Server Express).

### Langkah 1: Setup Basis Data
Jalankan file skrip database_setup.sql yang berada di folder ini ke SQL Server LocalDB Anda:
`powershell
# Jalankan skrip DDL & seed data ke instance (localdb)\MSSQLLocalDB
sqlcmd -S (localdb)\MSSQLLocalDB -i database_setup.sql
`
*(Atau buka file database_setup.sql di Visual Studio / SSMS lalu klik **Execute**).*

### Langkah 2: Menjalankan Aplikasi
Buka terminal di folder SkillForge dan jalankan perintah:
`powershell
dotnet run --project SkillForge\SkillForge.csproj
`
*(Atau buka file solusi SkillForge.slnx di Visual Studio 2022/2026 dan tekan **Ctrl + F5**).*

---

## 🎨 Poster Infografis (1 Halaman)
Poster infografis resmi proyek SkillForge (ETS PBKK) dapat dilihat pada berkas:
- **Infografis-SkillForge.png** (Tersedia di root direktori ETS dan direktori demo ini).
