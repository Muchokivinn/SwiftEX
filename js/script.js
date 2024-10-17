const menuToggle = document.querySelector('.menu-toggle');
const navMenu = document.querySelector('nav ul');

menuToggle.addEventListener('click', () => {
  menuToggle.classList.toggle('active');
  navMenu.classList.toggle('active');
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

let currentIndex = 0;

function showImage(index) {
    const wrapper = document.querySelector('.gallery-wrapper');
    const totalImages = document.querySelectorAll('.gallery-item').length;
    const galleryItems = document.querySelectorAll('.gallery-item');

    // Reset all images' active state
    galleryItems.forEach(item => item.classList.remove('active'));

    // Adjust the current index
    currentIndex = (index + totalImages) % totalImages; // Loop back to the first image
    const offset = -currentIndex * 100; // Calculate the offset for the transform
    wrapper.style.transform = `translateX(${offset}%)`;

    // Add active class for pop-out effect
    galleryItems[currentIndex].classList.add('active');
}

function nextImage() {
    showImage(currentIndex + 1);
}

function prevImage() {
    showImage(currentIndex - 1);
}

// Initialize with the first image as active
document.addEventListener("DOMContentLoaded", () => {
    showImage(0);
});
