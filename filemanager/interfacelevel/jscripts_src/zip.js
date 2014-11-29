
function validateForm(form) {
	var filename = form.filename.value;

	if (filename == "") {
		alert('You must type a filename.');
		return false;
	}

	return true;
};

function init() {
	var files = document.getElementById('files');
	
	var selFiles = openerWindow.selectedFiles;
	for (var i=0; i<selFiles.length; i++)
		files.innerHTML += '<input type="hidden" name="file_' + i + '" value="' + selFiles[i] + '" />';

	var selDirs = openerWindow.selectedDirs;
	for (var i=0; i<selDirs.length; i++)
		files.innerHTML += '<input type="hidden" name="dir_' + i + '" value="' + selDirs[i] + '" />';

	files.innerHTML += '<input type="hidden" name="selFilesLength" value="' + selFiles.length + '" />';
	files.innerHTML += '<input type="hidden" name="selDirsLength" value="' + selDirs.length + '" />';
	
	hideLoadingBar();
};
