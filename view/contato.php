<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://kit.fontawesome.com/213b66396f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> <!-- fontawesome -->    <title>Brisa Vinícola | Contato </title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
</head>
<body>
    <div class="background">
    
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
        <!-- about us-->
        <section class="about" id="about">
           <H1 class="heading"> Sobre Nós </H1>
           <div class="row">

            <div class="image">
                <img src="../images/videira1.jpeg" alt="">
            </div>

            <div class="content1">
                <h3>Qualidade, Tradição e Sustentabilidade em Cada Gole</h3>
                <p> A Brisa Vinícola é uma empresa especializada na revenda de vinhos de alta qualidade, selecionados de vinícolas renomadas de todo o mundo. Fundada por um grupo de amigos apaixonados pelo universo do vinho, seu objetivo é proporcionar aos clientes experiências únicas, oferecendo uma variedade de rótulos para diferentes gostos e ocasiões.</p>
                <p>A empresa se destaca não só pela curadoria cuidadosa de vinhos, mas também pelo seu compromisso em educar os apreciadores, promovendo degustações, harmonizações e eventos sobre o mundo do vinho. Além disso, a Brisa Vinícola valoriza práticas sustentáveis e apoia vinícolas que respeitam o meio ambiente.
                Com uma plataforma de vendas online e um atendimento personalizado, a Brisa Vinícola se tornou uma referência no mercado, oferecendo aos seus clientes não apenas vinhos, mas momentos inesquecíveis.</p>
            </div>
        </div>
          <div class="row" style="margin-top: 30px;">
            <div class="content1">
                <h3> Fonte de Vinhos Excepcionais e Experiências Inesquecíveis</h3>
                <p> Nossa visão é ser reconhecida como a principal revendedora de vinhos, trazendo os melhores rótulos diretamente para os copos dos nossos clientes. Valorizamos a sustentabilidade e trabalhamos com vinícolas que respeitam o meio ambiente. Além de revender vinhos, oferecemos consultoria personalizada, eventos de degustação e conteúdo educativo sobre o mundo do vinho.</p>

                <p>Na Brisa Vinícola, cada vinho é mais do que uma bebida, é uma experiência de sabor e cultura, e nosso compromisso é garantir que cada cliente tenha a melhor experiência possível.</p>
            </div>
            <div class="image">
                <img src="../images/armazem.jpeg" alt="" style="border-radius: 0 15px 15px 0;">
            </div>
        </div>
        </section>

    <!--contato-->
    <section class="contact">
        <div class="content">
            <h2>Entre em Contato</h2>
            <p> Se você tiver alguma dúvida ou precisar de ajuda para escolher o vinho perfeito, nossa equipe está pronta para ajudá-lo. Entre em contato conosco e descubra o prazer de viver o mundo do vinho com a Brisa Vinícola.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text">
                        <h3>Endereço</h3>
                        <p>Jornalista Roberto Marinho</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>brisavinicola@gmail.com</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3>Telefone</h3>
                        <p>8002-8922</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form>
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="" required>
                        <span>Type your Message..</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
            </div>
        </div>
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
        <a href="sobre.php">Sobre nós</a>
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
</body>
</html>