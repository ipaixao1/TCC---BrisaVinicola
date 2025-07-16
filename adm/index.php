<?php
require "controllers/admManager.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager = new admManager();
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $manager->loginAdm( $email, $senha);
    header("Location: views/adm.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM | Brisa Vinícola</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo_bv.png"> <!-- favicon -->
    <link rel="stylesheet" href="css/adm.css">
    <link rel="stylesheet" href="css/perfil.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=GFS+Didot&family=Pinyon+Script&family=Poppins:wght@200;300;400&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
@import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");


        :root {
    --black: #0B0B0B;
    --black1: #000;
    --beige: #C0A788;
    --white: #1f2124;
    --white2: #d3d3d3;
    --gray: #5e5e5e;
  }
  body{
    background-color: var(--black);
  }
        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: var(--black);
            font-family: "Poppins", sans-serif; 
        }

        .login-logo {
            margin-bottom: 20px;
        }

        .login-logo img {
            width: 100px;
            height: auto;
        }

        .login-form {
            background-color: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
        }

        .login-form h2 {
            text-align: center;
            color: var(--beige);
            margin-bottom: 20px;
        }

        .login-form label {
            margin-bottom: 5px;
            color: var(--white2);
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--black);
            border-radius: 5px;
        }

        .login-form button {
            padding: 10px;
            background-color: var(--black);
            color: var(--beige);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            weight: 800;
            font-size: 1rem;
        }

        .login-form button:hover {
            background-color: var(--beige);
            color: var(--black);
        }
        .login-form input{
            background-color: var(--gray);
            color: var(--white2);
            border-color: var(--gray);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
        <a href="../index.php"><img src="views/img_cart/logo_bv.png" alt="Brisa Vinícola"></a>
        </div>
        <form class="login-form" method="post" name="loginform">
            <h2>Administração</h2>
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Entrar</button>
        </form>
    </div>

   
</body>
</html>
