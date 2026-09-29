using System;
using System.Windows;
using System.Windows.Controls;

namespace StudentRegistrationApp
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// Mini Project: Student Registration App dengan WPF
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            UpdateCounter();
        }

        // ========================================================
        // STEP 6 & 8: EVENT TOMBOL SIMPAN & VALIDASI
        // ========================================================
        private void BtnSimpan_Click(object sender, RoutedEventArgs e)
        {
            // Validasi 1: NIM harus diisi
            if (string.IsNullOrWhiteSpace(txtNim.Text))
            {
                MessageBox.Show("NIM harus diisi!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                txtNim.Focus();
                return;
            }

            // Validasi 2: Nama harus diisi
            if (string.IsNullOrWhiteSpace(txtNama.Text))
            {
                MessageBox.Show("Nama harus diisi!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                txtNama.Focus();
                return;
            }

            // Validasi 3: Program Studi harus dipilih
            if (cmbProdi.SelectedItem == null)
            {
                MessageBox.Show("Pilih program studi!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                cmbProdi.Focus();
                return;
            }

            // Validasi 4: Jenis Kelamin harus dipilih
            if (rbLaki.IsChecked != true && rbPerempuan.IsChecked != true)
            {
                MessageBox.Show("Pilih jenis kelamin!", "Validasi Form", MessageBoxButton.OK, MessageBoxImage.Warning);
                return;
            }

            // Ambil data dari masing-masing kontrol UI
            string nim = txtNim.Text.Trim();
            string nama = txtNama.Text.Trim();
            string prodi = "";
            if (cmbProdi.SelectedItem is ComboBoxItem item)
            {
                prodi = item.Content.ToString();
            }

            string jenisKelamin = rbLaki.IsChecked == true ? "Laki-laki" : "Perempuan";

            // Format baris data
            string data = $"{nim} | {nama} | {prodi} | {jenisKelamin}";

            // Masukkan data ke dalam ListBox
            lstMahasiswa.Items.Add(data);
            UpdateCounter();

            // Tampilkan pesan konfirmasi berhasil
            MessageBox.Show("Data mahasiswa berhasil disimpan!", "Informasi", MessageBoxButton.OK, MessageBoxImage.Information);

            // Bersihkan form input agar siap input data berikutnya
            BtnReset_Click(sender, e);
        }

        // ========================================================
        // STEP 9: EVENT TOMBOL RESET
        // ========================================================
        private void BtnReset_Click(object sender, RoutedEventArgs e)
        {
            txtNim.Clear();
            txtNama.Clear();
            cmbProdi.SelectedIndex = -1;
            rbLaki.IsChecked = false;
            rbPerempuan.IsChecked = false;
            txtNim.Focus();
        }

        // ========================================================
        // STEP 10: EVENT TOMBOL HAPUS (DENGAN KONFIRMASI)
        // ========================================================
        private void BtnHapus_Click(object sender, RoutedEventArgs e)
        {
            if (lstMahasiswa.SelectedItem != null)
            {
                // Konfirmasi sebelum menghapus data
                MessageBoxResult confirm = MessageBox.Show(
                    "Apakah Anda yakin ingin menghapus data mahasiswa yang dipilih?",
                    "Konfirmasi Hapus",
                    MessageBoxButton.YesNo,
                    MessageBoxImage.Question
                );

                if (confirm == MessageBoxResult.Yes)
                {
                    lstMahasiswa.Items.Remove(lstMahasiswa.SelectedItem);
                    UpdateCounter();
                    MessageBox.Show("Data berhasil dihapus!", "Informasi", MessageBoxButton.OK, MessageBoxImage.Information);
                }
            }
            else
            {
                MessageBox.Show("Pilih data yang ingin dihapus!", "Peringatan", MessageBoxButton.OK, MessageBoxImage.Warning);
            }
        }

        // ========================================================
        // HELPER: COUNTER JUMLAH MAHASISWA
        // ========================================================
        private void UpdateCounter()
        {
            if (lblCount != null)
            {
                lblCount.Text = $"Jumlah Mahasiswa: {lstMahasiswa.Items.Count}";
            }
        }
    }
}