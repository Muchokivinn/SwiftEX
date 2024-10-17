// responsive.js

// Function to optimize layout based on screen width
function optimizeLayout() {
    const width = window.innerWidth;

    // Example: Modify navigation layout for mobile screens
    const nav = document.querySelector('.nav');
    if (width <= 768) {
        nav.classList.add('mobile-nav');
    } else {
        nav.classList.remove('mobile-nav');
    }
}

// Event listeners for responsive adjustments
window.addEventListener('resize', optimizeLayout);
window.addEventListener('load', optimizeLayout);

// Additional dynamic adjustments (e.g., for showing/hiding elements)
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('show');
    });
});
