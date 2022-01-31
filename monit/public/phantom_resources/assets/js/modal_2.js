
// Get the modal 
var modal_my_sub = document.getElementById("modal_2");
				
// Get the button that opens the modal
var btn_my_sub = document.getElementById("view_my_subjects");


// Get the <span> element that closes the modal
var span_my_sub = document.getElementsByClassName("close_modal_2")[0];

// When the user clicks the button, open the modal 
btn_my_sub.onclick = function() {
  modal_my_sub.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span_my_sub.onclick = function() {
  modal_my_sub.style.display = "none";
}