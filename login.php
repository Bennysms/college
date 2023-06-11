<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Connexion</title>
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
                <h1>Connexion</h1>
                <div class="input-text">
                    <input type="text" placeholder="Pseudo" name="login">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="input-text">
                    <input type="password" placeholder="Mot de passe" name ="pwd">
                    <i class="fa-solid fa-key"></i>
                </div>
                <input type="submit" value="Se connecter" class="submit" name="submit">
                <p class="compte">Vous n'avez pas de compte ? <a href="signin.php">Inscrivez-vous</a></p>
            </form>


        </div>
    </div>
</body>
<?php
require "includes/db.php";
if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    if (isset($login) && $login == "") {
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
    if (isset($pwd) && $pwd == "") {
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
    $st = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
    $st->execute([$login]);
    if($st->rowCount() > 0) {
        $res = $st->fetch(PDO::FETCH_ASSOC);
        if ($pwd == $res['password'] ) {
        $_SESSION['auth'] = true;
        $_SESSION['pseudo'] = $login;
        header('Location:compte.php');
        }
        else{
            ?>
                <script>
                swal({
                    title: "Identifiants incorrects",
                    text: "Pseudo ou mot passe incorrect!",
                    icon: "error",
                    button:false
                  });
            </script>
    
            <?php
            die();
        }

    }else{
        ?>
            <script>
            swal({
                title: "Compte non trouvé",
                text: "Ce compte n'existe pas",
                icon: "error",
                button:false
              });
        </script>
        <?php
        die();
    }
}


?>

</html>