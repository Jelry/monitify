
// Get the modal 
var modal_class_list = document.getElementById("modal_3");
				
// Get the button that opens the modal
var btn_class_list = document.getElementById("view_class_list");


// Get the <span> element that closes the modal
var span_class_list = document.getElementsByClassName("close_modal_3")[0];

// When the user clicks the button, open the modal 
btn_class_list.onclick = function() {
  modal_class_list.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span_class_list.onclick = function() {
  modal_class_list.style.display = "none";
}