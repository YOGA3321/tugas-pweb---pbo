document.addEventListener('DOMContentLoaded', function() {

    // --- ANIMASI SAAT SCROLL ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, {
        threshold: 0.1
    });
    const animatedElements = document.querySelectorAll('.animasi');
    animatedElements.forEach((el) => observer.observe(el));

    // ---PRICING TOGGLE ---
    const toggleButtons = document.querySelectorAll('.toggle-btn');
    const pricingGrids = document.querySelectorAll('.pricing-grid');
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            toggleButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const targetId = button.getAttribute('data-target');
            
            pricingGrids.forEach(grid => {
                if (grid.id === targetId) {
                    grid.classList.add('active');
                } else {
                    grid.classList.remove('active');
                }
            });
        });
    });

    // --- FORM PULANG-PERGI ---
    const tripTypeSelect = document.getElementById('tipe-perjalanan');
    const returnDateWrapper = document.getElementById('return-date-wrapper');
    const returnDateInput = document.getElementById('tanggal-pulang');

    tripTypeSelect.addEventListener('change', function() {
        if (this.value === 'Pulang Pergi') {
            returnDateWrapper.classList.add('active');
            returnDateInput.required = true;
        } else {
            returnDateWrapper.classList.remove('active');
            returnDateInput.required = false; 
        }
    });

    // --- FAQ ACCORDION ---
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const currentlyActive = document.querySelector('.faq-item.active');
            if (currentlyActive && currentlyActive !== item) {
                currentlyActive.classList.remove('active');
            }
            item.classList.toggle('active');
        });
    });

    const leadForm = document.getElementById('lead-form');
    const formMessage = document.getElementById('form-message');
    leadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        formMessage.textContent = 'Terima kasih! Tim kami akan segera menghubungi Anda.';
        formMessage.style.color = '#10B981';
        setTimeout(() => {
            leadForm.reset();
            formMessage.textContent = '';
            // Sembunyikan kembali input tanggal pulang jika terbuka
            returnDateWrapper.classList.remove('active');
            returnDateInput.required = false;
        }, 4000);
    });
});