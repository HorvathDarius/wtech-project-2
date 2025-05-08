document.getElementById("checkout-btn").addEventListener("click", () => {
    const cartId = localStorage.getItem("shoppingCartId");
    window.location.href = "/checkout/" + cartId;
});
