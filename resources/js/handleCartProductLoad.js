document.addEventListener("DOMContentLoaded", () => {
    // Load items from localStorage
    let products = localStorage.getItem("products");
    let cartId = localStorage.getItem("shoppingCartId");

    // If there are products to be loaded
    if (products) {
        products = JSON.parse(products);

        // Create payload
        const payload = {
            products: products,
            cartId: cartId ?? 0,
        };

        // Send request to load cart products
        fetch("/load-cart-products", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                // CSRF token
                // Workaround inspired by https://stackoverflow.com/questions/7524585/how-do-i-get-the-information-from-a-meta-tag-with-javascript
                "X-CSRF-TOKEN": document
                    .getElementsByTagName("meta")
                    ["csrf-token"].getAttribute("content"),
            },
            body: JSON.stringify({ payload }),
        })
            // Handle response
            .then((response) => response.json())
            .then((data) => {
                // If success
                if (data.status === "success") {
                    // Clear products from localStorage
                    localStorage.removeItem("products");
                    // Add shopping cart ID to localStorage
                    localStorage.setItem("shoppingCartId", data.id);
                    // Redirect to cart page
                    window.location.href = "/cart/" + data.id;
                }
            });
        // If there are no products and a cartId exists
    } else if (cartId) {
        const currentPath = window.location.pathname;
        const expectedPath = `/cart/${cartId}`;

        // To prevent loop
        if (currentPath !== expectedPath) {
            window.location.href = expectedPath;
        }
        // If no products and no ID
    } else {
        window.location.href = "/empty";
    }
});
