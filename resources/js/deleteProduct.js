// When delete buttin is clicked
document.getElementById("deleteProduct").addEventListener("click", () => {
    // Get product ID from the form
    const productId = document.getElementById("product_id").value;

    // Send DELETE request
    fetch(`/delete/${productId}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            // CSRF token
            // Workaround inspired by https://stackoverflow.com/questions/7524585/how-do-i-get-the-information-from-a-meta-tag-with-javascript
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    }).then(() => {
        // Redirect to the admin products page
        window.location.href = "/admin";
    });
});
