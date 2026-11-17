using System;
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
    public ObservableCollection<Student> Students { get; } = new();

    // Koleksi hasil filter/pencarian yang di-bind ke DataGrid
    public ObservableCollection<Student> FilteredStudents { get; } = new();

    public IReadOnlyList<string> ProdiOptions { get; } =
    [
        "Teknik Informatika",
        "Sistem Informasi",
        "Teknologi Informasi",
        "Manajemen",
        "Akuntansi"
    ];

    public IReadOnlyList<string> FilterProdiOptions { get; } =
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
    // SELEKSI, MODE EDIT & FILTER PENCARIAN
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
    // STATUS NOTIFIKASI & KONFIRMASI HAPUS (PURE MVVM)
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

    public bool HasSelectedStudent => SelectedStudent is not null;
    public bool HasStatusMessage => !string.IsNullOrWhiteSpace(StatusMessage);

    public string FormTitle => IsEditMode ? "EDIT DATA MAHASISWA" : "REGISTRASI MAHASISWA";
    public string SubmitButtonText => IsEditMode ? "Update Data" : "Simpan Data";

    public string StatusBackground => IsErrorStatus ? "#FEF2F2" : "#ECFDF5";
    public string StatusBorderBrush => IsErrorStatus ? "#FCA5A5" : "#6EE7B7";
    public string StatusForeground => IsErrorStatus ? "#B91C1C" : "#047857";

    // ========================================================
    // STATISTIK REAL-TIME BERBASIS LINQ
    // ========================================================
    public int TotalStudents => Students.Count;
    public int TotalInformatika => Students.Count(s => s.Prodi == "Teknik Informatika");
    public int TotalSistemInformasi => Students.Count(s => s.Prodi == "Sistem Informasi");
    public int TotalLakiLaki => Students.Count(s => s.Gender == "Laki-laki");
    public int TotalPerempuan => Students.Count(s => s.Gender == "Perempuan");
    public int FilteredCount => FilteredStudents.Count;

    public MainViewModel()
    {
        SeedInitialData();
        ApplyFilter();
        RefreshStatistics();
    }

    partial void OnSearchQueryChanged(string value) => ApplyFilter();
    partial void OnSelectedFilterProdiChanged(string value) => ApplyFilter();

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

        if (!IsLakiLaki && !IsPerempuan)
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

        if (IsEditMode && _editingOriginalNim is not null)
        {
            bool nimConflict = Students.Any(s =>
                !s.NIM.Equals(_editingOriginalNim, StringComparison.OrdinalIgnoreCase) &&
                s.NIM.Equals(nimTrim, StringComparison.OrdinalIgnoreCase));

            if (nimConflict)
            {
                SetStatus($"NIM '{nimTrim}' sudah digunakan oleh mahasiswa lain!", isError: true);
                return;
            }

            Student? target = Students.FirstOrDefault(s =>
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

        if (Students.Any(s => s.NIM.Equals(nimTrim, StringComparison.OrdinalIgnoreCase)))
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

        if (IsEditMode && deletedNim.Equals(_editingOriginalNim, StringComparison.OrdinalIgnoreCase))
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

        var results = Students.Where(s =>
        {
            bool matchProdi = string.IsNullOrEmpty(prodiFilter) ||
                              prodiFilter == "Semua Prodi" ||
                              s.Prodi.Equals(prodiFilter, StringComparison.OrdinalIgnoreCase);

            bool matchKeyword = string.IsNullOrEmpty(keyword) ||
                                s.NIM.Contains(keyword, StringComparison.OrdinalIgnoreCase) ||
                                s.Nama.Contains(keyword, StringComparison.OrdinalIgnoreCase) ||
                                s.Prodi.Contains(keyword, StringComparison.OrdinalIgnoreCase) ||
                                s.Alamat.Contains(keyword, StringComparison.OrdinalIgnoreCase);

            return matchProdi && matchKeyword;
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
}
