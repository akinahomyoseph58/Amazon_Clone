

document.addEventListener("DOMContentLoaded", () => {

    /* ===== SIDEBAR ===== */
    const allBtn = document.getElementById("all-btn");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebar-overlay");
    const closeBtn = document.getElementById("close-sidebar");

    if (allBtn && sidebar && overlay && closeBtn) {
        allBtn.addEventListener("click", () => {
            sidebar.classList.add("active");
            overlay.style.display = "block";
        });

        function closeSidebar() {
            sidebar.classList.remove("active");
            overlay.style.display = "none";
        }

        closeBtn.addEventListener("click", closeSidebar);
        overlay.addEventListener("click", closeSidebar);
    }

    /* ===== SLIDER (HOME PAGE ONLY) ===== */
    const imgs = document.querySelectorAll('.header-Slider ul img');
    const prev_btn = document.querySelector('.control_prev');
    const next_btn = document.querySelector('.control_next');

    let n = 0;

    function changeSlide() {
    if (!imgs.length) return;   // ✅ ADD THIS LINE

    imgs.forEach(img => img.style.display = 'none');

    if (n >= imgs.length) n = 0; // ✅ SAFETY CHECK
    imgs[n].style.display = 'block';
}


    if (imgs.length && prev_btn && next_btn) {
        changeSlide();

        prev_btn.addEventListener('click', () => {
            n = n > 0 ? n - 1 : imgs.length - 1;
            changeSlide();
        });

        next_btn.addEventListener('click', () => {
            n = n < imgs.length - 1 ? n + 1 : 0;
            changeSlide();
        });
    }

    const productLists = document.querySelectorAll('.products');

if (productLists.length) {
    productLists.forEach(item => {
        item.addEventListener('wheel', (e) => {
            e.preventDefault();
            item.scrollLeft += e.deltaY;
        });
    });
}
});

