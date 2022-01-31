
// Get the modal 
var modalt_include_all = document.getElementById("include_all_here");
var modalt_specify_all = document.getElementById("specify_subject_input");		
// Get the button that opens the modal
var btnt_include_all = document.getElementById("include_all_subjects");
var btnt_specify_all = document.getElementById("specify_subjects");

// Get the <span> element that closes the modal
var spant_include_all = document.getElementsByClassName("specify_subjects")[0];

// When the user clicks the button, open the modal 
btnt_include_all.onclick = function() {
  modalt_include_all.style.display = "block";
  modalt_specify_all.style.display = "none";
}
// When the user clicks on <span> (x), close the modal
btnt_specify_all.onclick = function() {
    modalt_specify_all.style.display = "block";
    modalt_include_all.style.display = "none";
}