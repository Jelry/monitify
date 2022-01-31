
// Get the modal for controls
var modalMonitor = document.getElementById("modalMonitor");
				
// Get the button that opens the modal
var btnMonitor = document.getElementById("myBtnMonitoring");
var btnMMonitor = document.getElementById("myBtnMonitoring1");

// Get the <span> element that closes the modal
var spanMonitor = document.getElementsByClassName("closeMonitor")[0];

// When the user clicks the button, open the modal 
btnMonitor.onclick = function() {
  modalMonitor.style.display = "block";
}
btnMMonitor.onclick = function() {
    modalMonitor.style.display = "block";
  }
// When the user clicks on <span> (x), close the modal
spanMonitor.onclick = function() {
  modalMonitor.style.display = "none";
}