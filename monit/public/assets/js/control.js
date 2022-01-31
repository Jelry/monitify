
// Get the modal for controls
var modalC = document.getElementById("modalcontrol");
				
// Get the button that opens the modal
var btnC = document.getElementById("myControls");

// Get the <span> element that closes the modal
var spanC = document.getElementsByClassName("closecontrol")[0];

// When the user clicks the button, open the modal 
btnC.onclick = function() {
  modalC.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanC.onclick = function() {
  modalC.style.display = "none";
}