<?php
require_once '../adm/config/conexao.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "SELECT * FROM produtos WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        echo "Produto não encontrado.";
        exit;
    }
} else {
    echo "ID de produto inválido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinicola | Seu Vinho </title>
    <link rel="stylesheet" href="css/produto.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> <!-- fontawesome -->
</head>
<body>
        <!-- HEADER -->         
        <section id="header">
    <a href="../adm/index.php"><img src="../adm/views/img_cart/logo_bv.png" class="logo" alt=""></a>

    <div>
    <ul id="navbar">
            <li class="link"><a href="../index.php">Home</a></li>
            <li class="link"><a href="shop.php">Nossos Vinhos</a></li>
            <li class="link"><a href="contato.php">Sobre Nós</a></li>
            <li id="lg-bag">  
            <?php if(isset($_SESSION['cliente_id'])): ?> 
             <a href="view/cliente.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg></a>
              <?php else: ?>
               <a href = "view/cadastramento.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg></a>
               <?php endif; ?>

            <li id="cart-icon" data-quantity="0"><a href="#cart"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16"><path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/></svg></a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul> <!--fecha navbar-->
    </div>

    <div id="mobile">
        <a href="cadastramento.php" style="margin-right: 15px;"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16"><path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/></svg></a>
        <i id="bar"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/></svg></i>
    </div>

    <div class="cart">
        <h2 class="cart-title">Carrinho</h2>

        <!-- conteudo -->
         <div class="cart-content"></div> <!-- fecha cart-content -->

        <!-- total --> 
          <div class="total">
            <div class="total-title">Total:</div> 
            <div class="total-price">R$ 0,00</div> 
          </div> <!-- fecha total -->

        <!-- buy button -->
     <a href="checkout.html" type="button" class="btn-buy">Checkout</a>
     <i class="far fa-times" id="close-cart"></i>

    </div> <!-- fecha cart -->

 </section> <!--fecha header-->

        <!-- MAIN -->
         <section id="prodetails" class="section-p1">
            <div class="single-pro-image">
                <img src="../adm/uploads/<?php echo $produto['imagem']; ?>" alt="" width="100%" class="product-img">
            </div> <!-- fecha single-pro-image -->

            <div class="single-pro-details">
                <h6 class="product-subtitle">Brisa Vinícola</h6>
                <h2 class="product-title"><?php echo htmlspecialchars($produto['nome']); ?></h2>
                <h4 class="price">R$<?php echo number_format($produto['preco'], 2, ',', '.'); ?></h4>
                <input type="number" value="1">
                <button class="shop" onclick="addCartClicked(event)">Adicionar</button>
                <h4 class="info">Detalhes do produto:</h4>
                <p class="product-details"><?php echo htmlspecialchars($produto['descricao']); ?></p>
            </div> <!-- fecha single-pro-details -->
         </section>


<!-- FOOTER -->
<footer class="section-p1">
<div class="col">
<img class="logo" src="../images/logo_bv.png" alt="">
<div class="follow">
    <h4>Nos siga</h4>
    <div class="icon">
        <i class="fab fa-facebook-f fa-lg"></i>
        <i class="fab fa-twitter fa-lg"></i>
        <i class="fab fa-instagram fa-lg"></i>
        <i class="fab fa-youtube fa-lg"></i>
    </div> <!-- fecha icon -->
</div> <!-- fecha follow -->
</div> <!-- fecha col -->

<div class="col">
<h4>Sobre</h4>
    <a href="contato.php">Sobre nós</a>
    <a href="#">Informações de Entrega</a>                
    <a href="#">Política de Privaciade</a>
    <a href="#">Termos e Condições</a>
    <a href="contato.php">Nos contate</a>               
</div> <!-- fecha col -->

<div class="col">
<h4>Minha Conta</h4>
    <a href="cadastramento.php">Entrar</a>
    <a href="cliente.php">Meu Perfil</a>
    <a href="#cart">Ver Carrinho</a>                
    <a href="contato.php">Ajuda</a>               
    </div> <!-- fecha col -->

<div class="col install">
<h4>Pagamento</h4>
<p>Pagamento Seguro</p>
<img src="../images/pay.png" alt="">                              
</div> <!-- fecha col install -->

<div class="copyright">
<p style="color: #3b3b3b;">© 2024, Brisa Vinícola - TCC 3º infonet</p> 
</div> <!-- fecha copyright -->
</footer>

<script src="js/header.js"></script>
<script src="js/main.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        loadCartItems(); 
        updatetotal(); 
    });
</script>

</body>
</html>