
// Get the modal for controls
var modalModule = document.getElementById("modalModule");
				
// Get the button that opens the modal
var btnModule = document.getElementById("myBtnModule");
var btnMModule = document.getElementById("myBtnModule1");

// Get the <span> element that closes the modal
var spanModule = document.getElementsByClassName("closeModule")[0];

// When the user clicks the button, open the modal 
btnModule.onclick = function() {
  modalModule.style.display = "block";
}
btnMModule.onclick = function() {
    modalModule.style.display = "block";
  }
// When the user clicks on <span> (x), close the modal
spanModule.onclick = function() {
  modalModule.style.display = "none";
}