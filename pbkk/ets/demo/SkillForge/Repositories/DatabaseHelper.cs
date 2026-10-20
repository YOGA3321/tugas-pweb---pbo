using Microsoft.Data.SqlClient;

namespace SkillForge.Repositories
{
    public static class DatabaseHelper
    {
        private static readonly string ConnectionString =
            "Server=(localdb)\\MSSQLLocalDB;Database=SkillForge_DB;Trusted_Connection=True;TrustServerCertificate=True;";

        public static SqlConnection GetConnection()
        {
            return new SqlConnection(ConnectionString);
        }
    }
}