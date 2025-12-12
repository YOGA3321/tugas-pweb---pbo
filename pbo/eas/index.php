<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan EAS - Game Ular Tangga</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css">

    <style>
        /* Style tambahan untuk code block (Bawaan Template) */
        .code-block-container {
            position: relative;
            margin-bottom: 20px;
        }
        .code-block-container button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .code-block-container button:hover {
            background-color: var(--accent-color);
        }
        
        /* Style tambahan untuk list detail */
        .detail-list { margin-bottom: 15px; text-align: justify; }
        .detail-list li { margin-bottom: 8px; }
        .section-title { margin-top: 30px; border-bottom: 2px solid #ddd; padding-bottom: 10px; margin-bottom: 20px; }
        .btn-link {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: bold;
        }
        .btn-link:hover { background-color: #0056b3; }
        .youtube-btn { background-color: #ff0000; }
        .youtube-btn:hover { background-color: #cc0000; }
    </style>
</head>
<body>

    <div class="container">
        <a href="../" class="tombol-kembali">← Kembali ke Daftar Tugas</a>

        <div class="konten-tugas">
            
            <h1 style="text-align: center;">EAS: Game Ular Tangga (Snake & Ladder)</h1>
            <div style="text-align: left; margin-bottom: 30px;">
                <h3 style="margin: 0;">1. Rafly Al Fahrezi (5025241131)</h3>
                <h3 style="margin: 0;">2. Ageng Prayogo (5025241225)</h3>
                <h3 style="margin: 0;">3. Safa Maulana Efendi (5025251227)</h3>
                <div style="margin-top: 10px;">
                    <h3 style="margin: 0;">Kelas: B</h3>
                </div>
            </div>
            <hr>

            <h2 class="section-title">1. Deskripsi Project</h2>
            <p class="detail-list">
                Project ini adalah implementasi permainan papan klasik "Ular Tangga" berbasis Desktop menggunakan bahasa pemrograman Java. Aplikasi ini dikembangkan dengan menerapkan konsep <strong>Pemrograman Berorientasi Objek (PBO)</strong> yang kuat, memisahkan antara logika permainan, data pemain, dan antarmuka pengguna (GUI).
            </p>
            <p class="detail-list">
                Game ini dirancang untuk dimainkan oleh dua pemain secara lokal (<em>Local Multiplayer</em>). Menggunakan pustaka <strong>Java Swing</strong> dan <strong>AWT</strong>, aplikasi menyajikan papan permainan visual interaktif di mana pemain dapat melihat pergerakan bidak secara real-time. Tujuan utama permainan adalah mencapai petak ke-100, dengan tantangan berupa "Ular" yang menurunkan posisi pemain dan bantuan "Tangga" yang menaikkan posisi pemain.
            </p>

            <h2 class="section-title">2. Rancangan Kelas (Class Design)</h2>
            <p>Sistem dibangun di atas empat kelas utama yang saling berinteraksi:</p>
            
            <ul class="detail-list">
                <li><strong>GameUtama (Controller & Container):</strong>
                    <br>Merupakan kelas utama yang mewarisi <code>JFrame</code>. Kelas ini bertindak sebagai pengendali (<em>Controller</em>) yang menghubungkan logika permainan dengan tampilan. 
                    <br><em>Tanggung jawab:</em> Menginisialisasi komponen UI, menangani event tombol dadu, mengatur giliran pemain, dan memeriksa kondisi kemenangan.
                </li>
                
                <li><strong>LogikaPapan (Model Logic):</strong>
                    <br>Kelas ini murni menangani aturan bisnis permainan tanpa menyentuh UI. Menggunakan struktur data <code>HashMap&lt;Integer, Integer&gt;</code> untuk memetakan posisi ular dan tangga secara efisien (O(1)).
                    <br><em>Tanggung jawab:</em> Memvalidasi apakah posisi pemain saat ini terkena ular atau tangga melalui method <code>cekTujuan()</code>.
                </li>

                <li><strong>TampilanPapan (View):</strong>
                    <br>Mewarisi <code>JPanel</code> dan bertanggung jawab penuh atas visualisasi. Kelas ini meng-override method <code>paintComponent()</code> untuk menggambar ulang papan dan posisi bidak setiap kali terjadi pergerakan.
                    <br><em>Tanggung jawab:</em> Me-render gambar latar belakang papan dan menggambar bidak pemain (lingkaran warna) pada koordinat x,y yang tepat.
                </li>

                <li><strong>Pemain (Model Data):</strong>
                    <br>Merepresentasikan entitas pemain (objek). Menyimpan atribut enkapsulasi seperti <code>nama</code>, <code>warna</code>, dan <code>posisi</code>.
                    <br><em>Tanggung jawab:</em> Menyimpan state pemain dan menyediakan method mutator/accessor untuk mengubah posisi bidak.
                </li>
            </ul>

            <h2 class="section-title">3. Tampilan Aplikasi & Penjelasan Alur</h2>
            
            <h3>A. Tampilan Awal & Gameplay</h3>
            <p>Saat aplikasi dijalankan, papan permainan 10x10 ditampilkan beserta panel kontrol di sisi kanan.</p>
            <img src="../../img/game_utama.png" alt="Tampilan Utama Game" onclick="openModal(this)">
            <p class="detail-list">
                <strong>Penjelasan:</strong>
                <br>1. Panel kanan menampilkan status giliran pemain (Merah/Biru).
                <br>2. Tombol "LEMPAR DADU" digunakan untuk mengacak angka 1-6.
                <br>3. <code>JTextArea</code> (Log) mencatat riwayat permainan, seperti hasil dadu dan perpindahan posisi.
            </p>

            <h3>B. Logika Ular & Tangga</h3>
            <p>Sistem secara otomatis mendeteksi jika pemain berhenti di petak khusus.</p>
            <img src="../../img/game_log.png" alt="Logika Ular Tangga" onclick="openModal(this)">
            <p class="detail-list">
                <strong>Mekanisme:</strong> Jika pemain mendarat di kaki tangga (misal: 3), sistem logika akan memindahkan posisi pemain ke puncak tangga (20) dan mencatat pesan "Hore! Naik Tangga" pada log. Sebaliknya, jika mendarat di kepala ular, pemain akan turun.
            </p>

            <h3>C. Kondisi Menang</h3>
            <p>Permainan berakhir ketika salah satu pemain mencapai tepat angka 100.</p>
            <img src="../../img/game_win.png" alt="Kondisi Menang" onclick="openModal(this)">
            <p>Muncul <em>Pop-up Dialog</em> memberitahu pemenang, dan tombol dadu dinonaktifkan untuk mencegah input lebih lanjut.</p>


            <h2 class="section-title">4. Link Source Code</h2>
            <p>Source code lengkap project ini dapat diakses melalui repositori GitHub berikut:</p>
            <a href="https://github.com/YOGA3321/tugas-pweb---pbo/tree/main/pbo/eas" target="_blank" class="btn-link">
                <i class="fab fa-github"></i> Buka Repository GitHub
            </a>
            
            <p style="margin-top: 20px;">Berikut adalah cuplikan kode utama program:</p>

            <h3>Kelas: GameUtama.java</h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'code1')">Copy</button>
                <pre><code id="code1">
import javax.swing.*;
import javax.swing.border.EmptyBorder;
import java.awt.*;
import java.util.ArrayList;
import java.util.Random;

public class GameUtama extends JFrame {
    private ArrayList&lt;Pemain&gt; pemain;
    private LogikaPapan logika;
    private TampilanPapan tampilan;
    
    private int giliranIndex = 0;
    private Random dadu = new Random();
    private boolean selesai = false;

    private JTextArea logArea;
    private JButton btnDadu;
    private JLabel lblStatus;

    public GameUtama() {
        super("Ular Tangga BlueJ");
        
        pemain = new ArrayList&lt;&gt;();
        pemain.add(new Pemain("Merah", Color.RED));
        pemain.add(new Pemain("Biru", Color.BLUE));
        
        logika = new LogikaPapan();
        tampilan = new TampilanPapan(pemain);

        setupLayout();

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setResizable(false);
        pack();
        setLocationRelativeTo(null);
        setVisible(true);
    }

    private void setupLayout() {
        setLayout(new BorderLayout());

        add(tampilan, BorderLayout.CENTER);

        JPanel panelKanan = new JPanel(new BorderLayout());
        panelKanan.setPreferredSize(new Dimension(250, 600));
        panelKanan.setBorder(new EmptyBorder(10, 10, 10, 10));

        lblStatus = new JLabel("Giliran: Merah");
        lblStatus.setFont(new Font("Arial", Font.BOLD, 16));
        lblStatus.setHorizontalAlignment(SwingConstants.CENTER);
        panelKanan.add(lblStatus, BorderLayout.NORTH);

        logArea = new JTextArea();
        logArea.setEditable(false);
        logArea.setLineWrap(true);
        panelKanan.add(new JScrollPane(logArea), BorderLayout.CENTER);

        btnDadu = new JButton("LEMPAR DADU");
        btnDadu.setBackground(Color.GREEN);
        btnDadu.setFont(new Font("Arial", Font.BOLD, 14));
        btnDadu.addActionListener(e -&gt; mainkanGiliran());
        panelKanan.add(btnDadu, BorderLayout.SOUTH);

        add(panelKanan, BorderLayout.EAST);
    }

    private void mainkanGiliran() {
        if (selesai) return;

        Pemain p = pemain.get(giliranIndex);
        int nilai = dadu.nextInt(6) + 1;
        
        log("----------------");
        log(p.getNama() + " melempar: " + nilai);
 
        p.gerak(nilai);
        if (p.getPosisi() &gt; 100) p.setPosisi(100);

        int posisiBaru = logika.cekTujuan(p.getPosisi());
        if (posisiBaru != p.getPosisi()) {
            if (logika.isNaik(p.getPosisi(), posisiBaru)) {
                log("Hore! Naik Tangga ke " + posisiBaru);
            } else {
                log("Aduh! Digigit Ular ke " + posisiBaru);
            }
            p.setPosisi(posisiBaru);
        } else {
            log("Posisi sekarang: " + p.getPosisi());
        }

        tampilan.repaint();

        if (p.getPosisi() == 100) {
            JOptionPane.showMessageDialog(this, p.getNama() + " Menang!");
            selesai = true;
            btnDadu.setEnabled(false);
        } else {
            giliranIndex = (giliranIndex + 1) % pemain.size();
            lblStatus.setText("Giliran: " + pemain.get(giliranIndex).getNama());
        }
    }

    private void log(String text) {
        logArea.append(text + "\n");
        logArea.setCaretPosition(logArea.getDocument().getLength());
    }

    public static void main(String[] args) {
        new GameUtama();
    }
}
                </code></pre>
            </div>

            <h3>Kelas: LogikaPapan.java</h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'code2')">Copy</button>
                <pre><code id="code2">
import java.util.HashMap;
import java.util.Map;

public class LogikaPapan {
    private Map&lt;Integer, Integer&gt; aturan;

    public LogikaPapan() {
        aturan = new HashMap&lt;&gt;();
        isiDataPapan();
    }

    private void isiDataPapan() {
        //  DAFTAR TANGGA
        aturan.put(3, 20);
        aturan.put(6, 14);
        aturan.put(11, 28);
        aturan.put(15, 34);
        aturan.put(17, 74);
        aturan.put(22, 37);
        aturan.put(38, 59);
        aturan.put(49, 67);
        aturan.put(57, 76);
        aturan.put(61, 78);
        aturan.put(73, 86);
        aturan.put(81, 98);
        aturan.put(88, 91);
        //  DAFTAR ULAR
        aturan.put(8, 4);
        aturan.put(18, 1);
        aturan.put(26, 10);
        aturan.put(39, 5);
        aturan.put(51, 6);
        aturan.put(54, 36);
        aturan.put(56, 1);
        aturan.put(60, 23);
        aturan.put(75, 28);
        aturan.put(83, 45);
        aturan.put(85, 59);
        aturan.put(90, 38);
        aturan.put(92, 25);
        aturan.put(97, 87);
        aturan.put(99, 63);
    }

    public int cekTujuan(int posisiSekarang) {
        if (aturan.containsKey(posisiSekarang)) {
            return aturan.get(posisiSekarang);
        }
        return posisiSekarang;
    }

    public boolean isNaik(int awal, int akhir) {
        return akhir &gt; awal;
    }
}
                </code></pre>
            </div>

            <h3>Kelas: TampilanPapan.java</h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'code3')">Copy</button>
                <pre><code id="code3">
import javax.swing.JPanel;
import java.awt.*;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import java.util.ArrayList;

public class TampilanPapan extends JPanel {
    private Image gambarBackground;
    private ArrayList&lt;Pemain&gt; paraPemain;
    
    private final int BOARD_SIZE = 600; 
    private final int CELL_SIZE = BOARD_SIZE / 10; 
    private final int PAWN_SIZE = 30; 

    public TampilanPapan(ArrayList&lt;Pemain&gt; pemain) {
        this.paraPemain = pemain;
        this.setPreferredSize(new Dimension(BOARD_SIZE, BOARD_SIZE));
        
        try {
            gambarBackground = ImageIO.read(new File("image_0.jpg")); 
        } catch (IOException e) {
            System.out.println("Gambar tidak ditemukan! Cek nama file.");
        }
    }

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        Graphics2D g2d = (Graphics2D) g;

        if (gambarBackground != null) {
            g2d.drawImage(gambarBackground, 0, 0, BOARD_SIZE, BOARD_SIZE, this);
        }

        int offset = 0;
        for (Pemain p : paraPemain) {
            Point koordinat = getKoordinat(p.getPosisi());
            g2d.setColor(p.getWarna());
            g2d.fillOval(koordinat.x + offset, koordinat.y + offset, PAWN_SIZE, PAWN_SIZE);
            
            g2d.setColor(Color.BLACK);
            g2d.setStroke(new BasicStroke(2));
            g2d.drawOval(koordinat.x + offset, koordinat.y + offset, PAWN_SIZE, PAWN_SIZE);
            
            offset += 5;
        }
    }

    private Point getKoordinat(int posisi) {
        if (posisi &lt;= 0) posisi = 1;
        if (posisi &gt; 100) posisi = 100;

        int rowFromBottom = (posisi - 1) / 10;
        int col;
        
        if (rowFromBottom % 2 == 0) {
            col = (posisi - 1) % 10;
        } else {
            col = 9 - ((posisi - 1) % 10);
        }

        int visualRow = 9 - rowFromBottom;
        int x = col * CELL_SIZE + (CELL_SIZE - PAWN_SIZE) / 2;
        int y = visualRow * CELL_SIZE + (CELL_SIZE - PAWN_SIZE) / 2;

        return new Point(x, y);
    }
}
                </code></pre>
            </div>

            <h3>Kelas: Pemain.java</h3>
            <div class="code-block-container">
                <button onclick="copyCode(this, 'code4')">Copy</button>
                <pre><code id="code4">
import java.awt.Color;

public class Pemain {
    private String nama;
    private int posisi;
    private Color warna;

    public Pemain(String nama, Color warna) {
        this.nama = nama;
        this.warna = warna;
        this.posisi = 1;
    }

    public void gerak(int langkah) {
        this.posisi += langkah;
    }

    public void setPosisi(int posisiBaru) {
        this.posisi = posisiBaru;
    }

    public int getPosisi() {
        return posisi;
    }

    public String getNama() {
        return nama;
    }

    public Color getWarna() {
        return warna;
    }
}
                </code></pre>
            </div>


            <h2 class="section-title">5. Link Video Demo</h2>
            <p>Demonstrasi jalannya aplikasi dapat dilihat pada video berikut:</p>
            <a href="https://youtu.be/" target="_blank" class="btn-link youtube-btn">
                ▶ Tonton Video Demo (YouTube)
            </a>

        </div>
    </div>
    
    <div id="myModal" class="modal" onclick="closeModal()">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
    function copyCode(button, elementId) {
        const codeElement = document.getElementById(elementId);
        navigator.clipboard.writeText(codeElement.innerText).then(function() {
            button.innerText = 'Copied!';
            setTimeout(function() { button.innerText = 'Copy'; }, 2000);
        }, function(err) {
            button.innerText = 'Gagal';
        });
    }

    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    function openModal(element) {
        modal.style.display = "block";
        modalImg.src = element.src;
    }

    function closeModal() {
        modal.style.display = "none";
    }
    </script>
</body>
</html>