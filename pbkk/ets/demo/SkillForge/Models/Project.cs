using System;
using System.Collections.Generic;

namespace SkillForge.Models
{
    public class Project
    {
        public int ProjectId { get; set; }
        public int UserId { get; set; }
        public string Title { get; set; } = string.Empty;
        public string? Description { get; set; }
        public string? CourseName { get; set; }
        public int DifficultyLevel { get; set; } = 1;
        public string? RepoUrl { get; set; }
        public string? DemoUrl { get; set; }
        public string? CoverImagePath { get; set; }
        public DateTime? StartDate { get; set; }
        public DateTime? EndDate { get; set; }
        public DateTime CreatedAt { get; set; }

        public List<Skill> AssociatedSkills { get; set; } = new();

        public string DifficultyDisplay => DifficultyLevel switch
        {
            1 => "Dasar",
            2 => "Menengah",
            3 => "Kompleks",
            _ => "Dasar"
        };
    }
}