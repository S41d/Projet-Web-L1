<?php

$bdd = new PDO('mysql:host=127.0.0.1; dbname=projet', 'root', '');

if (isset($_POST['inscris'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);

    if (!empty($_POST['nom']) and !empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mdp']) and !empty($_POST['mdp2'])) {
        $nomlength = strlen($nom);
        $pseudolength = strlen($pseudo);
        if ($nomlength <= 50) {

            if ($pseudolength <= 30) {
                $reqpseudo = $bdd->prepare("SELECT * FROM users WHERE Pseudo = ?");
                $reqpseudo->execute(array($pseudo));
                $pseudoexist = $reqpseudo->rowCount();
                if ($pseudoexist == 0) {

                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $reqmail = $bdd->prepare("SELECT * FROM users WHERE Email = ?");
                        $reqmail->execute(array($mail));
                        $mailexist = $reqmail->rowCount();
                        if ($mailexist == 0) {
                            if ($_POST['mdp'] == $_POST['mdp2']) {

                                $insertuser = $bdd->prepare("INSERT INTO users(Name, Pseudo, Email, Password) VALUES (?, ?, ?, ?)");
                                $insertuser->execute(array($nom, $pseudo, $mail, $mdp));
                                $erreur = "Compte créer!";

                            } else {
                                $erreur = "Les mots de passes ne correspondent pas!";
                            }
                        } else {
                            $erreur = "L'adresse mail est déjà utilisée!";
                        }
                    } else {
                        $erreur = "L'adresse mail n'est pas valide!";
                    }
                } else {
                    $erreur = "Désolé, ce pseudo est déjà pris!";
                }
            } else {
                $erreur = "Le pseudo doit contenir 30 caractères mamimum!";
            }

        } else {
            $erreur = "Le nom doit faire 50 caractères maximum!";
        }

    } else {
        $erreur = "Il faut compléter tous les champs!";
    }

}

?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="stylesheet" href="../styles/styleConIns/styleConnIns.css">
</head>
<body>


<form autocomplete="off" action="inscrire.php" method="post">
    <div class="box">
        <h1>Inscription</h1>
        <input autocomplete="off" type="text" name="nom" placeholder="Votre nom" style="animation-delay:0.7s"
               id="nom"
               value="<?php if (isset($nom)) {
                   echo $nom;
               } ?>">

        <input autocomplete="off" type="text" name="pseudo" id="pseudo" style="animation-delay:0.8s"
               placeholder="Votre pseudo"
               value="<?php if (isset($pseudo)) {
                   echo $pseudo;
               } ?>">
        <input autocomplete="off" type="email" name="mail" id="mail" style="animation-delay:0.9s"
               placeholder="Votre email"
               value="<?php if (isset($mail)) {
                   echo $mail;
               } ?>">
        <input type="password" name="mdp" id="mdp" placeholder="*****" style="animation-delay:1s">
        <input type="password" name="mdp2" id="mdp2" placeholder="*****" style="animation-delay:1.1s">
        <input type="submit" name="inscris" value="S'inscrire">
        <p>Vous avez un compte? <a href="connexion.php"> Connectez-vous</a></p>
    </div>
</form>

<?php
if (isset($erreur)) {
    echo $erreur;
}
?>
</body>
</html>
