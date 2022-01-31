
// Get the modal for controls
var modalG = document.getElementById("modalGraph");
				
// Get the button that opens the modal
var btnG = document.getElementById("myBtnGraph");
var btnGG = document.getElementById("myBtnGraph1");

// Get the <span> element that closes the modal
var spanG = document.getElementsByClassName("closeGraph")[0];

// When the user clicks the button, open the modal 
btnG.onclick = function() {
  modalG.style.display = "block";
}
btnGG.onclick = function() {
    modalG.style.display = "block";
  }
// When the user clicks on <span> (x), close the modal
spanG.onclick = function() {
  modalG.style.display = "none";
}