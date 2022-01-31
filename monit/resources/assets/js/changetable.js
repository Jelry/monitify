
// Get the modal for controls
var modalT = document.getElementById("modalTable");
				
// Get the button that opens the modal
var btnT = document.getElementById("myBtnTable");
var btnTT = document.getElementById("myBtnTable1");

// Get the <span> element that closes the modal
var spanT = document.getElementsByClassName("closeTable")[0];

// When the user clicks the button, open the modal 
btnT.onclick = function() {
  modalT.style.display = "block";
}
btnTT.onclick = function() {
    modalT.style.display = "block";
  }
// When the user clicks on <span> (x), close the modal
spanT.onclick = function() {
  modalT.style.display = "none";
}