<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi - EAS (Evaluasi Akhir Semester)</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css">

    <style>
        /* Style tambahan bawaan dari template tugas11 */
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
    </style>
</head>
<body>

    <div class="container">
        <a href="../" class="tombol-kembali">← Kembali ke Daftar Tugas</a>

        <div class="konten-tugas">
            
            <h1>EAS: Game Ular Tangga (Snake & Ladder)</h1>
            <h3>Nama: Ageng Prayogo</h3>
            <h3>NRP: 5025241225</h3>
            <h3>Kelas: B</h3>
            <p class="meta-info">Tugas Evaluasi Akhir Semester ini bertujuan untuk membuat game desktop sederhana "Ular Tangga" menggunakan bahasa pemrograman Java dengan konsep Pemrograman Berorientasi Objek (PBO) dan GUI Swing.</p>
            <hr>

            <h2>Deskripsi & Skenario Permainan</h2>
            <p>Aplikasi ini mensimulasikan permainan papan klasik dengan fitur sebagai berikut:</p>
            <ol>
                <li><strong>Inisialisasi:</strong> Game dimainkan oleh 2 pemain (Bidak Merah dan Bidak Biru) pada papan 10x10.</li>
                <li><strong>Mekanisme Giliran:</strong> Pemain menekan tombol "LEMPAR DADU" secara bergantian.</li>
                <li><strong>Aturan Papan:</strong>
                    <ul>
                        <li>Jika berhenti di kaki <strong>Tangga</strong>, pemain otomatis naik ke petak tujuan.</li>
                        <li>Jika berhenti di mulut <strong>Ular</strong>, pemain otomatis turun ke petak tujuan.</li>
                    </ul>
                </li>
                <li><strong>Kemenangan:</strong> Pemain pertama yang mencapai petak 100 dinyatakan menang.</li>
            </ol>

            <h2>Hasil Aplikasi</h2>
            
            <h3>1. Tampilan Utama Game</h3>
            <p>Papan permainan beserta panel kontrol di sebelah kanan.</p>
            <img src="../../img/game_utama.png" alt="Screenshot Game Utama" onclick="openModal(this)">
            
            <h3>2. Log Aktivitas & Kemenangan</h3>
            <p>Contoh log saat pemain naik tangga, terkena ular, atau memenangkan permainan.</p>
            <img src="../../img/game_win.png" alt="Screenshot Log Game" onclick="openModal(this)">
            
            <hr>

            <h2>Source Code</h2>

            <h3>1. GameUtama.java</h3>
            <p>Kelas utama (JFrame) yang mengatur layout GUI dan alur permainan.</p>
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

            <h3>2. LogikaPapan.java</h3>
            <p>Menangani aturan perpindahan posisi (Ular dan Tangga) menggunakan HashMap.</p>
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

            <h3>3. TampilanPapan.java</h3>
            <p>Menangani visualisasi papan (JPanel) dan menggambar bidak pemain.</p>
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

            <h3>4. Pemain.java</h3>
            <p>Model data untuk menyimpan informasi pemain (Posisi, Warna, Nama).</p>
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