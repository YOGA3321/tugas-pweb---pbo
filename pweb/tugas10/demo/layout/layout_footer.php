<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            // Fungsi untuk membuka/menutup sidebar
            function toggleSidebar() {
                if (sidebar) sidebar.classList.toggle('active');
                if (sidebarOverlay) sidebarOverlay.classList.toggle('active'); // CSS akan menampilkannya
            }

            // 1. Klik tombol hamburger
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.stopPropagation(); // Hentikan event agar tidak bentrok
                    toggleSidebar();
                });
            }

            // 2. Klik overlay gelap
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    toggleSidebar();
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    </body>
</html>