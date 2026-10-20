using System.Windows;
using SkillForge.Models;

namespace SkillForge.Views
{
    public partial class AddProjectWindow : Window
    {
        public Project? CreatedProject { get; private set; }

        public AddProjectWindow()
        {
            InitializeComponent();
        }

        private void BtnSave_Click(object sender, RoutedEventArgs e)
        {
            if (string.IsNullOrWhiteSpace(TxtTitle.Text))
            {
                MessageBox.Show("Judul proyek tidak boleh kosong!", "Peringatan", MessageBoxButton.OK, MessageBoxImage.Warning);
                return;
            }

            int difficulty = CmbDifficulty.SelectedIndex switch
            {
                0 => 1,
                2 => 3,
                _ => 2
            };

            CreatedProject = new Project
            {
                UserId = 1,
                Title = TxtTitle.Text.Trim(),
                CourseName = string.IsNullOrWhiteSpace(TxtCourse.Text) ? "Mandiri" : TxtCourse.Text.Trim(),
                DifficultyLevel = difficulty,
                RepoUrl = TxtRepo.Text.Trim(),
                Description = "Portofolio mahasiswa terdaftar"
            };

            DialogResult = true;
            Close();
        }

        private void BtnCancel_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
            Close();
        }
    }
}