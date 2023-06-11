<?php
    session_start();
    $_SESSION['auth'] = false;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <title>Page d'acceuil</title>
</head>
<body>
    <div class="header">
        <a href="" class="logo">
            <img src="images/logo.png" alt="" srcset="">
        </a>
        <nav class="nav">
            <div class="links">
                <a href="">Home</a>
                <a href="">Services</a>
                <a href="">About</a>
                <a href="">Contacts</a>
            </div>
            <div class="socials">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </nav>
    </div>
    <main class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide-video">
                <video src="images/vd.mp4" class="slide" autoplay></video>
            </div>
            <div class="swiper-slide">
                <img src="images/img1.jpg" class="slide" alt="">
            </div>
            <div class="swiper-slide">
                <img src="images/img2.jpg" class="slide" alt="">
            </div>
            <div class="swiper-slide">
                <img src="images/img3.jpg" class="slide" alt="">
            </div>
            
        </div>
        <div class="swiper-pagination">
        </div>

        <div class="content">
            <div class="content-text">
                <p class="welcom">Bienvenue</p>
                <h1 class="title">Vous n'êtes pas seuls Votre choix compte</h1>
                <p class="para">Une communauté forte basée sur l'entraide et la valorisation de la diversité dans tous les domaines</p>
            <div class="btnGroup">
                <a href="login.php" class="login">se connecter</a>
                <a href="signin.php" class="singin">s'inscrire</a>
            </div>
            </div>
            
        </div>
    </main>
    <footer>
        <div class="box b1">
            <h2>Give inspiration</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, delectus! Qui voluptatibus unde necessitatibus iure facilis veritatis. A recusandae quasi necessitatibus, quae atque similique, quidem nisi obcaecati reprehenderit, quaerat dolor harum eos rem dolorem maxime eveniet sit cum numquam repellendus.</p>
        </div>
        <div class="box b2">
            <h2>Give inspiration</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, delectus! Qui voluptatibus unde necessitatibus iure facilis veritatis. A recusandae quasi necessitatibus, quae atque similique, quidem nisi obcaecati reprehenderit, quaerat dolor harum eos rem dolorem maxime eveniet sit cum numquam repellendus.</p>

        </div>
        <div class="box b3">
            <h2>Give inspiration</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, delectus! Qui voluptatibus unde necessitatibus iure facilis veritatis. A recusandae quasi necessitatibus, quae atque similique, quidem nisi obcaecati reprehenderit, quaerat dolor harum eos rem dolorem maxime eveniet sit cum numquam repellendus.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
        delay: 5000, // Temps en millisecondes entre chaque diapositive
        disableOnInteraction: false, // Autorise l'autoplay même si l'utilisateur interagit avec le slider
        },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
        });

        
    </script>
</body>
</html>