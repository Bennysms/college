<?php
    session_start();
    if (!($_SESSION['auth'])){
        header('Location:index.php');
    }
    require "includes/db.php";
    $login = $_SESSION['pseudo'];
    $st = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
    $st->execute([$login]);
    $res = $st->fetch(PDO::FETCH_ASSOC);

    $email = $res['email'];
    $pays = $res['pays'];
    $ville = $res['ville'];

    $imageData = $res['image_data'];
    // Génération d'un nom de fichier unique
    $filename = $res['id'] . '_' . time() . '.jpg';
    // Chemin d'accès complet vers le dossier "uploads"
    $uploadPath = 'uploads/' . $filename;
    // Écriture des données binaires dans le fichier
    file_put_contents($uploadPath, $imageData);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/compte.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Bienvenue</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="">
                <img src="images/logo.png" alt="" srcset="">
            </a>
            <h2 class="title"><?=$login?></h2>
        </div>
        <i class="fa-solid fa-user" id="user"></i>
        <div class="profil">
            <?php
                if (file_exists($uploadPath)) {

                echo'<img src="' . $uploadPath . '" alt="Photo de profil">';
                  }
            ?>
            <p><?=$email?></p>
            <p><?=$ville?></p>
            <p><?=$pays?></p>
            <a href="logout.php" class="logout">Déconnexion</a>
        </div>
    </div>


    <section class="main">
        <div class="left">
            <div class="ong">
                <h2>Nom ong</h2>
                <p>Quelques mots</p>
                <a href="">Contacts</a>
            </div>
            <div class="ong">
                <h2>Nom ong</h2>
                <p>Quelques mots</p>
                <a href="">Contacts</a>
            </div>
            <div class="ong">
                <h2>Nom ong</h2>
                <p>Quelques mots</p>
                <a href="">Contacts</a>
            </div>
        </div>
        <div class="center">
            <div class="publication ">
                <div class="profil-content">
                    <img src="images/profil.jpg" alt="" srcset="">
                        
                    <form method="POST" enctype="multipart/form-data" action="">
                        <label for="titre">Titre :</label>
                        <input type="text" name="titre" id="titre" required>

                        <label for="texte">Votre publication :</label>
                        <textarea name="texte" id="texte" required></textarea>

                        <label for="photo">Photo :</label>
                        <input type="file" name="photo" id="photo" accept="image/jpeg, image/png" required>

                        <input type="submit" value="Publier"></input>
                    </form>

                </div>
            </div>
            <div class="contenu-user">
                <img src="images/profil.jpg" alt="" srcset="" class="img-user">
                <div class="user-text">
                    <h2 class="titre-user">Lorem, ipsum dolor.</h2>
                    <p class="message-user">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto ipsum incidunt repellat velit at minima dignissimos quae quam officia illum laboriosam eveniet numquam ducimus eaque, sint nihil fuga aspernatur libero deserunt nulla. Dolor assumenda tempora, dolores sed eligendi mollitia recusandae impedit illo natus laborum, tempore suscipit incidunt, quam non animi. Tempora non nesciunt beatae id, eos nihil cumque corporis libero delectus inventore optio exercitationem, asperiores repudiandae. Earum, perferendis!</p>
                    <img src="images/img3.jpg" alt="" class="img-content"> 
                </div> 
            </div>
        </div>
        <div class="right">
        <div class="ong">
                <h2>Nom ong</h2>
                <p>Quelques mots</p>
                <a href="">Contacts</a>
            </div>
            <div class="ong">
                <h2>Nom ong</h2>
                <p>Quelques mots</p>
                <a href="">Contacts</a>
            </div>
            <div class="ong">
                <h2>Nom ong</h2>
                <p>Quelques mots</p>
                <a href="">Contacts</a>
            </div>
        </div>
    </section>
        

<script>
    const user = document.getElementById('user');
    const profil = document.querySelector('.profil');

    user.addEventListener('click', () =>{
        profil.classList.toggle('active');
    })
</script>


</html>