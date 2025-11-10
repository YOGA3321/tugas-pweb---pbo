</div> <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const body = document.body;
            
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    // Menambah/menghapus class 'sidebar-open' pada <body>
                    body.classList.toggle('sidebar-open');
                });
            }
        });
    </script>
</body>
</html>