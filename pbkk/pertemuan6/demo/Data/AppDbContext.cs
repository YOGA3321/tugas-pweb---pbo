using System;
using System.IO;
using Microsoft.EntityFrameworkCore;
using StudentManagementDB.Models;

namespace StudentManagementDB.Data;

/// <summary>
/// Entity Framework Core DbContext untuk koneksi database SQLite.
/// </summary>
public class AppDbContext : DbContext
{
    private readonly string _dbPath;

    public static string DefaultDbPath => Path.Combine(AppContext.BaseDirectory, "students.db");

    public DbSet<Student> Students => Set<Student>();

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

        modelBuilder.Entity<Student>(entity =>
        {
            entity.ToTable("Students");
            entity.HasIndex(s => s.NIM).IsUnique();
        });
    }
}
