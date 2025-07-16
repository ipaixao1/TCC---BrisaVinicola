<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brisa Vinícola | Home</title>
    <link rel="stylesheet" href="view/css/estilo.css">
    <link rel="stylesheet" href="view/css/cart.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script> <!-- Plugin de Libras -->
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
        document.cookie = "nome=valor; expires=Sat, 01 Jan 2025 12:00:00 UTC; path=/";
    </script>
</head>

<body>

<!--header section starts-->
<div class="background">
    
<section id="header">

    <a href="adm/index.php"><img src="images/logo.png" class="logo" alt="Logotipo da Brisa Vinícola" title="Logotipo Brisa Vinícola"></a>
    <div>
    <ul id="navbar">
            <li class="link"><a href="index.php">Home</a></li>
            <li class="link"><a href="view/shop.php">Nossos Vinhos</a></li>
            <li class="link"><a href="view/contato.php">Sobre Nós</a></li>
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
        <a href="view/cadastramento.php" style="margin-right: 15px;"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg></a>
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
        <!-- Botões de Acessibilidade -->
<div class="acessibilidade">
    <button onclick="aumentarFonte()">A+</button>
    <button onclick="diminuirFonte()">A-</button>
    <button onclick="lerTexto()">🔊</button>
</div>
</section>

<!--home section starts-->
<section class="home" id="home">
    <div class="content">
        <h3>Nossos Vinhos</h3>
        <p id="texto">Na Brisa Vinícola, cada vinho é uma expressão autêntica do nosso terroir. Combinando tradição e paixão, criamos vinhos que encantam pelos sabores únicos e pela qualidade inigualável. Explore nossa seleção e descubra o prazer de degustar o melhor da nossa vinícola.</p>
        <a href="view/contato.php" class="btn">Saiba mais</a>
    </div>
</section>
</div>

<!-- JS Acessibilidade -->
<script>
    let tamanhoFonte = 16;

    function aumentarFonte() {
        tamanhoFonte += 2;
        document.body.style.fontSize = `${tamanhoFonte}px`;
    }

    function diminuirFonte() {
        if (tamanhoFonte > 10) {
            tamanhoFonte -= 2;
            document.body.style.fontSize = `${tamanhoFonte}px`;
        }
    }

    function lerTexto() {
        const texto = document.getElementById("texto").innerText;
        const speech = new SpeechSynthesisUtterance(texto);
        window.speechSynthesis.speak(speech);
    }
</script>

 <!--fecha header-->
 
<!-- Produtos sections starts-->   
<section class="about" id="about"> 
    <div class="title-about">
        <h1 class="title-heading">PRODUTOS</h1>
        <h2 class="wine">Qual tipo de vinho você está procurando?</h2>
    </div>
    <div class="type-wine">
        <div class="card-deck">
            <a href="view/shop.php">
                <div class="card">
                    <div class="img-box">
                        <img src="images/vinho-branco-2.png" alt="Vinho Branco" title="Imagem de uma garrafa de vinho branco">
                    </div>
                    <div class="content">
                        <h2>Branco</h2>
                        <p>
                            Feito de uvas verdes ou sem casca, o vinho branco é refrescante e possui sabores cítricos e frutados.
                        </p>
                    </div>
                </div>
            </a>
            <a href="view/shop.php">
                <div class="card">
                    <div class="img-box">
                        <img src="images/vinho-tinto-4.png" alt="Vinho Tinto" title="Imagem de uma garrafa de vinho tinto">
                    </div>
                    <div class="content">
                        <h2>Tinto</h2>
                        <p>
                            Feito a partir de uvas escuras, o vinho tinto tem sabores que variam de frutas vermelhas a especiarias.
                        </p>
                    </div>
                </div>
            </a>
            <a href="view/shop.php">
                <div class="card">
                    <div class="img-box">
                        <img src="images/espumante-1.png" alt="Vinho Espumante" title="Imagem de uma garrafa de vinho espumante">
                    </div>
                    <div class="content">
                        <h2>Espumante</h2>
                        <p>
                            Conhecido por suas bolhas, o espumante é produzido através de uma segunda fermentação.
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- Produtos section ends-->

<!-- Novidades section starts-->

        <h1 class="title-heading"> NOVIDADES </h1>
        <section class="card-deck-2">
            <div class="card-2">
                <div class="img-box-2">
                    <a href="#tintos-promocaoo"><img src="images/card1.png"></a>
                </div>
                <div class="content-news">
                    <a href="#tintos-promocaoo" class="content-news-p">Ofertas do momento!</a>
                </div>
            </div>

            <div class="card-2">
                <div class="img-box-2">
                    <a href="#mais-vendidos"><img src="images/card2.png"></a>
                </div>
                <div class="content-news">
                <a href="#mais-vendidos" class="content-news-p">Conheça os vinhos mais procurados</a>
                </div>
            </div>
        </section>

 <!-- Novidades section ends-->

<!--- Sessão de promoções starts --->

        <section class="card-deck-3">
            <h1 class="title-main">Tintos na Promoção</h1>
            <p id="tintos-promocaoo">Ótimos vinhos à preços excelentes</p>
        </section>

        <section class="promo-cards">
        <div style="background-image: url(images/background-card-dark.png);" class="promo-card">
        <div class="card-container">
                    <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
                    <a href="view/shop.php"><img src="images/vinho-tinto-4.png" alt="Vinho" class="wine-image-correct"></a>
                    <div class="preco">
                        <span class="preco-atual">R$149,90</span><br>
                        <span class="preco-anterior">R$ 199,90</span>
                    </div> <!-- fecha preco -->
                </div> <!-- fecha card-container -->
                <div class="card-description-promo">
                    <h4>Pogio Marù Primitivo 2020</h4>
                    <p>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" class="country-flag" alt="Flag">
                        Primitivo di Manduria, Itália
                    </p>
                </div>
            </div>
    
            <div style="background-image: url(images/background-card-dark.png);" class="promo-card">
                <div class="card-container">
                <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
                <a href="view/shop.php"><img src="images/vinho-branco-1.png" alt="Vinho" class="wine-image-correct"></a>
                    <div class="preco">
                        <span class="preco-atual">R$129,99</span><br>
                        <span class="preco-anterior">R$ 149,90</span>
                    </div>
                </div>
                <div class="card-description-promo">
                    <h4>Pogio Marù Primitivo 2020</h4>
                    <p>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" class="country-flag" alt="France Flag">
                        Primitivo di Manduria, França
                    </p>
                </div>
            </div>
    
            <div style="background-image: url(images/background-card-dark.png);" class="promo-card">
                <div class="card-container">
                    <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
                    <a href="view/shop.php"><img src="images/espumante-2.png" alt="Vinho" class="wine-image-correct"></a>
                    <div class="preco">
                        <span class="preco-atual">R$199,90</span><br>
                        <span class="preco-anterior">R$ 229,90</span>
                    </div>
                </div>
                <div class="card-description-promo">
                    <h4>Pogio Marù Primitivo 2020</h4>
                    <p>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Flag_of_Portugal.svg" class="country-flag" alt="Portugal Flag">
                        Primitivo di Manduria, Portugal
                    </p>
                </div>
            </div>

            <div style="background-image: url(images/background-card-dark.png);" class="promo-card">
                <div class="card-container">
                    <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
                    <a href="view/shop.php"><img src="images/vinho-tinto-3.png" alt="Vinho" class="wine-image-correct"></a>
                    <div class="preco">
                        <span class="preco-atual">R$99,90</span><br>
                        <span class="preco-anterior">R$ 119,90</span>
                    </div>
                </div>
                <div class="card-description-promo">
                    <h4>Pogio Marù Primitivo 2020</h4>
                    <p>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg" class="country-flag" alt="Spain Flag">
                        Primitivo di Manduria, Espanha
                    </p>
                </div>
            </div>
        </section>

<!-- Vídeo starts -->
        <div class="video-container">
            <video autoplay loop muted playsinline>
                <source src="images/video1.mp4" type="video/mp4">
            </video>
            <div class="overlay">
                <div class="content-video">
                    <h2>Nossos Vinhos</h2>
                    <p>Na Brisa Vinícola, cada vinho é uma expressão autêntica do nosso terroir. Combinando tradição e paixão, criamos vinhos que encantam pelos sabores únicos e pela qualidade inigualável. Explore nossa seleção e descubra o prazer de degustar o melhor da nossa vinícola.</p>
                    <a href="view/contato.php"><button>Saiba Mais</button></a>
                </div>
            </div>
        </div>
<!-- Vídeo ends -->

<!-- Os mais vendidos starts -->
<section class="card-deck-3">
    <h1 class="title-main">Os mais vendidos</h1>
    <p id="mais-vendidos">Os melhores vinhos à preços excelentes</p>
</section>

<section class="ofertas-container">
<div style="background-image: url(images/background-card-dark.png);" class="oferta-item">
<div class="item-wrapper">
            <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
            <a href="view/shop.php"><img src="images/vinho-tinto-1.png" alt="Vinho" class="imagem-vinho"></a>
            <div class="avaliacao-item">
                <span class="valor-avaliacao">5,0</span>
                <span class="estrelas-avaliacao">★★★★★</span><br>
                <small>241 Avaliações</small>
            </div>
        </div>
        <div class="descricao-item">
            <h4>Cune Crianza 2019</h4>
            <p>
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Spain.svg" class="country-flag" alt="Spain Flag">
                Rioja, Haro, Espanha
            </p>
        </div>
    </div>

    <div style="background-image: url(images/background-card-dark.png);" class="oferta-item">
    <div class="item-wrapper">
            <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
            <a href="view/shop.php"><img src="images/branco2.png" alt="Vinho" class="imagem-vinho"></a>
            <div class="avaliacao-item">
                <span class="valor-avaliacao">5,0</span>   
                <span class="estrelas-avaliacao">★★★★★</span><br>
                <small>241 Avaliações</small>
            </div>
        </div>
        <div class="descricao-item">
            <h4>Alamos Malbec 2020</h4>
            <p>
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg" class="country-flag" alt="Argentina Flag">
                Mendoza, Luján de Cuyo, Argentina
            </p>
        </div>
    </div>

    <div style="background-image: url(images/background-card-dark.png);" class="oferta-item">
    <div class="item-wrapper">
            <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
            <a href="view/shop.php"><img src="images/tinto5.png" alt="Vinho" class="imagem-vinho"></a>
            <div class="avaliacao-item">
                <span class="valor-avaliacao">5,0</span>   
                <span class="estrelas-avaliacao">★★★★★</span><br>
                <small>241 Avaliações</small>
            </div>
        </div>
        <div class="descricao-item">
            <h4>Banfi Chianti Classico</h4>
            <p>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" class="bandeira-pais" alt="Flag">
                Toscana, Montalcino, Itália
            </p>
        </div>
    </div>

    <div style="background-image: url(images/background-card-dark.png);" class="oferta-item">
    <div class="item-wrapper">
            <span class="promo-discount"><img src="images/desconto-figura_vermelha-removebg-preview.png"></span>
            <a href="view/shop.php"><img src="images/espumante-1.png" alt="Vinho" class="imagem-vinho"></a>
            <div class="avaliacao-item">
                <span class="valor-avaliacao">5,0</span>   
                <span class="estrelas-avaliacao">★★★★★</span><br>
                <small>241 Avaliações</small>
            </div>
        </div>
        <div class="descricao-item">
            <h4>Louis Jadot Beaujolais-Villages</h4>
            <p>
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" class="country-flag" alt="France Flag">
            Beaujolais, França
            </p>
        </div>
    </div>
</section>
<!-- Os mais vendidos ends -->

<!-- FOOTER -->
<footer class="section-p1">
<div class="col">
<img class="logo" src="images/logo_bv.png" alt="">
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
    <a href="view/contato.php">Sobre nós</a>
    <a href="#">Informações de Entrega</a>                
    <a href="#">Política de Privaciade</a>
    <a href="#">Termos e Condições</a>
    <a href="view/contato.php">Nos contate</a>               
</div> <!-- fecha col -->

<div class="col"> 
<h4>Minha Conta</h4>
    <a href="view/cadastramento.php">Entrar</a>
    <a href="view/cliente.php">Meu Perfil</a>
    <a href="#cart">Ver Carrinho</a>                
    <a href="view/contato.php">Ajuda</a>               
    </div> <!-- fecha col -->

<div class="col install">
<h4>Pagamento</h4>
<p>Pagamento Seguro</p>
<img src="images/pay.png" alt="">                              
</div> <!-- fecha col install -->


<div class="copyright">
<p style="color: #3b3b3b;">© 2024, Brisa Vinícola - TCC 3º infonet</p> 
</div> <!-- fecha copyright -->
</footer>

<div id="cookie-banner" class="cookie-banner">
        <p>Este site utiliza cookies para melhorar a sua experiência. <a href="#">Saiba mais</a></p>
        <button id="accept-cookies" class="cookie-btn">Aceitar todos os cookies</button>
        <button id="reject-cookies" class="cookie-btn">Rejeitar todos os cookies</button>
    </div>

<script src="view/js/header.js"></script>
<script src="view/js/main.js"></script>
<script src="view/js/script.js"></script>
</body>
</html>