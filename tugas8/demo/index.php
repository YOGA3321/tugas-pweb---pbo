<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru (PHP & MySQL)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1f2937; }
        ::-webkit-scrollbar-thumb { background: #4b5563; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #6b7280; }
    </style>
</head>
<body class="bg-gray-900 text-white antialiased">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8 min-h-screen flex flex-col items-center justify-center">
        <header class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                Pendaftaran Mahasiswa Baru
            </h1>
            <p class="text-gray-400 mt-2">Ditenagai oleh PHP, MySQL, dan AJAX.</p>
        </header>
        <main class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-700">
                <h2 class="text-2xl font-semibold mb-6 text-center">Formulir Pendaftaran</h2>
                <form id="registration-form" class="space-y-6">
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-300">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition duration-300" placeholder="Contoh: Budi Santoso" required>
                    </div>
                    <div>
                        <label for="nim" class="block mb-2 text-sm font-medium text-gray-300">NISN (Nomor Induk Siswa Nasional)</label>
                        <input type="text" id="nim" name="nim" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition duration-300" placeholder="Contoh: 20241010100" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Alamat Email</label>
                        <input type="email" id="email" name="email" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition duration-300" placeholder="example@email.com" required>
                    </div>
                    <div>
                        <label for="jurusan_id" class="block mb-2 text-sm font-medium text-gray-300">Program Studi / Jurusan</label>
                        <select id="jurusan_id" name="jurusan_id" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition duration-300" required>
                            <option value="">Memuat jurusan...</option>
                        </select>
                    </div>
                    <button type="submit" id="submit-button" class="w-full text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-300 ease-in-out transform hover:scale-105">
                        <span id="button-text">Daftarkan Mahasiswa</span>
                        <span id="button-spinner" class="hidden">
                            <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                    <div id="form-message" class="text-center text-sm mt-4"></div>
                </form>
            </div>
            <div class="bg-gray-800/50 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-700">
                <h2 class="text-2xl font-semibold mb-6 text-center">Data Pendaftar</h2>
                <div class="overflow-x-auto relative rounded-lg">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-300 uppercase bg-gray-700/50">
                            <tr>
                                <th scope="col" class="py-3 px-6">No</th>
                                <th scope="col" class="py-3 px-6">Nama</th>
                                <th scope="col" class="py-3 px-6">NIM</th>
                                <th scope="col" class="py-3 px-6">Jurusan</th>
                            </tr>
                        </thead>
                        <tbody id="student-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registration-form');
            const submitButton = document.getElementById('submit-button');
            const buttonText = document.getElementById('button-text');
            const buttonSpinner = document.getElementById('button-spinner');
            const formMessage = document.getElementById('form-message');
            const studentList = document.getElementById('student-list');
            const jurusanSelect = document.getElementById('jurusan_id');

            // --- Fungsi memuat data Jurusan ---
            async function fetchJurusan() {
                try {
                    const response = await fetch('api/get_jurusan.php');
                    const jurusan = await response.json();

                    jurusanSelect.innerHTML = '<option value="" disabled selected>Pilih jurusan</option>';
                    jurusan.forEach(j => {
                        const option = document.createElement('option');
                        option.value = j.id;
                        option.textContent = j.nama_jurusan;
                        jurusanSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Gagal memuat jurusan:', error);
                    jurusanSelect.innerHTML = '<option value="">Gagal memuat data</option>';
                }
            }

            // --- Fungsi memuat data Mahasiswa ---
            async function fetchMahasiswa() {
                try {
                    const response = await fetch('api/get_mahasiswa.php');
                    const mahasiswa = await response.json();

                    studentList.innerHTML = '';
                    if (mahasiswa.length === 0) {
                        studentList.innerHTML = `<tr><td colspan="4" class="text-center py-10 text-gray-500">Belum ada pendaftar.</td></tr>`;
                    } else {
                        let counter = 1;
                        mahasiswa.forEach(m => {
                            const row = document.createElement('tr');
                            row.className = 'bg-gray-800 border-b border-gray-700 hover:bg-gray-700/50 transition duration-300';
                            row.innerHTML = `
                                <td class="py-4 px-6 font-medium">${counter++}</td>
                                <td class="py-4 px-6">${m.nama}</td>
                                <td class="py-4 px-6">${m.nim}</td>
                                <td class="py-4 px-6">${m.nama_jurusan}</td>
                            `;
                            studentList.appendChild(row);
                        });
                    }
                } catch (error) {
                    console.error('Gagal memuat data mahasiswa:', error);
                    studentList.innerHTML = `<tr><td colspan="4" class="text-center py-10 text-red-400">Gagal memuat data.</td></tr>`;
                }
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                submitButton.disabled = true;
                buttonText.classList.add('hidden');
                buttonSpinner.classList.remove('hidden');
                formMessage.textContent = '';

                const formData = new FormData(form);

                try {
                    const response = await fetch('api/add_mahasiswa.php', {
                        method: 'POST',
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        form.reset();
                        formMessage.textContent = 'Pendaftaran berhasil!';
                        formMessage.className = 'text-center text-sm mt-4 text-green-400';
                        fetchMahasiswa(); // Langsung update tabel setelah berhasil
                    } else {
                        formMessage.textContent = result.message || 'Pendaftaran gagal.';
                        formMessage.className = 'text-center text-sm mt-4 text-red-400';
                    }

                } catch (error) {
                    console.error('Error:', error);
                    formMessage.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
                    formMessage.className = 'text-center text-sm mt-4 text-red-400';
                } finally {
                    // Kembalikan tombol ke keadaan normal
                    submitButton.disabled = false;
                    buttonText.classList.remove('hidden');
                    buttonSpinner.classList.add('hidden');
                    // Hapus pesan setelah beberapa detik
                    setTimeout(() => { formMessage.textContent = '' }, 3000);
                }
            });

            fetchJurusan();
            fetchMahasiswa();
            setInterval(fetchMahasiswa, 5000);
        });
    </script>
</body>
</html>
