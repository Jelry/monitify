	// Get the modal
	var modalssubject = document.getElementById("myModalSubject");
				
	// Get the button that opens the modal
	var btnssubject = document.getElementById("myBtnSubject");
	
	// Get the <span> element that closes the modal
	var spanssubject = document.getElementsByClassName("closeS")[0];
	
	// When the user clicks the button, open the modal 
	btnssubject.onclick = function() {
	  modalssubject.style.display = "block";
	}
	
	// When the user clicks on <span> (x), close the modal
	spanssubject.onclick = function() {
	  modalssubject.style.display = "none";
	}