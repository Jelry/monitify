
// Get the modal for controls
var modaltabbing = document.getElementById("tabModal");
				
// Get the button that opens the modal
var btntabbing = document.getElementById("tabbing");


// Get the <span> element that closes the modal
var spantabbing = document.getElementsByClassName("closeTabbing")[0];

// When the user clicks the button, open the modal 
btntabbing.onclick = function() {
  modaltabbing.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spantabbing.onclick = function() {
  modaltabbing.style.display = "none";
}