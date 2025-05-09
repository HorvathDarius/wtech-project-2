// If click on big image
document.getElementById("bigImage").addEventListener("click", () => {
    // Get big image element
    let bigImage = document.getElementById("bigImage");
    // Reset to default image
    bigImage.src = "images/uploadImage.png";
});

// If click on small image
document.getElementById("smallImage").addEventListener("click", () => {
    // Get small image element
    let smallImage = document.getElementById("smallImage");
    // Reset to default image
    smallImage.src = "images/uploadImage.png";
});
