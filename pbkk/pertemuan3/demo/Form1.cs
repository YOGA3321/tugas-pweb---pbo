using System;
using System.Windows.Forms;

namespace CalculatorApp
{
    public partial class Form1 : Form
    {
        // Variabel penampung perhitungan
        private double firstNumber = 0;
        private double secondNumber = 0;
        private double result = 0;
        private string operation = "";
        private bool isNewEntry = true; // Penanda apakah input angka berikutnya menggantikan teks display

        public Form1()
        {
            InitializeComponent();
        }

        // ========================================================
        // LANGKAH 4 — Event Tombol Angka (0-9)
        // ========================================================
        private void NumberButton_Click(object sender, EventArgs e)
        {
            Button button = (Button)sender;

            // Jika baru saja menekan operator atau tombol =, gantikan display dengan angka baru
            if (isNewEntry || txtDisplay.Text == "0")
            {
                txtDisplay.Text = button.Text;
                isNewEntry = false;
            }
            else
            {
                txtDisplay.Text += button.Text;
            }
        }

        // ========================================================
        // LANGKAH 5 — Event Tombol Operator (+, -, *, /)
        // Mendukung Chaining: Bisa menghitung berurutan (misal: 10 + 20 - 5)
        // ========================================================
        private void OperatorButton_Click(object sender, EventArgs e)
        {
            Button button = (Button)sender;

            try
            {
                // Jika sudah ada operasi yang tertunda dan pengguna sudah mengetik angka baru,
                // hitung terlebih dahulu hasil sementara (Chaining Operations)
                if (!string.IsNullOrEmpty(operation) && !isNewEntry)
                {
                    secondNumber = double.Parse(txtDisplay.Text);
                    firstNumber = HitungHasil(firstNumber, secondNumber, operation);
                    txtDisplay.Text = firstNumber.ToString();
                }
                else
                {
                    firstNumber = double.Parse(txtDisplay.Text);
                }

                operation = button.Text;
                lblHistory.Text = $"{firstNumber} {operation}";
                isNewEntry = true; // Angka sebelumnya tetap terlihat sampai user mengetik angka berikutnya
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                btnClear_Click(sender, e);
            }
        }

        // ========================================================
        // LANGKAH 6 — Menghitung Hasil Akhir dengan Tombol (=)
        // ========================================================
        private void btnEquals_Click(object sender, EventArgs e)
        {
            try
            {
                if (string.IsNullOrEmpty(operation))
                    return;

                secondNumber = double.Parse(txtDisplay.Text);

                // Tampilkan riwayat lengkap pada lblHistory: misal "10 + 20 ="
                lblHistory.Text = $"{firstNumber} {operation} {secondNumber} =";

                result = HitungHasil(firstNumber, secondNumber, operation);
                txtDisplay.Text = result.ToString();

                firstNumber = result;
                operation = "";
                isNewEntry = true;
            }
            catch (DivideByZeroException ex)
            {
                lblHistory.Text = $"{firstNumber} {operation} 0 = Error";
                MessageBox.Show(ex.Message, "Error Pembagian Nol", MessageBoxButtons.OK, MessageBoxIcon.Error);
                txtDisplay.Text = "Error";
                isNewEntry = true;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        // Fungsi pembantu untuk perhitungan aritmatika
        private double HitungHasil(double num1, double num2, string op)
        {
            switch (op)
            {
                case "+":
                    return num1 + num2;

                case "−":
                case "-":
                    return num1 - num2;

                case "×":
                case "*":
                case "x":
                    return num1 * num2;

                case "÷":
                case "/":
                    if (num2 == 0)
                        throw new DivideByZeroException("Tidak dapat membagi dengan angka nol!");
                    return num1 / num2;

                default:
                    return num2;
            }
        }

        // ========================================================
        // LANGKAH 7 — Clear (C) & Decimal (.)
        // ========================================================
        private void btnClear_Click(object sender, EventArgs e)
        {
            firstNumber = 0;
            secondNumber = 0;
            result = 0;
            operation = "";
            txtDisplay.Text = "0";
            lblHistory.Text = "";
            isNewEntry = true;
        }

        private void btnDecimal_Click(object sender, EventArgs e)
        {
            // Jika baru saja menekan operator, desimal dimulai dari "0."
            if (isNewEntry)
            {
                txtDisplay.Text = "0.";
                isNewEntry = false;
            }
            else if (!txtDisplay.Text.Contains("."))
            {
                txtDisplay.Text += ".";
            }
        }
    }
}
