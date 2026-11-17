using System;

namespace StudentManagementMVVM.Models;

/// <summary>
/// Model entitas data mahasiswa untuk pola arsitektur MVVM.
/// </summary>
public class Student
{
    public string NIM { get; set; } = string.Empty;
    public string Nama { get; set; } = string.Empty;
    public string Prodi { get; set; } = string.Empty;
    public string Gender { get; set; } = string.Empty;
    public DateTime? TanggalLahir { get; set; }
    public string Alamat { get; set; } = string.Empty;
    public string NoTelepon { get; set; } = string.Empty;

    public string TanggalLahirDisplay =>
        TanggalLahir.HasValue ? TanggalLahir.Value.ToString("dd/MM/yyyy") : "-";
}
