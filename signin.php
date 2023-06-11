
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Inscription</title>
</head>
<body>
    <div class="logo">
        <a href="index.php">
            <img src="images/logo.png" alt="">
        </a>
    </div>
    <div class="container">
        <div class="content">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Inscription</h1>
                <div class="form-container">
                    <div class="input-text">
                        <input type="text" placeholder="Nom complet" name="nom">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="input-text">
                        <input type="text" placeholder="Email" name="email">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-text">
                        <input type="text" placeholder="Pseudo" name="pseudo">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="input-text">
                        <input type="text" placeholder="Genre (M/F)" name="genre">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="input-text">
                        <input type="password" placeholder="Mot de passe" name="pwd">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <div class="input-text">
                        <input type="password" placeholder="Confirmation du mot de passe" name="pwd_c">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <div class="input-text">
                        <input type="text" placeholder="Pays" name="pays">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="input-text">
                        <input type="text" placeholder="Ville" name="ville">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="input-text">
                        <input type="date" name="date">
                    </div>
                    <div class="input-text">
                        <input type="file" name="photo" accept="image/*">
                    </div>
                    <input type="submit" value="S'inscrire'" class="submit" name="submit">
                    <p class="compte">Avez-vous déjà un compte ? <a href="login.php">Connectez-vous</a></p>
                </div>
            </form>


        </div>
    </div>
</body>
<?php
    require "includes/db.php";
    if (isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $genre = $_POST['genre'];
        $pwd = $_POST['pwd'];
        $pwd_c = $_POST['pwd_c'];
        $pays = $_POST['pays'];
        $ville = $_POST['ville'];
        $date = $_POST['date'];

        // Récupération des informations sur le fichier envoyé
        $photo = $_FILES['photo'];
        $filename = $photo['name'];
        $mime_type = $photo['type'];
        $image_data = file_get_contents($photo['tmp_name']);

        if(!isset($nom) || ($nom === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre nom!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }

        if(!isset($email) || ($email == "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre email!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($pseudo) || ($pseudo === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre pseudo!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($genre) || ($genre === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre genre!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($pwd) || ($pwd === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre mot de passe!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($ville) || ($ville === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre ville!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($pays) || ($pays === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre pays!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($date) || ($date === "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez entrer votre date!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($photo) || ($photo == "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez choisir une photo de profil!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(!isset($image_data) || ($image_data == "")){
            ?>
            <script>
            swal({
                title: "Champs vide",
                text: "Veillez choisir une photo de profil!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        if(isset($pwd_c) && isset($pwd) && ($pwd !== $pwd_c)){
            ?>
            <script>
            swal({
                title: "Champs non identique",
                text: "Mettez le même mot de passe!",
                icon: "error",
                button:false
              });
            </script>
           <?php
           die();
        }
        $st = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
        $st->execute([$pseudo]);
        $res = $st->fetch(PDO::FETCH_ASSOC);
        var_dump($res);
    if($pseudo == $res["pseudo"]){
        ?>
             <script>
            swal({
                title: "Pseudo existant",
                text: "Veillez choisir un autre!",
                icon: "error",
                button:false
              });
            </script>

        <?php

        die();
    }
  

    $filename = $photo['name'];
    $mime_type = $photo['type'];
    $image_data = file_get_contents($photo['tmp_name']);

    $query = "INSERT INTO users(nom, email, pseudo, genre, password, pays, ville, date,filename,mime_type, image_data) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $stm = $db->prepare($query);
    $resulset = $stm->execute([$nom, $email, $pseudo, $genre, $pwd,$pays,$ville,$date,$filename,$mime_type,$image_data]);
    if ($resulset){
        ?>

        <script>
            swal({
                title: "Connexion",
                text: "Compte crée avec succès ",
                icon: "success",
                button:false
              });
        </script>


    <?php

    }
    }
    

?>

</html>