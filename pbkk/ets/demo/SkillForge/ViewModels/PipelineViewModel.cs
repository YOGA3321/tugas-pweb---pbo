using CommunityToolkit.Mvvm.ComponentModel;

namespace SkillForge.ViewModels
{
    public partial class PipelineViewModel : ObservableObject
    {
        [ObservableProperty]
        private string _title = "Papan Pelacakan Lamaran Magang";
    }
}