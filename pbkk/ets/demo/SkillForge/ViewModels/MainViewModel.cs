using CommunityToolkit.Mvvm.ComponentModel;
using CommunityToolkit.Mvvm.Input;

namespace SkillForge.ViewModels
{
    public partial class MainViewModel : ObservableObject
    {
        [ObservableProperty]
        private object? _currentView;

        [ObservableProperty]
        private string _currentViewName = "Dashboard";

        [ObservableProperty]
        private string _themeButtonText = "Mode Gelap";

        [ObservableProperty]
        private bool _isDarkMode = false;

        public DashboardViewModel DashboardVM { get; } = new();
        public ProjectsViewModel ProjectsVM { get; } = new();
        public ReadinessViewModel ReadinessVM { get; } = new();
        public PipelineViewModel PipelineVM { get; } = new();

        public MainViewModel()
        {
            CurrentView = DashboardVM;
            CurrentViewName = "Dashboard";
        }

        [RelayCommand]
        private void Navigate(string viewName)
        {
            CurrentViewName = viewName;
            CurrentView = viewName switch
            {
                "Dashboard" => DashboardVM,
                "Projects" => ProjectsVM,
                "Readiness" => ReadinessVM,
                "Pipeline" => PipelineVM,
                _ => DashboardVM
            };
        }

        [RelayCommand]
        private void ToggleTheme()
        {
            App.ToggleTheme();
            IsDarkMode = App.IsDarkMode;
            ThemeButtonText = App.IsDarkMode ? "Mode Terang" : "Mode Gelap";
        }
    }
}