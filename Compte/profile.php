<?php
session_start();
$Name = $_SESSION['Name'] ?? 'null';
$Pseudo = $_SESSION['Pseudo'] ?? 'null';
$Email = $_SESSION['Email'] ?? 'null';
$Type = $_SESSION['Type'] ?? 'null';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="../styles/hearder-sidebar.css">

    <link rel="stylesheet" href="../styles/styleCompte/styleCompte.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

<header>
    <div class="logo">
        <a id="sandwitch-icon" onclick="sidebar()">
            <i class="material-icons">menu</i>
        </a>
        <a href="../Accueil/index.php">
            logo
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher">
            </div>
        </nav>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <a href="../Accueil/index.php">Accueil</a>
    <a href="../Forum/">Forum</a>
    <a href="../Compte/profile.php">Compte</a>
    <a href="../Con-Ins/connexion.php">Connexion</a>
</div>

<div class="body">
    <p>logo</p>
    <label style="margin-bottom: 20px; color: white; font-size: 2em">
        <?php echo $Name ?></label>

    <div class="labels">
        <label class="label-left">Nom</label>
        <label class="label-right"><?php echo $Name ?></label>
    </div>
    <div class="labels">
        <label class="label-left">Pseudo</label>
        <label class="label-right"><?php echo $Pseudo ?></label>
    </div>
    <div class="labels">
        <label class="label-left">Email</label>
        <label class="label-right"><?php echo $Email ?></label>
    </div>
    <div class="labels">
        <label class="label-left">Type Compte</label>
        <label class="label-right"><?php echo $Type ?></label>
    </div>
    <div class="labels" id="logout">
        <a href="logout.php">logout</a>
    </div>
</div>

<script src="../styles/style.js"></script>
</body>

</html>