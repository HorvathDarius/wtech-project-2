document.getElementById("fileInput").addEventListener("change", () => {
    // Load form
    let fileInput = document.getElementById("fileInput");
    const files = fileInput.files;

    // Extract images
    const image1 = files[0];
    const image2 = files[1];

    // Load instrument category
    const category = document.getElementById("product_category");

    // Set images
    if (image1) {
        const bigImage = document.getElementById("bigImage");
        bigImage.src = "images/" + category.value + "/" + image1.name;
    }

    if (image2) {
        const smallImage = document.getElementById("smallImage");
        smallImage.src = "images/" + category.value + "/" + image2.name;
    }
});
