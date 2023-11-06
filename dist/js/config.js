
let slideshow = document.querySelector("#slideshow1");
let currentSlide = 0;
const slides = document.querySelectorAll(".slide");
const slidesToShow = 5; // Số lượng slide được hiển thị cùng lúc

// Hàm chuyển slide trước
function prevSlide() {
currentSlide = (currentSlide - slidesToShow + slides.length) % slides.length;
updateSlide();
}

//Hàm chuyển slide tiếp theo
function nextSlide() {
currentSlide = (currentSlide + slidesToShow) % slides.length;
updateSlide();
}


// Cập nhật trạng thái hiển thị slide
function updateSlide() {
const slideWidth = slides[0].clientWidth;
slideshow.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}


// Thêm sự kiện cho nút trước
document.querySelector(".swiper-button-prev").addEventListener("click", prevSlide);

// Thêm sự kiện cho nút sau
document.querySelector(".swiper-button-next").addEventListener("click", nextSlide);

