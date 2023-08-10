function toggleEditCard(field) {
    var editCard = document.getElementById("editCard");
    var editField = document.getElementById("edit" + field);

    if (editCard.style.display === "none") {
        editCard.style.display = "block";
        editField.value = editField.getAttribute("data-value");
    } else {
        editCard.style.display = "none";
    }
}