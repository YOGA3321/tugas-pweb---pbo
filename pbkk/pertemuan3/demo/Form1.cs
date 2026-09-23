using System;
using System.Windows.Forms;

namespace CalculatorApp
{
    public partial class Form1 : Form
    {
        // Variabel untuk menyimpan data perhitungan
        double firstNumber = 0;
        double secondNumber = 0;
        double result = 0;
        string operation = "";

        public Form1()
        {
            InitializeComponent();
        }

        // Langkah 4 — Event Tombol Angka (0-9)
        private void NumberButton_Click(object sender, EventArgs e)
        {
            Button button = (Button)sender;
            if (txtDisplay.Text == "0")
                txtDisplay.Text = button.Text;
            else
                txtDisplay.Text += button.Text;
        }

        // Langkah 5 — Event Tombol Operator (+, -, *, /)
        private void OperatorButton_Click(object sender, EventArgs e)
        {
            Button button = (Button)sender;
            if (!string.IsNullOrEmpty(txtDisplay.Text))
            {
                if (double.TryParse(txtDisplay.Text, out firstNumber))
                {
                    operation = button.Text;
                    txtDisplay.Clear();
                }
            }
        }

        // Langkah 6 — Menghitung Hasil dengan switch
        private void btnEquals_Click(object sender, EventArgs e)
        {
            try
            {
                if (string.IsNullOrEmpty(operation))
                    return;

                secondNumber = double.Parse(txtDisplay.Text);

                switch (operation)
                {
                    case "+":
                        result = firstNumber + secondNumber;
                        break;
                    case "−":
                    case "-":
                        result = firstNumber - secondNumber;
                        break;
                    case "×":
                    case "*":
                    case "x":
                        result = firstNumber * secondNumber;
                        break;
                    case "÷":
                    case "/":
                        if (secondNumber == 0)
                            throw new DivideByZeroException("Tidak dapat membagi dengan angka nol!");
                        result = firstNumber / secondNumber;
                        break;
                }

                txtDisplay.Text = result.ToString();
                operation = ""; // Reset operator setelah perhitungan selesai
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        // Langkah 7 — Clear & Decimal
        private void btnClear_Click(object sender, EventArgs e)
        {
            firstNumber = 0;
            secondNumber = 0;
            result = 0;
            operation = "";
            txtDisplay.Text = "0";
        }

        private void btnDecimal_Click(object sender, EventArgs e)
        {
            if (string.IsNullOrEmpty(txtDisplay.Text))
                txtDisplay.Text = "0";

            if (!txtDisplay.Text.Contains("."))
                txtDisplay.Text += ".";
        }
    }
}
