document.getElementById("img-1").onmouseover = function() {mouseOver("img-1")};
document.getElementById("img-2").onmouseover = function() {mouseOver("img-2")};
document.getElementById("img-3").onmouseover = function() {mouseOver("img-3")};
var thumbItems = document.querySelectorAll('.thumb-item');
var product_desc = document.querySelectorAll('.product-desc');
var showText = document.getElementById('showText');
var textShowMore = document.getElementById('textShowMore'); 
function mouseOver(image) {
    document.getElementById("product-main-image-gallery").src = document.getElementById(image).src;
}

thumbItems.forEach(function(thumbItem) {
    thumbItem.addEventListener('mouseenter', function() {
        this.classList.add('selected');
    });
    thumbItem.addEventListener('mouseleave', function() {
        this.classList.remove('selected');
    });
});

var indexButton = 1;
product_desc.forEach(function(product_des){
    showText.addEventListener('click', function() {
        if(indexButton%2==0) {
            product_des.classList.remove('show-more-content-less');
            product_des.classList.add('show-more-content');
            textShowMore.innerHTML = 'Show more';
        } else {
            product_des.classList.add('show-more-content-less');
            textShowMore.innerHTML = 'Show less';
        }
        indexButton++;
    });
});

// Slider More Choice
const slideMore = document.querySelector(".simple-slider-wrapper-more");
const prevMore = document.getElementById("more-prev");
const nextMore = document.getElementById("more-next");
const sliderItemsMore = Array.from(slideMore.querySelectorAll(".simple-slider-more"));
const itemWidthMore = 25;
let currentPosMore = 0;
let currentSlideMore = 0;
sliderItemsMore.forEach(item => {
    item.style.display = "none";
});
sliderItemsMore.slice(0, 4).forEach(item => {
    item.style.display = "block";
});
nextMore.addEventListener("click", () => {
    if (currentPosMore < 100 - itemWidthMore) {
        currentPosMore += itemWidthMore;
        sliderItemsMore.forEach(item => {
            item.style.display = "none";
        });
        sliderItemsMore.slice(currentSlideMore+1, currentSlideMore+5).forEach(item => {
            item.style.display = "block";
        });
        currentSlideMore++;
    }
});
prevMore.addEventListener("click", () => {
    if (currentPosMore > 0) {
        currentPosMore -= itemWidthMore;
        sliderItemsMore.forEach(item => {
            item.style.display = "none";
        });
        sliderItemsMore.slice(currentSlideMore-1, currentSlideMore+3).forEach(item => {
            item.style.display = "block";
        });
        currentSlideMore--;
    }
});

// Slider Also 
const slideAlso = document.querySelector("#item-list");
const prevAlso = document.getElementById("also-prev");
const nextAlso = document.getElementById("also-next");
const sliderItemsAlso = Array.from(slideAlso.querySelectorAll(".productItem-also"));
const itemWidthAlso = 100;
let currentPosAlso = 0;
let currentSlideAlso = 0;
sliderItemsAlso.forEach(item => {
    item.style.display = "none";
});
sliderItemsAlso.slice(0, 5).forEach(item => {
    item.style.display = "block";
});
nextAlso.addEventListener("click", () => {
    if (currentPosAlso < 300 - itemWidthAlso) {
        currentPosAlso += itemWidthAlso;
        sliderItemsAlso.forEach(item => {
            item.style.display = "none";
        });
        sliderItemsAlso.slice(currentSlideAlso+5, currentSlideAlso+10).forEach(item => {
            item.style.display = "block";
        });
        currentSlideAlso += 5;
    }
});
prevAlso.addEventListener("click", () => {
    if (currentPosAlso > 0) {
        currentPosAlso -= itemWidthAlso;
        sliderItemsAlso.forEach(item => {
            item.style.display = "none";
        });
        sliderItemsAlso.slice(currentSlideAlso-5, currentSlideAlso).forEach(item => {
            item.style.display = "block";
        });
        currentSlideAlso -= 5;
    }
});

// Slider View 
const slideRecent = document.querySelector("#recent-list");
const prevRecent = document.getElementById("view-prev");
const nextRecent = document.getElementById("view-next");
const sliderItemsRecent = Array.from(slideRecent.querySelectorAll(".recent-item-more"));
const itemWidthRecent = 100;
let currentPosRecent = 0;
let currentSlideRecent = 0;
sliderItemsRecent.forEach(item => {
    item.style.display = "none";
});
sliderItemsRecent.slice(0, 5).forEach(item => {
    item.style.display = "block";
});
nextRecent.addEventListener("click", () => {
    if (currentPosRecent < 400 - itemWidthRecent) {
        currentPosRecent += itemWidthRecent;
        sliderItemsRecent.forEach(item => {
            item.style.display = "none";
        });
        sliderItemsRecent.slice(currentSlideRecent+5, currentSlideRecent+10).forEach(item => {
            item.style.display = "block";
        });
        currentSlideRecent += 5;
    }
});
prevRecent.addEventListener("click", () => {
    if (currentPosRecent > 0) {
        currentPosRecent -= itemWidthRecent;
        sliderItemsRecent.forEach(item => {
            item.style.display = "none";
        });
        sliderItemsRecent.slice(currentSlideRecent-5, currentSlideRecent).forEach(item => {
            item.style.display = "block";
        });
        currentSlideRecent -= 5;
    }
});
                