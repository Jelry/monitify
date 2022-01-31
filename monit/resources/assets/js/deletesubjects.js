
// Get the modal for controls
var modalD = document.getElementById("modalDS");
				
// Get the button that opens the modal
var btnD = document.getElementById("myBtnD");


// Get the <span> element that closes the modal
var spanD = document.getElementsByClassName("closeDS")[0];

// When the user clicks the button, open the modal 
btnD.onclick = function() {
  modalD.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanD.onclick = function() {
  modalD.style.display = "none";
}

var modals = document.getElementById("myModalS");
				
// Get the button that opens the modal
var btns = document.getElementById("myBtnS");

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("closeS")[0];

// When the user clicks the button, open the modal 
btns.onclick = function() {
  modals.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spans.onclick = function() {
  modals.style.display = "none";
}