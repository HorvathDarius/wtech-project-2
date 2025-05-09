document.getElementById("deleteProduct").addEventListener("click", () => {
    console.log("DELETE PRODUCT");
    const productId = document.getElementById("product_id").value;
    console.log("Product ID: " + productId);

    fetch(`/delete/${productId}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    }).then((response) => {
        // Redirect to the products page
        window.location.href = "/admin";
    });
});
