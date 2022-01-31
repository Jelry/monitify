
// Get the modal 
var modaltabbing = document.getElementById("modal_1");
				
// Get the button that opens the modal
var btntabbing = document.getElementById("create_logsheet");


// Get the <span> element that closes the modal
var spantabbing = document.getElementsByClassName("close_modal_1")[0];

// When the user clicks the button, open the modal 
btntabbing.onclick = function() {
  modaltabbing.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spantabbing.onclick = function() {
  modaltabbing.style.display = "none";
}