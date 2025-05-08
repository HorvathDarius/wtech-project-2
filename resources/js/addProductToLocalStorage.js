document.getElementById("add-to-cart-btn").addEventListener("click", () => {
    // Load form
    let form = document.getElementById("cart-form");

    // Create payload
    const products = [
        {
            product_id: form.elements[1].value,
            quantity: form.elements[2].value,
        },
    ];

    // Save paylaod to localStorage
    localStorage.setItem("products", JSON.stringify(products));
});
