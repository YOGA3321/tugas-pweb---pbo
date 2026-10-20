using System.Windows;
using System.Windows.Media;

namespace SkillForge
{
    public partial class App : Application
    {
        public static bool IsDarkMode { get; private set; } = false;

        public static void ToggleTheme()
        {
            IsDarkMode = !IsDarkMode;

            var res = Current.Resources;

            if (IsDarkMode)
            {
                // ==============================================================
                // SHADCN ZINC DARK MODE PALETTE
                // ==============================================================
                res["AppBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#09090B"));
                res["CardBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#121215"));
                res["InnerCardBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#18181B"));
                res["BorderBrushColor"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#27272A"));
                res["TextPrimaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));
                res["TextSecondaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#A1A1AA"));
                res["MutedForegroundBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#71717A"));

                res["SidebarBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#0C0C0E"));
                res["SidebarBorderBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#27272A"));
                res["SidebarActiveBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#1E1E22"));
                res["SidebarTextPrimaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));
                res["SidebarTextSecondaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#A1A1AA"));

                res["PrimaryBtnBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));
                res["PrimaryBtnFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#09090B"));
                res["SecondaryBtnBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#27272A"));
                res["SecondaryBtnFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));

                res["BadgeNeutralBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#27272A"));
                res["BadgeNeutralFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));
                res["BadgeSuccessBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#064E3B"));
                res["BadgeSuccessFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#34D399"));
                res["BadgeWarningBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#451A03"));
                res["BadgeWarningFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FBBF24"));
                res["BadgeDestructiveBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#450A0A"));
                res["BadgeDestructiveFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#F87171"));
                res["BadgeInfoBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#1E3A8A"));
                res["BadgeInfoFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#60A5FA"));
            }
            else
            {
                // ==============================================================
                // SHADCN ZINC LIGHT MODE PALETTE
                // ==============================================================
                res["AppBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));
                res["CardBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FFFFFF"));
                res["InnerCardBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#F4F4F5"));
                res["BorderBrushColor"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#E4E4E7"));
                res["TextPrimaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#09090B"));
                res["TextSecondaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#71717A"));
                res["MutedForegroundBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#A1A1AA"));

                res["SidebarBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FFFFFF"));
                res["SidebarBorderBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#E4E4E7"));
                res["SidebarActiveBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#F4F4F5"));
                res["SidebarTextPrimaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#09090B"));
                res["SidebarTextSecondaryBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#71717A"));

                res["PrimaryBtnBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#18181B"));
                res["PrimaryBtnFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FAFAFA"));
                res["SecondaryBtnBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#F4F4F5"));
                res["SecondaryBtnFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#18181B"));

                res["BadgeNeutralBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#F4F4F5"));
                res["BadgeNeutralFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#18181B"));
                res["BadgeSuccessBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#ECFDF5"));
                res["BadgeSuccessFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#059669"));
                res["BadgeWarningBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FFFBEB"));
                res["BadgeWarningFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#D97706"));
                res["BadgeDestructiveBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#FEF2F2"));
                res["BadgeDestructiveFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#DC2626"));
                res["BadgeInfoBgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#EFF6FF"));
                res["BadgeInfoFgBrush"] = new SolidColorBrush((Color)ColorConverter.ConvertFromString("#2563EB"));
            }
        }
    }
}