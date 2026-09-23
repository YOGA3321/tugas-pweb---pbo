document.addEventListener('DOMContentLoaded', function() {
    
    const loginForm = document.getElementById('login-form');
    const messageDiv = document.getElementById('login-message');

    loginForm.addEventListener('submit', function(event) {
        // Mencegah form dari proses submit standar (refresh halaman)
        event.preventDefault();

        // Ambil data dari form
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Siapkan data untuk dikirim
        const formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);
        
        // Tampilkan pesan "loading"
        messageDiv.style.color = 'white';
        messageDiv.textContent = 'Mengecek...';

        // Kirim data menggunakan fetch (AJAX modern)
        fetch('check_login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Ubah respons menjadi format JSON
        .then(data => {
            // Tampilkan pesan berdasarkan respons dari server
            if (data.status === 'success') {
                messageDiv.style.color = '#4caf50'; // Hijau untuk sukses
                messageDiv.textContent = data.message;
            } else {
                messageDiv.style.color = '#f44336'; // Merah untuk error
                messageDiv.textContent = data.message;
            }
        })
        .catch(error => {
            // Tangani jika ada error koneksi
            console.error('Error:', error);
            messageDiv.style.color = '#f44336';
            messageDiv.textContent = 'Terjadi kesalahan koneksi.';
        });
    });

    // Logika untuk toggle password (sama seperti sebelumnya)
    const togglePassword = document.getElementById('toggle-login-password');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
            const icon = this.querySelector('i');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    }
});