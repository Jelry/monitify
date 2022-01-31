
// Get the modal 
var modalG = document.getElementById("modalClaimStatus");
				
// Get the button that opens the modal
var btnG = document.getElementById("claim_this");


// Get the <span> element that closes the modal
var spanG = document.getElementsByClassName("closeClaimStatus")[0];

// When the user clicks the button, open the modal 
btnG.onclick = function() {
  modalG.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanG.onclick = function() {
  modalG.style.display = "none";
}