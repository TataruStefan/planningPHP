function openInsertProject() {
    document.getElementById("InsertProject").style.display = "block";
    document.getElementById("insertBtn").style.display = "none";
}

function closeInsertProject() {
    document.getElementById("InsertProject").style.display = "none";
    document.getElementById("insertBtn").style.display = "block";
    window.location.reload()
}