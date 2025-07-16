document.addEventListener("DOMContentLoaded", function() {
    // Função para carregar itens do carrinho armazenados no localStorage
    function loadCartItems() {
        const cartItemsContainer = document.getElementById('cart-items');
        const cartTotalElement = document.getElementById('cart-total');

        let cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
        let total = 0;

        // Limpa a área de itens do carrinho
        cartItemsContainer.innerHTML = "";

        // Loop pelos itens do carrinho
        cartItems.forEach(item => {
            const itemElement = document.createElement("div");
            itemElement.classList.add("cart-item");
            itemElement.innerHTML = 
                `<p>${item.title} - ${item.quantity} x R$ ${item.price}</p>`;
            cartItemsContainer.appendChild(itemElement);

            // Calcula o total
            total += item.quantity * parseFloat(item.price.replace(",", ".").replace("R$", "").trim());
        });

        // Atualiza o total
        cartTotalElement.textContent = `R$ ${total.toFixed(2).replace(".", ",")}`;
    }

    // Chamar a função para carregar o carrinho
    loadCartItems();

    // Função para finalizar o pedido
    document.getElementById('complete-order').addEventListener('click', function() {
        const form = document.getElementById('checkout-form');
        const paymentMethod = document.querySelector('input[name="payment"]:checked').value;

        if (form.checkValidity()) {
            const orderData = {
                name: form.name.value,
                email: form.email.value,
                address: form.address.value,
                city: form.city.value,
                zip: form.zip.value,
                phone: form.phone.value,
                payment: paymentMethod,
                cartItems: JSON.parse(localStorage.getItem("cartItems"))
            };

            // Enviar os dados do pedido via AJAX ou redirecionar para uma página de confirmação
            console.log("Pedido Finalizado:", orderData);

            alert("Pedido finalizado com sucesso!");

            // Limpar o carrinho após a finalização
            localStorage.removeItem("cartItems");
            window.location.href = "thank-you.html"; // Redirecionar para página de agradecimento
        } else {
            alert("Por favor, preencha todos os campos.");
        }
    });
});



