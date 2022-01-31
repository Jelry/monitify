
// Get the modal for controls
var modalClass = document.getElementById("modalClass");
				
// Get the button that opens the modal
var btnClass = document.getElementById("myBtnClass");
var btnCClass = document.getElementById("myBtnClass1");

// Get the <span> element that closes the modal
var spanClass = document.getElementsByClassName("closeClass")[0];

// When the user clicks the button, open the modal 
btnClass.onclick = function() {
  modalClass.style.display = "block";
}
btnCClass.onclick = function() {
    modalClass.style.display = "block";
  }
// When the user clicks on <span> (x), close the modal
spanClass.onclick = function() {
  modalClass.style.display = "none";
}