<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

    <div class="container">
        <a href="../" class="tombol-kembali">← Kembali ke Daftar Tugas</a>

        <div class="konten-tugas">
            <h1>Kemampuan Kecepatan Mengetik</h1>
            <br>
            <h2>Nama: Ageng Prayogo</h2>
            <h2>NRP: 5025241225</h2>
            
            <p>Sesuai dengan pembelajaran pertemuan 1, saya mencoba mengukur kemampuan typewriting saya dengan melakukan sebuah tes.</p>
            <img src="../../img/1.jpg" alt="Kecepatan Mengetik" width="500" height="600" onclick="openModal(this)"><br>
            <h3>Disini Saya Juga Mencoba Kembali melakukan Pengetesan.</h3><br>
            <img src="../../img/2.jpg" alt="Kecepatan Mengetik" width="500" height="600" onclick="openModal(this)"><br>
            <br>
            <a href="#" class="tombol-demo">Lihat Demo Live</a>

            </div>
    </div>

    <div id="myModal" class="modal" onclick="closeModal()">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
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