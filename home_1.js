
$(document).ready(function (brandSlider) {
console.log('work well');
	var slideCount = $('#brand-discount-slider ul li').length;
	var slideWidth = $('#brand-discount-slider ul li').width();
	var slideHeight = $('#brand-discount-slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;

	$('#brand-discount-slider').css({ width: slideWidth, height: slideHeight });

	$('#brand-discount-slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

    $('#brand-discount-slider ul li:last-child').prependTo('#brand-discount-slider ul');


    function moveLeft() {
        $('#brand-discount-slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#brand-discount-slider ul li:last-child').prependTo('#brand-discount-slider ul');
            $('#brand-discount-slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#brand-discount-slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#brand-discount-slider ul li:first-child').appendTo('#brand-discount-slider ul');
            $('#brand-discount-slider ul').css('left', '');
        });
    };


    $('.brand-arrow-prev').click(function () {
        moveLeft();
    });

    $('.brand-arrow-next').click(function () {
        moveRight();
    });
    

     setTimeout(moveLeft(), 1000); /* works only on load for the first slider...research later*/
});


function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }


/*start scroll button */
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

//copy
var cpnBtn =
 document.getElementById("cpnBtn");
            var cpnCode = document.getElementById("cpnCode");

            cpnBtn.onclick = function(){
                navigator.clipboard.writeText(cpnCode.innerHTML);
                cpnBtn.innerHTML ="COPIED";
                setTimeout(function(){
                    cpnBtn.innerHTML="COPY CODE";
                }, 3000);
            }









