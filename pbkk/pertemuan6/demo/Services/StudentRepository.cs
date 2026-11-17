using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using StudentManagementDB.Data;
using StudentManagementDB.Models;

namespace StudentManagementDB.Services;

/// <summary>
/// Implementasi Repository Pattern dengan Entity Framework Core (SQLite).
/// </summary>
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

    private AppDbContext CreateContext() => new(DatabasePath);

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

    public async Task<List<Student>> GetAllAsync(string? searchQuery = null, string? prodiFilter = null)
    {
        await using var db = CreateContext();
        IQueryable<Student> query = db.Students.AsNoTracking();

        if (!string.IsNullOrWhiteSpace(prodiFilter) && prodiFilter != "Semua Prodi")
        {
            query = query.Where(s => s.Prodi == prodiFilter);
        }

        if (!string.IsNullOrWhiteSpace(searchQuery))
        {
            string keyword = searchQuery.Trim().ToLower();
            query = query.Where(s =>
                s.NIM.ToLower().Contains(keyword) ||
                s.Nama.ToLower().Contains(keyword) ||
                s.Prodi.ToLower().Contains(keyword) ||
                s.Alamat.ToLower().Contains(keyword));
        }

        return await query.OrderBy(s => s.Id).ToListAsync();
    }

    public async Task<Student> AddAsync(Student student)
    {
        await using var db = CreateContext();

        bool exists = await db.Students.AnyAsync(s => s.NIM.ToLower() == student.NIM.ToLower());
        if (exists)
        {
            throw new InvalidOperationException($"NIM '{student.NIM}' sudah terdaftar di database!");
        }

        student.CreatedAt = DateTime.Now;
        db.Students.Add(student);
        await db.SaveChangesAsync();
        return student;
    }

    public async Task<Student> UpdateAsync(Student student)
    {
        await using var db = CreateContext();

        var existing = await db.Students.FindAsync(student.Id)
            ?? throw new InvalidOperationException("Data mahasiswa tidak ditemukan di database.");

        bool nimConflict = await db.Students.AnyAsync(s =>
            s.Id != student.Id && s.NIM.ToLower() == student.NIM.ToLower());

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

    public async Task<StudentStatistics> GetStatisticsAsync()
    {
        await using var db = CreateContext();
        var list = await db.Students.AsNoTracking().ToListAsync();

        return new StudentStatistics(
            TotalStudents: list.Count,
            TotalInformatika: list.Count(s => s.Prodi == "Teknik Informatika"),
            TotalSistemInformasi: list.Count(s => s.Prodi == "Sistem Informasi"),
            TotalLakiLaki: list.Count(s => s.Gender == "Laki-laki"),
            TotalPerempuan: list.Count(s => s.Gender == "Perempuan")
        );
    }
}
