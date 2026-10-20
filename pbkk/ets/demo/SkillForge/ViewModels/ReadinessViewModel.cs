using System.Collections.ObjectModel;
using CommunityToolkit.Mvvm.ComponentModel;
using CommunityToolkit.Mvvm.Input;
using SkillForge.Models;

namespace SkillForge.ViewModels
{
    public class SkillRequirementUiModel
    {
        public string SkillName { get; set; } = string.Empty;
        public string RequirementType { get; set; } = "Syarat Wajib";
        public string StatusLabel { get; set; } = "Terpenuhi di Proyek";
        public string StatusBrush { get; set; } = "#10B981";
        public string BadgeBackground { get; set; } = "#D1FAE5";
    }

    public partial class ReadinessViewModel : ObservableObject
    {
        [ObservableProperty]
        private double _calculatedScore = 75.0;

        [ObservableProperty]
        private string _statusText = "Siap Melamar (Job Ready)";

        [ObservableProperty]
        private string _statusColor = "#10B981";

        [ObservableProperty]
        private InternshipRole? _selectedRole;

        public ObservableCollection<InternshipRole> AvailableRoles { get; } = new();
        public ObservableCollection<SkillRequirementUiModel> RoleSkills { get; } = new();

        public ReadinessViewModel()
        {
            // Seed katalog lowongan magang
            AvailableRoles.Add(new InternshipRole
            {
                RoleId = 1,
                RoleTitle = ".NET Desktop Software Engineer Intern",
                CompanyName = "PT Inovasi Teknologi Nusantara",
                Location = "Surabaya (Hybrid)"
            });

            AvailableRoles.Add(new InternshipRole
            {
                RoleId = 2,
                RoleTitle = "Full-Stack Developer Intern",
                CompanyName = "Global Digital Solusindo",
                Location = "Jakarta / Remote"
            });

            SelectedRole = AvailableRoles[0];
            LoadSkillsForSelectedRole();
        }

        [RelayCommand]
        private void CheckReadiness()
        {
            // Menghitung ulang kecocokan berdasarkan peran yang dipilih
            LoadSkillsForSelectedRole();
        }

        private void LoadSkillsForSelectedRole()
        {
            RoleSkills.Clear();

            if (SelectedRole?.RoleId == 1)
            {
                CalculatedScore = 80.0;
                StatusText = "Siap Melamar (Job Ready)";
                StatusColor = "#10B981";

                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "C# / .NET", RequirementType = "Syarat Wajib (Bobot 3.0)", StatusLabel = "Terbukti di Proyek", StatusBrush = "#10B981", BadgeBackground = "#D1FAE5" });
                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "WPF / XAML", RequirementType = "Syarat Wajib (Bobot 3.0)", StatusLabel = "Terbukti di Proyek", StatusBrush = "#10B981", BadgeBackground = "#D1FAE5" });
                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "SQL Server", RequirementType = "Syarat Wajib (Bobot 3.0)", StatusLabel = "Terbukti di Proyek", StatusBrush = "#10B981", BadgeBackground = "#D1FAE5" });
                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "Docker", RequirementType = "Syarat Opsional (Bobot 1.0)", StatusLabel = "Belum Ada Bukti", StatusBrush = "#EF4444", BadgeBackground = "#FEE2E2" });
            }
            else
            {
                CalculatedScore = 50.0;
                StatusText = "Perlu Penguatan Proyek";
                StatusColor = "#F59E0B";

                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "ASP.NET Core Web API", RequirementType = "Syarat Wajib (Bobot 3.0)", StatusLabel = "Terbukti di Proyek", StatusBrush = "#10B981", BadgeBackground = "#D1FAE5" });
                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "React.js", RequirementType = "Syarat Wajib (Bobot 3.0)", StatusLabel = "Belum Ada Bukti", StatusBrush = "#EF4444", BadgeBackground = "#FEE2E2" });
                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "SQL Server", RequirementType = "Syarat Wajib (Bobot 3.0)", StatusLabel = "Terbukti di Proyek", StatusBrush = "#10B981", BadgeBackground = "#D1FAE5" });
                RoleSkills.Add(new SkillRequirementUiModel { SkillName = "Docker", RequirementType = "Syarat Disarankan (Bobot 2.0)", StatusLabel = "Belum Ada Bukti", StatusBrush = "#EF4444", BadgeBackground = "#FEE2E2" });
            }
        }
    }
}