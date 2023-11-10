// xử lý slide
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



// xử lý        
let swaper = document.querySelector(".multi-slide-wrapper");
let slideOuts = document.querySelector(".slide-out-tabs");

let body = document.querySelector("#body"); 

let cartTab = document.querySelector(".cart-tab");
let accountTab = document.querySelector(".account-tab");

let slideOutContent = document.querySelector(".slide-out-content");
let accountForm = document.querySelector(".account-form");
let cartPage = document.querySelector(".cart-page");
// let signIn = document.querySelector(".signin");
let globalOverlay = document.querySelector(".global-overlay");

function open(a){
    body.classList.add('page-overlay');
    body.style.paddingRight = '21px';
    
    swaper.classList.add('open');

    globalOverlay.classList.remove('overlay-hide');
    globalOverlay.classList.add('overlay-open');
    if (a==1) {
        if (slideOuts.classList.contains("cart")) {
            slideOuts.classList.remove("cart");

        }
        slideOuts.classList.add('my-account');
        accountTab.classList.add('active');

        cartTab.classList.remove('active');

        slideOutContent.classList.remove('no-minicart');
        cartPage.style.display = "none";
        accountForm.style.display = "block";
   
        
    } else if (a==2){
        if (slideOuts.classList.contains("my-account")) {
            slideOuts.classList.remove("my-account");

        }
        slideOuts.classList.add('cart');
        cartTab.classList.add('active');

        accountTab.classList.remove('active');

        slideOutContent.classList.add('no-minicart');
        accountForm.style.display = "none";
        cartPage.style.display = "block";

    }

    // signIn.style.display = "none";
    
}

function close(){
    swaper.classList.remove('open');
    body.classList.remove('page-overlay');
    globalOverlay.classList.remove('overlay-open');
    globalOverlay.classList.add('overlay-hide');
}

document.querySelector(".rhs-account").addEventListener("click", function() {
    open(1);
});
document.querySelector(".account-tab").addEventListener("click", function() {
    open(1);
});

// document.querySelector(".wishlist-icon").addEventListener("click", open(0));
document.querySelector(".bag").addEventListener("click", function() {
    open(2);
});
document.querySelector(".cart-tab").addEventListener("click", function() {
    open(2);
});

document.querySelector(".btn-close").addEventListener("click", close);

  


