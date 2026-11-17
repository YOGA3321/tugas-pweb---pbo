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
    Task<List<Student>> GetAllAsync(string? searchQuery = null, string? prodiFilter = null);
    Task<Student> AddAsync(Student student);
    Task<Student> UpdateAsync(Student student);
    Task DeleteAsync(int id);
    Task<StudentStatistics> GetStatisticsAsync();
}
