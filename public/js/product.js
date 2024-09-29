
// for(let i = 1; i<)
var card1 = document.getElementById('card1');
var quantity1 = document.getElementById('quantity1');


// $("#quantity1").hide();

// quantity1.style.visibility = "hidden";


// var anime2 = document.getElementById('anime2');
// var anime3 = document.getElementById('anime3');

// var img1 = document.getElementById('img1');
// var img2 = document.getElementById('img2');
// var img3 = document.getElementById('img3');
// var img4 = document.getElementById('img4');

// card1.addEventListener("mouseenter", function(){
//     quantity1.style.visibility = "visible";
//     // quantity1.classList.add('visible');
// });
// card1.addEventListener("mouseleave", function(){
//     quantity1.style.visibility = "hidden";
//     // quantity1.classList.remove('visible');
// });

$("#card1").on('mouseenter', function() {
    $("#quantity1").fadeIn();
});
$("#card1").on('mouseleave', function() {
    $("#quantity1").fadeOut();
});



// img1.onclick = function(){

//     modal.style.display = "block";
//     modalImg.src = this.src;
    
//   }

//   document.addEventListener('DOMContentLoaded', () => {
//     const decrementButton = document.getElementById('decrement');
//     const incrementButton = document.getElementById('increment');
//     const numberInput = document.getElementById('numberInput');

//     decrementButton.addEventListener('click', () => {
//         let currentValue = parseInt(numberInput.value, 10);
//         if (currentValue > parseInt(numberInput.min, 10)) {
//             numberInput.value = currentValue - 1;
//         }
//     });

//     incrementButton.addEventListener('click', () => {
//         let currentValue = parseInt(numberInput.value, 10);
//         numberInput.value = currentValue + 1;
//     });
// });