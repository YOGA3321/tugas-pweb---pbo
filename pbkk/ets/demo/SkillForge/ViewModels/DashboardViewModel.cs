using System.Collections.ObjectModel;
using System.Threading.Tasks;
using CommunityToolkit.Mvvm.ComponentModel;
using SkillForge.Models;
using SkillForge.Repositories;

namespace SkillForge.ViewModels
{
    public partial class DashboardViewModel : ObservableObject
    {
        private readonly ProjectRepository _projectRepo = new();

        [ObservableProperty]
        private int _totalProjects;

        [ObservableProperty]
        private int _totalSkills = 5;

        [ObservableProperty]
        private double _topReadinessScore = 66.7;

        public ObservableCollection<Project> RecentProjects { get; } = new();

        public DashboardViewModel()
        {
            _ = LoadDataAsync();
        }

        public async Task LoadDataAsync()
        {
            var list = await _projectRepo.GetAllProjectsAsync();
            RecentProjects.Clear();
            foreach (var item in list)
            {
                RecentProjects.Add(item);
            }
            TotalProjects = RecentProjects.Count;
        }
    }
}