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
                