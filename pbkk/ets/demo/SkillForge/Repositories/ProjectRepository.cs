using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Microsoft.Data.SqlClient;
using SkillForge.Models;

namespace SkillForge.Repositories
{
    public class ProjectRepository
    {
        public async Task<List<Project>> GetAllProjectsAsync()
        {
            var projects = new List<Project>();

            using (var conn = DatabaseHelper.GetConnection())
            {
                await conn.OpenAsync();
                string query = "SELECT ProjectId, UserId, Title, Description, CourseName, DifficultyLevel, RepoUrl, DemoUrl, CreatedAt FROM Projects ORDER BY CreatedAt DESC;";

                using (var cmd = new SqlCommand(query, conn))
                using (var reader = await cmd.ExecuteReaderAsync())
                {
                    while (await reader.ReadAsync())
                    {
                        projects.Add(new Project
                        {
                            ProjectId = reader.GetInt32(0),
                            UserId = reader.GetInt32(1),
                            Title = reader.GetString(2),
                            Description = reader.IsDBNull(3) ? null : reader.GetString(3),
                            CourseName = reader.IsDBNull(4) ? null : reader.GetString(4),
                            DifficultyLevel = reader.GetInt32(5),
                            RepoUrl = reader.IsDBNull(6) ? null : reader.GetString(6),
                            DemoUrl = reader.IsDBNull(7) ? null : reader.GetString(7),
                            CreatedAt = reader.GetDateTime(8)
                        });
                    }
                }
            }

            return projects;
        }

        public async Task<bool> InsertProjectAsync(Project project, List<int> selectedSkillIds)
        {
            using (var conn = DatabaseHelper.GetConnection())
            {
                await conn.OpenAsync();
                using (var trans = conn.BeginTransaction())
                {
                    try
                    {
                        string insertProjSql = @"
                            INSERT INTO Projects (UserId, Title, Description, CourseName, DifficultyLevel, RepoUrl, DemoUrl)
                            OUTPUT INSERTED.ProjectId
                            VALUES (@UserId, @Title, @Description, @CourseName, @DifficultyLevel, @RepoUrl, @DemoUrl);";

                        int newProjectId;
                        using (var cmd = new SqlCommand(insertProjSql, conn, trans))
                        {
                            cmd.Parameters.AddWithValue("@UserId", project.UserId);
                            cmd.Parameters.AddWithValue("@Title", project.Title);
                            cmd.Parameters.AddWithValue("@Description", (object?)project.Description ?? DBNull.Value);
                            cmd.Parameters.AddWithValue("@CourseName", (object?)project.CourseName ?? DBNull.Value);
                            cmd.Parameters.AddWithValue("@DifficultyLevel", project.DifficultyLevel);
                            cmd.Parameters.AddWithValue("@RepoUrl", (object?)project.RepoUrl ?? DBNull.Value);
                            cmd.Parameters.AddWithValue("@DemoUrl", (object?)project.DemoUrl ?? DBNull.Value);

                            newProjectId = (int)await cmd.ExecuteScalarAsync();
                        }

                        foreach (var skillId in selectedSkillIds)
                        {
                            string insertRelSql = "INSERT INTO ProjectSkills (ProjectId, SkillId) VALUES (@ProjectId, @SkillId);";
                            using (var cmdRel = new SqlCommand(insertRelSql, conn, trans))
                            {
                                cmdRel.Parameters.AddWithValue("@ProjectId", newProjectId);
                                cmdRel.Parameters.AddWithValue("@SkillId", skillId);
                                await cmdRel.ExecuteNonQueryAsync();
                            }
                        }

                        trans.Commit();
                        return true;
                    }
                    catch
                    {
                        trans.Rollback();
                        throw;
                    }
                }
            }
        }
    }
}