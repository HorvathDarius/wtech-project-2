// Load variables
const price = document.getElementById("sub-total").innerText;
const deliveryPrice = document.getElementById("delivery-price");
const totalPrice = document.getElementById("total-price");

// Set standard price
document.getElementById("standard-delivery").addEventListener("change", () => {
    deliveryPrice.innerText = "15 €";
    totalPrice.value = parseFloat(price) + 15;
});

// Set express price
document.getElementById("express-delivery").addEventListener("change", () => {
    deliveryPrice.innerText = "30 €";
    totalPrice.value = parseFloat(price) + 30;
});

// Set pickup price
document.getElementById("pickup").addEventListener("change", () => {
    deliveryPrice.innerText = "0 €";
    totalPrice.value = parseFloat(price);
});
