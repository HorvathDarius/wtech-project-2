// Get all input elements with name "quantity"
let inputs = document.getElementsByName("quantity");

// Add event listener to each input element
inputs.forEach((input) => {
    // when it cahnges
    input.addEventListener("change", () => {
        // Get the value of the input element
        const quantity = input.value;
        // Get the product ID from the input element's data attribute
        const productId = input.id;

        // Send PUT request
        fetch("/cart", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                // CSRF token
                // Workaround inspired by https://stackoverflow.com/questions/7524585/how-do-i-get-the-information-from-a-meta-tag-with-javascript
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            // Send data as JSON
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity,
            }),
        });
    });
});
