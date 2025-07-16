// cart open close
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');

// open cart 
cartIcon.onclick = () => {
    cart.classList.add("active");
};

//close
closeCart.onclick = () => {
    cart.classList.remove("active");
};

//making add to cart
// cart working js

if(document.readyState == "loading"){
    document.addEventListener("DOMContentLoaded", ready);
}else{
    ready();
}

// making function
function ready(){
    //remove item from cart
    var removeCartButtons = document.getElementsByClassName("cart-remove");
    for(var i = 0; i < removeCartButtons.length; i++){
        var button = removeCartButtons[i];
        button.addEventListener("click", removeCartItem);
    }

    //quantity change
    var quantityInputs = document.getElementsByClassName("cart-quantity");
    for(var i = 0; i < quantityInputs.length; i++){
        var input = quantityInputs[i];
        input.addEventListener("change", quantityChanged);
    } 
    // add to cart
    var addCart = document.getElementsByClassName("shop");
    for(var i = 0; i < addCart.length; i++){
        var button = addCart[i];
        button.addEventListener("click", addCartClicked);
    }
    loadCartItems ();
}
//remove cart item
function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updatetotal();
    saveCartItems();
    updateCartIcon(); 
}

// quantity change
function quantityChanged(event){
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updatetotal();
    saveCartItems();
    updateCartIcon();
}

// add cart function
function addCartClicked(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName("product-title")[0].innerText;
    var price = shopProducts.getElementsByClassName("price")[0].innerText;
    var productImg = shopProducts.getElementsByClassName("product-img")[0].src;
    
    addProductToCart(title, price, productImg);
    updatetotal();
    saveCartItems();
    updateCartIcon();
}

function addProductToCart(title, price, productImg) {
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");

    
    // Verificar se o produto já está no carrinho
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title) {
            // Produto já existe, incrementa a quantidade
            var cartBox = cartItemsNames[i].parentElement.parentElement;
            var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
            quantityElement.value = parseInt(quantityElement.value) + 1; // Incrementar a quantidade
            
            updatetotal();
            saveCartItems(); // Salvar o estado atualizado
            updateCartIcon(); // Atualizar o ícone do carrinho com a quantidade correta
            return; // Retorna para evitar adicionar um novo item
        }
    }

    // Caso o produto não esteja no carrinho, adicionar um novo
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add("cart-box");
    
    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <i class="fa-regular fa-trash-can fa-sm cart-remove"></i>
    `;

    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);

    // Adicionar os eventos de remover e alterar quantidade
    cartShopBox.getElementsByClassName("cart-remove")[0].addEventListener("click", removeCartItem);
    cartShopBox.getElementsByClassName("cart-quantity")[0].addEventListener("change", quantityChanged);

    updatetotal();
    saveCartItems(); // Salvar o estado atualizado
    updateCartIcon(); // Atualizar o ícone do carrinho com a quantidade correta
}




// update total
function updatetotal() {
    var cartContent = document.querySelector(".cart-content");
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName("cart-price")[0];
        var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];

        var price = parseFloat(priceElement.innerText.replace('R$', '').replace(',', '.'));
        var quantity = quantityElement.value;
        total += price * quantity;
    }

    total = total.toFixed(2).replace('.', ',');  // Corrigido para o formato brasileiro
    document.getElementsByClassName("total-price")[0].innerText = 'R$' + total;
    localStorage.setItem('cartTotal', total);
}

// keep item in cart
// Salvar carrinho no localStorage
function saveCartItems() {
    var cartItems = [];
    var cartContent = document.querySelector('.cart-content');
    var cartBoxes = cartContent.getElementsByClassName('cart-box');

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var titleElement = cartBox.getElementsByClassName('cart-product-title')[0];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var productImg = cartBox.getElementsByClassName('cart-img')[0].src;

        var item = {
            title: titleElement.innerText,
            price: priceElement.innerText,
            quantity: quantityElement.value,
            productImg: productImg,
        };
        cartItems.push(item);
    }

    localStorage.setItem("cartItems", JSON.stringify(cartItems)); // Salvar no localStorage
    // Também pode ser enviado ao banco via AJAX ou cookies
    document.cookie = "cartItems=" + JSON.stringify(cartItems);
}


function updateCartIcon() {
    var cartBoxes = document.getElementsByClassName('cart-box');
    var quantity = 0;

    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        quantity += parseInt(quantityElement.value);
    }

    var cartIcon = document.querySelector('#cart-icon');
    cartIcon.setAttribute('data-quantity', quantity); // Atualiza o ícone com a quantidade total
}


// loads in cart
function loadCartItems() {
    var cartItems = localStorage.getItem('cartItems');
    if (cartItems) {
        cartItems = JSON.parse(cartItems);

        for (var i = 0; i < cartItems.length; i++) {
            var item = cartItems[i];
            addProductToCart(item.title, item.price, item.productImg);

            var cartBoxes = document.getElementsByClassName('cart-box');
            var cartBox = cartBoxes[cartBoxes.length - 1];
            var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
            quantityElement.value = item.quantity;
        }
    }

    var cartTotal = localStorage.getItem('cartTotal');
    if (cartTotal) {
        document.getElementsByClassName('total-price')[0].innerText = "R$" + cartTotal;
    }

    updateCartIcon();
}

// quantity in cart icon
function updateCartIcon(){
    var cartBoxes = document.getElementsByClassName('cart-box');
    var quantity= 0;

    for (var i = 0; i < cartBoxes.length; i++){
        var cartBox =  cartBoxes[i];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        quantity += parseInt(quantityElement.value);
    }
    var cartIcon = document.querySelector('#cart-icon');
    cartIcon.setAttribute('data-quantity', quantity);
}
