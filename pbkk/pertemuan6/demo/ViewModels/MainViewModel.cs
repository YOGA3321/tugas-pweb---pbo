using System;
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

    public ObservableCollection<Student> Students { get; } = new();

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
    public partial Student? SelectedStudent { get; set; }

    [ObservableProperty]
    [NotifyPropertyChangedFor(nameof(FormTitle))]
    [NotifyPropertyChangedFor(nameof(SubmitButtonText))]
    public partial bool IsEditMode { get; set; }

    private int? _editingStudentId;

    [ObservableProperty]
    public partial string SearchQuery { get; set; } = string.Empty;

    [ObservableProperty]
    public partial string SelectedFilterProdi { get; set; } = "Semua Prodi";

    // ========================================================
    // STATISTIK DATABASE REAL-TIME
    // ========================================================
    [ObservableProperty]
    public partial int TotalStudents { get; set; }

    [ObservableProperty]
    public partial int TotalInformatika { get; set; }

    [ObservableProperty]
    public partial int TotalSistemInformasi { get; set; }

    [ObservableProperty]
    public partial int TotalLakiLaki { get; set; }

    [ObservableProperty]
    public partial int TotalPerempuan { get; set; }

    [ObservableProperty]
    public partial int FilteredCount { get; set; }

    // ========================================================
    // STATUS DATABASE & KONFIRMASI HAPUS (PURE MVVM)
    // ========================================================
    [ObservableProperty]
    public partial string DbConnectionBadge { get; set; } = "Menghubungkan SQLite...";

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

    public bool HasStatusMessage => !string.IsNullOrWhiteSpace(StatusMessage);
    public string FormTitle => IsEditMode ? "EDIT DATA MAHASISWA (DB)" : "TAMBAH DATA KE DATABASE";
    public string SubmitButtonText => IsEditMode ? "Update ke DB" : "Simpan ke DB";

    public string StatusBackground => IsErrorStatus ? "#FEF2F2" : "#ECFDF5";
    public string StatusBorderBrush => IsErrorStatus ? "#FCA5A5" : "#6EE7B7";
    public string StatusForeground => IsErrorStatus ? "#B91C1C" : "#047857";

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

    // ========================================================
    // COMMAND: SIMPAN / UPDATE DATA KE DATABASE SQLITE
    // ========================================================
    [RelayCommand]
    private async Task SimpanDataAsync()
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

        try
        {
            if (IsEditMode && _editingStudentId.HasValue)
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
                SetStatus($"Perubahan data '{namaTrim}' ({nimTrim}) berhasil disimpan ke SQLite!", isError: false);
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
                SetStatus($"Mahasiswa baru '{namaTrim}' ({nimTrim}) berhasil disimpan ke database SQLite!", isError: false);
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

        SetStatus($"Mode edit DB aktif untuk ID #{SelectedStudent.Id} ({SelectedStudent.Nama}).", isError: false);
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

            if (IsEditMode && _editingStudentId == targetId)
            {
                ResetFormInternal();
            }

            SelectedStudent = null;
            IsDeleteConfirmVisible = false;
            await LoadFromDatabaseAsync();
            SetStatus($"Data '{targetName}' ({targetNim}) berhasil dihapus dari database SQLite.", isError: false);
        }
        catch (Exception ex)
        {
            IsDeleteConfirmVisible = false;
            SetStatus($"Gagal menghapus data: {ex.Message}", isError: true);
        }
    }

    [RelayCommand]
    private void BatalHapus()
    {
        IsDeleteConfirmVisible = false;
    }

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
}
