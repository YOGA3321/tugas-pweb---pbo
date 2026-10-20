using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using System.Windows;
using CommunityToolkit.Mvvm.ComponentModel;
using CommunityToolkit.Mvvm.Input;
using SkillForge.Models;
using SkillForge.Repositories;
using SkillForge.Views;

namespace SkillForge.ViewModels
{
    public partial class ProjectsViewModel : ObservableObject
    {
        private readonly ProjectRepository _repository = new();
        private readonly ObservableCollection<Project> _allProjects = new();

        [ObservableProperty]
        private string _searchText = string.Empty;

        public ObservableCollection<Project> FilteredProjects { get; } = new();

        public ProjectsViewModel()
        {
            _ = LoadProjectsAsync();
        }

        partial void OnSearchTextChanged(string value)
        {
            ApplyFilter();
        }

        public async Task LoadProjectsAsync()
        {
            try
            {
                var list = await _repository.GetAllProjectsAsync();
                _allProjects.Clear();
                foreach (var p in list)
                {
                    _allProjects.Add(p);
                }
                ApplyFilter();
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Gagal memuat portofolio: {ex.Message}", "Database Error", MessageBoxButton.OK, MessageBoxImage.Error);
            }
        }

        private void ApplyFilter()
        {
            FilteredProjects.Clear();
            var keyword = SearchText?.Trim().ToLower() ?? "";

            var matches = string.IsNullOrEmpty(keyword)
                ? _allProjects
                : _allProjects.Where(p => (p.Title?.ToLower().Contains(keyword) ?? false) ||
                                          (p.CourseName?.ToLower().Contains(keyword) ?? false));

            foreach (var item in matches)
            {
                FilteredProjects.Add(item);
            }
        }

        [RelayCommand]
        private async Task OpenAddProjectAsync()
        {
            var dialog = new AddProjectWindow
            {
                Owner = Application.Current.MainWindow
            };

            if (dialog.ShowDialog() == true && dialog.CreatedProject != null)
            {
                try
                {
                    // Gunakan new List<int> { 1, 2 } sesuai parameter ProjectRepository
                    await _repository.InsertProjectAsync(dialog.CreatedProject, new List<int> { 1, 2 });
                    await LoadProjectsAsync();
                    MessageBox.Show("Proyek baru berhasil disimpan ke database!", "Sukses", MessageBoxButton.OK, MessageBoxImage.Information);
                }
                catch (Exception ex)
                {
                    MessageBox.Show($"Gagal menyimpan ke database: {ex.Message}", "Database Error", MessageBoxButton.OK, MessageBoxImage.Error);
                }
            }
        }

        [RelayCommand]
        private void ExportPortfolio()
        {
            try
            {
                string desktopPath = Environment.GetFolderPath(Environment.SpecialFolder.Desktop);
                string filePath = Path.Combine(desktopPath, "SkillForge_Portofolio_Farrel.md");

                using var writer = new StreamWriter(filePath);
                writer.WriteLine("# Ringkasan Portofolio Mahasiswa - SkillForge");
                writer.WriteLine($"*Diekspor pada: {DateTime.Now:dd MMMM yyyy HH:mm}*\n");
                writer.WriteLine("---");
                writer.WriteLine("### Identitas:");
                writer.WriteLine("- **Nama**: Farrel Prastita Ramadhan");
                writer.WriteLine("- **NRP**: 5025241219");
                writer.WriteLine("- **Departemen**: Teknik Informatika - ITS\n");
                writer.WriteLine("### Daftar Karya Proyek Terverifikasi:\n");

                int no = 1;
                foreach (var p in _allProjects)
                {
                    writer.WriteLine($"{no++}. **{p.Title}**");
                    writer.WriteLine($"   - Mata Kuliah: {p.CourseName}");
                    writer.WriteLine($"   - Kompleksitas: {p.DifficultyDisplay}");
                    writer.WriteLine($"   - Repositori: [{p.RepoUrl}]({p.RepoUrl})");
                    writer.WriteLine();
                }

                MessageBox.Show($"Portofolio berhasil diekspor ke Desktop:\n{filePath}", "Ekspor Berhasil", MessageBoxButton.OK, MessageBoxImage.Information);
            }
            catch (Exception ex)
            {
                MessageBox.Show($"Gagal ekspor: {ex.Message}", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
            }
        }
    }
}