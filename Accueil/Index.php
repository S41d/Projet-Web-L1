<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../header.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<header>
    <div class="logo">
        <a href="Index.php">
            <img src="../logo.jpeg" alt="logo">
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <a href="../Forum/Main.php">Forum</a>
            <a href="../Con-Ins/connexion.php" id="connexion">Connexion</a>
            <a href="../Compte/profile.php" id="compte">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30" placeholder="Rechercher">
            </div>
        </nav>
    </div>
</header>
<div class="body">
    <a href="" style="background-image: url(./Photos/Mr-robot.jpg) ;"></a>
    <a href="" style="background-image: url(./Photos/Tokyo-Ghoul.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Paprika.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Perfect-Blue.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Inception.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Vikings.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Persona-5.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Parasyte.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Toradora.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Interstellar.jpg);"></a>
    <a href="" style="background-image: url(./Photos/3d-kanojo.jpg);"></a>
    <a href="" style="background-image: url(./Photos/The-Originals.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Lucifer.jpg);"></a>
    <a href="" style="background-image: url(./Photos/The-Conjuring.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Intouchables.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Avatar.jpg);"></a>
    <a href="" style="background-image: url(./Photos/FMA.png);"></a>
    <a href="" style="background-image: url(./Photos/Nerve.jpg);"></a>
    <a href="" style="background-image: url(./Photos/The-Nightmare-Before-Christmas.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Coraline.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Jack.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Adventure-Time.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Song-Of-The-Sea.jpg);"></a>
    <a href="" style="background-image: url(./Photos/The-Secret-Of-Kells.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Mr-robot.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Tokyo-Ghoul.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Paprika.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Inception.jpg);"></a>
    <a href="" style="background-image: url(./Photos/The-Originals.jpg);"></a>
    <a href="" style="background-image: url(./Photos/Perfect-Blue.jpg);"></a>
</div>
<script src="script.js"></script>
<?php

if (isset($_SESSION['Iduser'], $_SESSION['Pseudo'])) {
    echo
    "</br> <script>
    function connexion() {
        let con = document.getElementById('connexion');
        con.style.display = \"none\";
    }
    connexion();
    </script>";
} else {
    echo
    "</br> <script>
    function compte () {
        let con = document.getElementById('compte');
        con.style.display = \"none\";
    }
    compte();
    </script>";
}
?>
</body>
</html>