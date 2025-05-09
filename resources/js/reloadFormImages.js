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
        // Get big image element
        const bigImage = document.getElementById("bigImage");
        // Check if images is empty
        const isEmpty1 = bigImage.src.includes("uploadImage.png");
        const isEmpty2 = smallImage.src.includes("uploadImage.png");

        // If big image is empty, set it to first image
        if (isEmpty1) {
            bigImage.src =
                "storage/uploads/images/" + category.value + "/" + image1.name;
            // If small image is empty, set it to first image
        } else if (isEmpty2) {
            smallImage.src =
                "storage/uploads/images/" + category.value + "/" + image1.name;
        }
    }

    if (image2) {
        // Get small image element
        const smallImage = document.getElementById("smallImage");
        // Check if images is empty
        const isEmpty1 = bigImage.src.includes("uploadImage.png");
        const isEmpty2 = smallImage.src.includes("uploadImage.png");

        // If big image is empty, set it to second image
        if (isEmpty1) {
            bigImage.src =
                "storage/uploads/images/" + category.value + "/" + image2.name;
            // If small image is empty, set it to second image
        } else if (isEmpty2) {
            smallImage.src =
                "storage/uploads/images/" + category.value + "/" + image2.name;
        }
    }
});
