function triggerFileInput(id) {
    document.getElementById(id).click();
}

function updateFileName(inputId, fileNameId) {
    var input = document.getElementById(inputId);
    var fileName = input.files[0] ? input.files[0].name : "No file chosen";
    document.getElementById(fileNameId).innerText = fileName;
}