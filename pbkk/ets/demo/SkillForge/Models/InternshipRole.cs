using System.Collections.Generic;

namespace SkillForge.Models
{
    public class RoleRequirementItem
    {
        public int SkillId { get; set; }
        public string SkillName { get; set; } = string.Empty;
        public double ImportanceLevel { get; set; } // 3.0: Wajib, 2.0: Disarankan, 1.0: Opsional
        public bool IsFulfilled { get; set; }
    }

    public class InternshipRole
    {
        public int RoleId { get; set; }
        public string RoleTitle { get; set; } = string.Empty;
        public string CompanyName { get; set; } = "Perusahaan Mitra";
        public string Location { get; set; } = "Surabaya (Hybrid)";
        public string JobType { get; set; } = "Magang 6 Bulan";
        public string? Description { get; set; }
        public int MinProjectCount { get; set; }
        public List<RoleRequirementItem> Requirements { get; set; } = new();

        // Properti untuk kemudahan tampilan di ComboBox/List
        public string DisplayFull => $"{RoleTitle} - {CompanyName} ({Location})";
    }
}