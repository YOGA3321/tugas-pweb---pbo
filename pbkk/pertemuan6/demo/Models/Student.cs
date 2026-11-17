using System;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace StudentManagementDB.Models;

/// <summary>
/// Entitas Student yang dipetakan ke tabel Students pada database SQLite via EF Core.
/// </summary>
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
    public string TanggalLahirDisplay =>
        TanggalLahir.HasValue ? TanggalLahir.Value.ToString("dd/MM/yyyy") : "-";

    [NotMapped]
    public string CreatedAtDisplay => CreatedAt.ToString("dd/MM/yyyy HH:mm");
}
