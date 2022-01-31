
// Get the modal for controls
var modalD = document.getElementById("delete_confirmation");
				
// Get the button that opens the modal
var btnD = document.getElementById("subject_delete_sureness");


// Get the <span> element that closes the modal
var spanD = document.getElementsByClassName("close_delete_confirmation")[0];

// When the user clicks the button, open the modal 
btnD.onclick = function() {
  modalD.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanD.onclick = function() {
  modalD.style.display = "none";
}