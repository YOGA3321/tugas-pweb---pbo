namespace SkillForge.Models
{
    public class Skill
    {
        public int SkillId { get; set; }
        public int CategoryId { get; set; }
        public string SkillName { get; set; } = string.Empty;
        public string? Description { get; set; }
        public string CategoryName { get; set; } = string.Empty;
        public string ColorHex { get; set; } = "#6366F1";
        public bool IsSelected { get; set; }
    }
}