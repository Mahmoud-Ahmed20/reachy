var totalSteps = $(".steps li").length;

$(".submit").on("click", function () {
    return false;
});

$(".steps li:nth-of-type(1)").addClass("active");
$(".container-fluid .form-container:nth-of-type(1)").addClass("active");

$(".form-container").on("click", ".next", function () {
    $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active");
    $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");
});

$(".form-container").on("click", ".back", function () {
    $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active");
    $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY");
});


/*=========================================================
*     If you won't to make steps clickable, Please comment below code
=================================================================*/

$(document).ready(function () {
    $('.js-example-basic-single').select2();
});
/***************************************/


var lowerSlider = document.querySelector('#lower');
var upperSlider = document.querySelector('#upper');
document.querySelector('#two').value = upperSlider.value;
document.querySelector('#one').value = lowerSlider.value;
var lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);
upperSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
        }
    }
    document.querySelector('#two').value = this.value
};

lowerSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector('#one').value = this.value
};

const optionMenu = document.querySelector(".select-menu"),
    selectBtn = optionMenu.querySelector(".select-btn"),
    options = optionMenu.querySelectorAll(".option"),
    sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () =>
    optionMenu.classList.toggle("active")
);
options.forEach((option) => {
    option.addEventListener("click", () => {
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;
        optionMenu.classList.remove("active");
    });
});
$(window).on('load', function () {
    $('#exampleModalLg').modal('show');
});
/***************************************** */
