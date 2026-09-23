<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas: Kalkulator Desktop C# WinForms - PBKK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css?v=<?= time() ?>">
    <style>
        .badge-subject {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.82rem;
            font-weight: 600;
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            margin-bottom: 15px;
        }
        .code-summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        .code-summary-box {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-raised-sm);
        }
        .code-summary-box h4 {
            margin: 0 0 8px 0;
            color: var(--text-heading);
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .code-summary-box p {
            margin: 0;
            font-size: 0.92rem;
            line-height: 1.6;
            color: var(--text-muted);
        }
        .terminal-box {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 16px 20px;
            border-radius: 10px;
            font-family: 'Consolas', 'Courier New', monospace;
            font-size: 0.92rem;
            margin: 15px 0;
            border-left: 4px solid var(--pbkk-color);
            overflow-x: auto;
        }
        .terminal-box span.prompt {
            color: #4ec9b0;
        }
        .test-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: var(--bg-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-raised-sm);
        }
        .test-table th, .test-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid rgba(163, 177, 198, 0.3);
        }
        .test-table th {
            background: rgba(124, 58, 237, 0.12);
            color: var(--pbkk-color);
            font-weight: 700;
        }
        .status-badge-ok {
            background: rgba(16, 185, 129, 0.15);
            color: #059669;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 700;
        }
        .qa-box {
            background-color: var(--bg-color);
            padding: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            margin-bottom: 20px;
        }
        .qa-box h4 {
            margin: 0 0 8px 0;
            color: var(--text-heading);
            font-size: 1rem;
        }
        .qa-box p {
            margin: 0;
            font-size: 0.93rem;
            color: var(--text-muted);
            line-height: 1.6;
        }
        .screenshot-placeholder-box {
            background-color: var(--bg-color);
            padding: 25px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-inset);
            text-align: center;
            margin: 20px 0;
        }
        .screenshot-placeholder-box p {
            margin: 8px 0 0 0;
            font-size: 0.9rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Tombol Kembali ke Daftar Tugas PBKK -->
        <a href="../" class="tombol-kembali">&larr; Kembali ke Daftar Tugas PBKK</a>

        <div class="konten-tugas">
            <span class="badge-subject">🚀 Pertemuan 3 &bull; PBKK (Pemrograman Berbasis Kerangka Kerja)</span>
            <h1>Hand-on Lab: Kalkulator Desktop GUI (C# Windows Forms)</h1>
            
            <div class="meta-info">
                <strong>Nama:</strong> Ageng Prayogo &bull; 
                <strong>NRP:</strong> 5025241225 &bull; 
                <strong>Teknologi:</strong> C# .NET Windows Forms App &bull; 
                <strong>Studi Kasus:</strong> Calculator Desktop
            </div>

            <hr>

            <!-- 1. Tujuan & Deskripsi Praktikum -->
            <h2>1. Tujuan & Ringkasan Praktikum</h2>
            <p>
                Praktikum ini berfokus pada pembuatan aplikasi desktop berbasis Graphical User Interface (GUI) menggunakan framework <strong>Windows Forms App</strong> di ekosistem <strong>.NET</strong> dengan bahasa pemrograman <strong>C#</strong>.
            </p>
            <p>
                Aplikasi yang dikembangkan adalah sebuah <strong>Kalkulator Desktop</strong> yang mampu melakukan operasi aritmatika dasar (penjumlahan, pengurangan, perkalian, pembagian), penanganan bilangan desimal, fungsi reset kalkulator (Clear), serta validasi kesalahan matematis seperti pembagian dengan nol (*Divide by Zero*).
            </p>

            <div class="code-summary-grid">
                <div class="code-summary-box">
                    <h4>🖥️ Windows Forms App</h4>
                    <p>Membangun antarmuka desktop native Windows dengan kontrol <code>Form</code>, <code>Label</code>, <code>TextBox</code>, dan <code>Button</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🎯 Unified Event Handler</h4>
                    <p>Memanfaatkan parameter <code>object sender</code> sehingga 10 tombol angka (0–9) cukup ditangani oleh satu method <code>NumberButton_Click</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>⚙️ State & Operator Machine</h4>
                    <p>Menyimpan status operasi dalam variabel <code>firstNumber</code>, <code>operation</code>, dan <code>secondNumber</code> dengan alur percabangan <code>switch-case</code>.</p>
                </div>
                <div class="code-summary-box">
                    <h4>🛡️ Exception Handling</h4>
                    <p>Mencegah aplikasi crash menggunakan blok <code>try-catch</code> saat menangani input tidak valid dan melempar <code>DivideByZeroException</code>.</p>
                </div>
            </div>

            <hr>

            <!-- 2. Arsitektur Komponen & Kontrol -->
            <h2>2. Spesifikasi Desain Antarmuka & Kontrol</h2>
            <p>Berdasarkan panduan modul lab, kontrol-kontrol berikut dirancang dalam pola 4 kolom dengan layar display teks rata kanan (Right-Aligned):</p>

            <table class="test-table">
                <thead>
                    <tr>
                        <th>Tipe Kontrol</th>
                        <th>Nama Kontrol (Name)</th>
                        <th>Teks / Simbol (Text)</th>
                        <th>Fungsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><code>Label</code></td><td><code>lblTitle</code></td><td>Calculator</td><td>Judul antarmuka aplikasi</td></tr>
                    <tr><td><code>TextBox</code></td><td><code>txtDisplay</code></td><td>0</td><td>Layar tampilan input & hasil kalkulasi</td></tr>
                    <tr><td><code>Button</code></td><td><code>btn0</code> s.d. <code>btn9</code></td><td>0 s.d. 9</td><td>Tombol memasukkan angka</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnPlus</code>, <code>btnMinus</code>, <code>btnMultiply</code>, <code>btnDivide</code></td><td>+, −, ×, ÷</td><td>Tombol operator aritmatika</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnDecimal</code></td><td>.</td><td>Tombol koma bilangan desimal</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnClear</code></td><td>C</td><td>Mereset status & layar kalkulator</td></tr>
                    <tr><td><code>Button</code></td><td><code>btnEquals</code></td><td>=</td><td>Mengeksekusi perhitungan</td></tr>
                </tbody>
            </table>

            <hr>

            <!-- 3. Alur Logika Program -->
            <h2>3. Penjelasan Logika & Struktur Kode</h2>

            <h3>A. State Variables (Variabel Penampung)</h3>
            <ul>
                <li><code>double firstNumber = 0;</code> : Menyimpan nilai angka pertama sebelum tombol operator ditekan.</li>
                <li><code>double secondNumber = 0;</code> : Menyimpan nilai angka kedua yang dimasukkan setelah operator.</li>
                <li><code>double result = 0;</code> : Menyimpan hasil perhitungan akhir.</li>
                <li><code>string operation = "";</code> : Menyimpan simbol operasi aktif (<code>+</code>, <code>−</code>, <code>×</code>, atau <code>÷</code>).</li>
            </ul>

            <h3>B. Penanganan Event Klik Angka (<code>NumberButton_Click</code>)</h3>
            <p>
                Event ini menggunakan konsep <em>Type Casting</em> <code>Button button = (Button)sender;</code> untuk mendeteksi tombol mana yang ditekan. Jika tampilan saat ini masih bernilai default <code>"0"</code>, maka teks digantikan. Namun jika sudah ada angka lain, angka baru akan digabungkan di belakangnya (*concatenation*).
            </p>

            <h3>C. Penanganan Event Operator (<code>OperatorButton_Click</code>)</h3>
            <p>
                Ketika salah satu tombol operator ditekan, angka yang sedang ada di layar di-parse menjadi tipe data <code>double</code> dan disimpan ke <code>firstNumber</code>. Operator aktif dicatat ke <code>operation</code>, lalu layar dibersihkan dengan <code>txtDisplay.Clear()</code>.
            </p>

            <h3>D. Eksekusi Hasil (<code>btnEquals_Click</code>) & Exception Handling</h3>
            <p>
                Saat tombol <code>=</code> diklik, program mengambil angka di display sebagai <code>secondNumber</code>, lalu mengeksekusi operasi menggunakan <code>switch(operation)</code>. Pada operasi pembagian, terdapat proteksi eksplisit: jika <code>secondNumber == 0</code>, program melempar <code>DivideByZeroException</code> yang ditangkap oleh blok <code>catch</code> dan memunculkan pop-up <code>MessageBox.Show</code>.
            </p>

            <hr>

            <!-- 4. Panduan Menjalankan Program -->
            <h2>4. Cara Menjalankan Aplikasi di Komputer (Desktop GUI)</h2>
            <p>Aplikasi ini dapat dijalankan langsung di Windows menggunakan perintah .NET CLI:</p>

            <div class="terminal-box">
                <span class="prompt"># 1. Buka Terminal / PowerShell dan arahkan ke folder demo:</span><br>
                cd pbkk/pertemuan3/demo<br><br>
                <span class="prompt"># 2. Jalankan aplikasi desktop Windows Forms:</span><br>
                dotnet run
            </div>

            <p>Jendela desktop aplikasi Calculator akan langsung muncul di layar Anda.</p>

            <hr>

            <!-- 5. Source Code Lengkap -->
            <h2>5. Source Code Lengkap</h2>

            <h3>A. File Logika: <code>Form1.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeForm1')">Copy Code</button>
                <pre><code id="codeForm1">using System;
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
}</code></pre>
            </div>

            <h3>B. File Desain: <code>Form1.Designer.cs</code></h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'codeDesigner')">Copy Code</button>
                <pre><code id="codeDesigner">namespace CalculatorApp
{
    partial class Form1
    {
        private System.ComponentModel.IContainer components = null;

        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        private void InitializeComponent()
        {
            this.lblTitle = new System.Windows.Forms.Label();
            this.txtDisplay = new System.Windows.Forms.TextBox();
            this.btn7 = new System.Windows.Forms.Button();
            this.btn8 = new System.Windows.Forms.Button();
            this.btn9 = new System.Windows.Forms.Button();
            this.btnDivide = new System.Windows.Forms.Button();
            this.btn4 = new System.Windows.Forms.Button();
            this.btn5 = new System.Windows.Forms.Button();
            this.btn6 = new System.Windows.Forms.Button();
            this.btnMultiply = new System.Windows.Forms.Button();
            this.btn1 = new System.Windows.Forms.Button();
            this.btn2 = new System.Windows.Forms.Button();
            this.btn3 = new System.Windows.Forms.Button();
            this.btnMinus = new System.Windows.Forms.Button();
            this.btnClear = new System.Windows.Forms.Button();
            this.btn0 = new System.Windows.Forms.Button();
            this.btnDecimal = new System.Windows.Forms.Button();
            this.btnPlus = new System.Windows.Forms.Button();
            this.btnEquals = new System.Windows.Forms.Button();
            this.SuspendLayout();

            // lblTitle
            this.lblTitle.AutoSize = true;
            this.lblTitle.Font = new System.Drawing.Font("Segoe UI", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.lblTitle.ForeColor = System.Drawing.Color.FromArgb(33, 37, 41);
            this.lblTitle.Location = new System.Drawing.Point(20, 15);
            this.lblTitle.Name = "lblTitle";
            this.lblTitle.Size = new System.Drawing.Size(90, 21);
            this.lblTitle.TabIndex = 0;
            this.lblTitle.Text = "Calculator";

            // txtDisplay
            this.txtDisplay.BackColor = System.Drawing.Color.White;
            this.txtDisplay.Font = new System.Drawing.Font("Segoe UI", 22F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.txtDisplay.Location = new System.Drawing.Point(20, 48);
            this.txtDisplay.Name = "txtDisplay";
            this.txtDisplay.ReadOnly = true;
            this.txtDisplay.Size = new System.Drawing.Size(288, 47);
            this.txtDisplay.TabIndex = 1;
            this.txtDisplay.Text = "0";
            this.txtDisplay.TextAlign = System.Windows.Forms.HorizontalAlignment.Right;

            // Tata letak tombol 4 kolom
            int startX = 20;
            int startY = 110;
            int btnWidth = 66;
            int btnHeight = 52;
            int gap = 8;

            // Baris 1: 7, 8, 9, ÷
            int row1Y = startY;
            this.btn7.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn7.Location = new System.Drawing.Point(startX, row1Y);
            this.btn7.Name = "btn7";
            this.btn7.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn7.Text = "7";
            this.btn7.UseVisualStyleBackColor = true;
            this.btn7.Click += new System.EventHandler(this.NumberButton_Click);

            this.btn8.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn8.Location = new System.Drawing.Point(startX + (btnWidth + gap), row1Y);
            this.btn8.Name = "btn8";
            this.btn8.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn8.Text = "8";
            this.btn8.UseVisualStyleBackColor = true;
            this.btn8.Click += new System.EventHandler(this.NumberButton_Click);

            this.btn9.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn9.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 2, row1Y);
            this.btn9.Name = "btn9";
            this.btn9.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn9.Text = "9";
            this.btn9.UseVisualStyleBackColor = true;
            this.btn9.Click += new System.EventHandler(this.NumberButton_Click);

            this.btnDivide.BackColor = System.Drawing.Color.FromArgb(240, 243, 246);
            this.btnDivide.Font = new System.Drawing.Font("Segoe UI", 14F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnDivide.ForeColor = System.Drawing.Color.FromArgb(13, 110, 253);
            this.btnDivide.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 3, row1Y);
            this.btnDivide.Name = "btnDivide";
            this.btnDivide.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btnDivide.Text = "÷";
            this.btnDivide.UseVisualStyleBackColor = false;
            this.btnDivide.Click += new System.EventHandler(this.OperatorButton_Click);

            // Baris 2: 4, 5, 6, ×
            int row2Y = startY + (btnHeight + gap);
            this.btn4.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn4.Location = new System.Drawing.Point(startX, row2Y);
            this.btn4.Name = "btn4";
            this.btn4.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn4.Text = "4";
            this.btn4.UseVisualStyleBackColor = true;
            this.btn4.Click += new System.EventHandler(this.NumberButton_Click);

            this.btn5.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn5.Location = new System.Drawing.Point(startX + (btnWidth + gap), row2Y);
            this.btn5.Name = "btn5";
            this.btn5.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn5.Text = "5";
            this.btn5.UseVisualStyleBackColor = true;
            this.btn5.Click += new System.EventHandler(this.NumberButton_Click);

            this.btn6.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn6.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 2, row2Y);
            this.btn6.Name = "btn6";
            this.btn6.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn6.Text = "6";
            this.btn6.UseVisualStyleBackColor = true;
            this.btn6.Click += new System.EventHandler(this.NumberButton_Click);

            this.btnMultiply.BackColor = System.Drawing.Color.FromArgb(240, 243, 246);
            this.btnMultiply.Font = new System.Drawing.Font("Segoe UI", 14F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnMultiply.ForeColor = System.Drawing.Color.FromArgb(13, 110, 253);
            this.btnMultiply.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 3, row2Y);
            this.btnMultiply.Name = "btnMultiply";
            this.btnMultiply.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btnMultiply.Text = "×";
            this.btnMultiply.UseVisualStyleBackColor = false;
            this.btnMultiply.Click += new System.EventHandler(this.OperatorButton_Click);

            // Baris 3: 1, 2, 3, −
            int row3Y = startY + (btnHeight + gap) * 2;
            this.btn1.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn1.Location = new System.Drawing.Point(startX, row3Y);
            this.btn1.Name = "btn1";
            this.btn1.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn1.Text = "1";
            this.btn1.UseVisualStyleBackColor = true;
            this.btn1.Click += new System.EventHandler(this.NumberButton_Click);

            this.btn2.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn2.Location = new System.Drawing.Point(startX + (btnWidth + gap), row3Y);
            this.btn2.Name = "btn2";
            this.btn2.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn2.Text = "2";
            this.btn2.UseVisualStyleBackColor = true;
            this.btn2.Click += new System.EventHandler(this.NumberButton_Click);

            this.btn3.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn3.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 2, row3Y);
            this.btn3.Name = "btn3";
            this.btn3.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn3.Text = "3";
            this.btn3.UseVisualStyleBackColor = true;
            this.btn3.Click += new System.EventHandler(this.NumberButton_Click);

            this.btnMinus.BackColor = System.Drawing.Color.FromArgb(240, 243, 246);
            this.btnMinus.Font = new System.Drawing.Font("Segoe UI", 14F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnMinus.ForeColor = System.Drawing.Color.FromArgb(13, 110, 253);
            this.btnMinus.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 3, row3Y);
            this.btnMinus.Name = "btnMinus";
            this.btnMinus.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btnMinus.Text = "−";
            this.btnMinus.UseVisualStyleBackColor = false;
            this.btnMinus.Click += new System.EventHandler(this.OperatorButton_Click);

            // Baris 4: C, 0, ., +
            int row4Y = startY + (btnHeight + gap) * 3;
            this.btnClear.BackColor = System.Drawing.Color.FromArgb(255, 235, 235);
            this.btnClear.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnClear.ForeColor = System.Drawing.Color.FromArgb(220, 53, 69);
            this.btnClear.Location = new System.Drawing.Point(startX, row4Y);
            this.btnClear.Name = "btnClear";
            this.btnClear.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btnClear.Text = "C";
            this.btnClear.UseVisualStyleBackColor = false;
            this.btnClear.Click += new System.EventHandler(this.btnClear_Click);

            this.btn0.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btn0.Location = new System.Drawing.Point(startX + (btnWidth + gap), row4Y);
            this.btn0.Name = "btn0";
            this.btn0.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btn0.Text = "0";
            this.btn0.UseVisualStyleBackColor = true;
            this.btn0.Click += new System.EventHandler(this.NumberButton_Click);

            this.btnDecimal.Font = new System.Drawing.Font("Segoe UI", 13F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnDecimal.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 2, row4Y);
            this.btnDecimal.Name = "btnDecimal";
            this.btnDecimal.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btnDecimal.Text = ".";
            this.btnDecimal.UseVisualStyleBackColor = true;
            this.btnDecimal.Click += new System.EventHandler(this.btnDecimal_Click);

            this.btnPlus.BackColor = System.Drawing.Color.FromArgb(240, 243, 246);
            this.btnPlus.Font = new System.Drawing.Font("Segoe UI", 14F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnPlus.ForeColor = System.Drawing.Color.FromArgb(13, 110, 253);
            this.btnPlus.Location = new System.Drawing.Point(startX + (btnWidth + gap) * 3, row4Y);
            this.btnPlus.Name = "btnPlus";
            this.btnPlus.Size = new System.Drawing.Size(btnWidth, btnHeight);
            this.btnPlus.Text = "+";
            this.btnPlus.UseVisualStyleBackColor = false;
            this.btnPlus.Click += new System.EventHandler(this.OperatorButton_Click);

            // Baris 5: = (Equals)
            int row5Y = startY + (btnHeight + gap) * 4;
            this.btnEquals.BackColor = System.Drawing.Color.FromArgb(13, 110, 253);
            this.btnEquals.Font = new System.Drawing.Font("Segoe UI", 15F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnEquals.ForeColor = System.Drawing.Color.White;
            this.btnEquals.Location = new System.Drawing.Point(startX, row5Y);
            this.btnEquals.Name = "btnEquals";
            this.btnEquals.Size = new System.Drawing.Size(btnWidth * 4 + gap * 3, btnHeight);
            this.btnEquals.Text = "=";
            this.btnEquals.UseVisualStyleBackColor = false;
            this.btnEquals.Click += new System.EventHandler(this.btnEquals_Click);

            // Form1
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 19F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.FromArgb(248, 249, 250);
            this.ClientSize = new System.Drawing.Size(328, 430);
            this.Controls.Add(this.btnEquals);
            this.Controls.Add(this.btnPlus);
            this.Controls.Add(this.btnDecimal);
            this.Controls.Add(this.btn0);
            this.Controls.Add(this.btnClear);
            this.Controls.Add(this.btnMinus);
            this.Controls.Add(this.btn3);
            this.Controls.Add(this.btn2);
            this.Controls.Add(this.btn1);
            this.Controls.Add(this.btnMultiply);
            this.Controls.Add(this.btn6);
            this.Controls.Add(this.btn5);
            this.Controls.Add(this.btn4);
            this.Controls.Add(this.btnDivide);
            this.Controls.Add(this.btn9);
            this.Controls.Add(this.btn8);
            this.Controls.Add(this.btn7);
            this.Controls.Add(this.txtDisplay);
            this.Controls.Add(this.lblTitle);
            this.Font = new System.Drawing.Font("Segoe UI", 10.5F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedDialog;
            this.MaximizeBox = false;
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Calculator Desktop";
            this.ResumeLayout(false);
            this.PerformLayout();
        }

        #endregion

        private System.Windows.Forms.Label lblTitle;
        private System.Windows.Forms.TextBox txtDisplay;
        private System.Windows.Forms.Button btn7;
        private System.Windows.Forms.Button btn8;
        private System.Windows.Forms.Button btn9;
        private System.Windows.Forms.Button btnDivide;
        private System.Windows.Forms.Button btn4;
        private System.Windows.Forms.Button btn5;
        private System.Windows.Forms.Button btn6;
        private System.Windows.Forms.Button btnMultiply;
        private System.Windows.Forms.Button btn1;
        private System.Windows.Forms.Button btn2;
        private System.Windows.Forms.Button btn3;
        private System.Windows.Forms.Button btnMinus;
        private System.Windows.Forms.Button btnClear;
        private System.Windows.Forms.Button btn0;
        private System.Windows.Forms.Button btnDecimal;
        private System.Windows.Forms.Button btnPlus;
        private System.Windows.Forms.Button btnEquals;
    }
}</code></pre>
            </div>

            <hr>

            <!-- 6. Hasil Pengujian Skenario -->
            <h2>6. Tabel Hasil Pengujian Aplikasi (Test Cases)</h2>
            <p>Pengujian dilakukan berdasarkan skenario yang ditentukan pada modul praktikum:</p>

            <table class="test-table">
                <thead>
                    <tr>
                        <th>Skenario</th>
                        <th>Input Pengguna</th>
                        <th>Hasil yang Diharapkan (Expected)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Penjumlahan</td><td><code>10 + 20 =</code></td><td><code>30</code></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                    <tr><td>Pengurangan</td><td><code>30 − 12 =</code></td><td><code>18</code></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                    <tr><td>Perkalian</td><td><code>6 × 7 =</code></td><td><code>42</code></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                    <tr><td>Pembagian</td><td><code>100 ÷ 4 =</code></td><td><code>25</code></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                    <tr><td>Desimal</td><td><code>2.5 × 4 =</code></td><td><code>10</code></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                    <tr><td>Pembagian Nol</td><td><code>10 ÷ 0 =</code></td><td>Pesan error <em>"Tidak dapat membagi dengan angka nol!"</em></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                    <tr><td>Clear</td><td>Tekan tombol <code>C</code></td><td>Layar reset menjadi <code>0</code></td><td><span class="status-badge-ok">Passed (Berhasil)</span></td></tr>
                </tbody>
            </table>

            <hr>

            <!-- 7. Hasil Tangkapan Layar Eksekusi -->
            <h2>7. Hasil Tangkapan Layar Eksekusi (Screenshot)</h2>
            <p>Berikut adalah hasil pengujian antarmuka aplikasi desktop kalkulator. Klik pada gambar untuk memperbesar tampilan:</p>

            <div id="screenshot-container">
                <div class="screenshot-placeholder-box">
                    <p>📸 <em>Slot Tangkapan Layar Demo:</em> Jalankan program dengan <code>dotnet run</code> di folder <code>pbkk/pertemuan3/demo</code>, ambil tangkapan layar jendela Calculator Desktop, lalu simpan file gambar di folder <code>img/</code> (misalnya <code>img/pbkk-m3-calc.png</code>) dan tautkan tag <code>&lt;img&gt;</code> di bawah ini.</p>
                </div>

                <!-- Template gambar dengan modal popup zoom (sama seperti tugas lainnya) -->
                <!-- 
                <img src="../../img/pbkk-m3-calc1.png" alt="Tampilan Antarmuka Kalkulator" onclick="openModal(this)">
                <p class="caption">Gambar 1: Antarmuka utama Calculator Desktop C# Windows Forms.</p>

                <img src="../../img/pbkk-m3-calc2.png" alt="Pengujian Perhitungan dan Validasi Bagi Nol" onclick="openModal(this)">
                <p class="caption">Gambar 2: Pengujian operasi hitung dan pop-up penanganan pembagian nol.</p>
                -->
            </div>

            <hr>

            <!-- 8. Refleksi Pemahaman Mahasiswa -->
            <h2>8. Refleksi & Jawaban Konseptual</h2>
            
            <div class="qa-box">
                <h4>Q1: Apa fungsi <code>object sender</code> pada event handler?</h4>
                <p><strong>Jawaban:</strong> Parameter <code>sender</code> merepresentasikan objek kontrol yang memicu event tersebut. Dengan melakukan type-casting <code>(Button)sender</code>, kita dapat mengetahui tombol mana yang diklik pengguna secara dinamis dan membaca propertinya (seperti <code>button.Text</code>) tanpa perlu membuat event handler terpisah untuk setiap tombol.</p>
            </div>

            <div class="qa-box">
                <h4>Q2: Mengapa semua tombol angka dapat memakai satu <code>NumberButton_Click</code>?</h4>
                <p><strong>Jawaban:</strong> Karena logika pemrosesan untuk semua tombol angka adalah seragam, yaitu menambahkan teks angka tombol yang diklik ke <code>txtDisplay</code>. Penggunaan satu method bersama (*shared handler*) menerapkan prinsip <em>DRY (Don't Repeat Yourself)</em> dan membuat kode jauh lebih ringkas serta mudah dikelola.</p>
            </div>

            <div class="qa-box">
                <h4>Q3: Apa perbedaan <code>firstNumber</code>, <code>secondNumber</code>, dan <code>result</code>?</h4>
                <p><strong>Jawaban:</strong> <code>firstNumber</code> menyimpan angka sebelum operator dipilih (operan pertama), <code>secondNumber</code> menyimpan angka kedua setelah operator dimasukkan (operan kedua), sedangkan <code>result</code> adalah hasil akhir perhitungan matematika dari kedua operan tersebut.</p>
            </div>

            <div class="qa-box">
                <h4>Q4: Mengapa pembagian dengan nol perlu divalidasi?</h4>
                <p><strong>Jawaban:</strong> Dalam matematika dan komputasi aritmatika, pembagian dengan angka nol menghasilkan nilai yang tidak terdefinisi (*undefined / divide by zero error*). Jika tidak divalidasi, program dapat menghasilkan nilai <code>Infinity</code> atau mengalami crash tak terduga.</p>
            </div>

            <div class="qa-box">
                <h4>Q5: Bagaimana <code>try-catch</code> membantu menjaga aplikasi tetap stabil?</h4>
                <p><strong>Jawaban:</strong> Blok <code>try-catch</code> mengisolasi proses perhitungan yang berisiko memicu exception (misal: parsing format angka tidak valid atau pembagian nol). Jika terjadi kesalahan, eksekusi kode berpindah ke blok <code>catch</code> untuk menampilkan pesan peringatan ramah (*user-friendly MessageBox*) sehingga aplikasi desktop tidak langsung menutup tiba-tiba (*force close*).</p>
            </div>
        </div>

        <footer class="portal-footer">
            <p>&copy; 2026 <strong>Ageng Prayogo</strong> (NRP: 5025241225) &bull; PBKK Pertemuan 3 &bull; <a href="../">Kembali ke Daftar Tugas PBKK</a></p>
        </footer>
    </div>

    <!-- Modal Gambar Zoom -->
    <div id="myModal" class="modal" onclick="closeModal()">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
    function copyCode(button, elementId) {
        const codeElement = document.getElementById(elementId);
        navigator.clipboard.writeText(codeElement.innerText).then(function() {
            button.innerText = 'Copied!';
            setTimeout(function() { button.innerText = 'Copy Code'; }, 2000);
        }, function(err) {
            button.innerText = 'Gagal';
        });
    }

    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    function openModal(element) {
        modal.style.display = "block";
        modal.style.opacity = "1";
        modalImg.src = element.src;
    }

    function closeModal() {
        modal.style.opacity = "0";
        setTimeout(function() {
            modal.style.display = "none";
        }, 300);
    }
    </script>
</body>
</html>
