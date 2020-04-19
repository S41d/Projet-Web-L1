<?php
session_start();

$database = new mysqli( 'localhost', 'root', '', 'projet' );
$idsub = $_GET['idsub'];
$querysub = "Select * from sub where idsub=$idsub";
$resultsub = $database -> query( $querysub );
$sub = $resultsub -> fetch_assoc();

$photoSub = $sub['photo-sub'];
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sub['namesub']; ?></title>
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/styleForum/forumStyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="transitionsForum.css">
    <script defer src="../node_modules/swup/dist/swup.min.js"></script>
    <script defer src="pageTransitionsEnable.js"></script>
    <script>
        window.onunload = function () {
        }
    </script>
    <script defer src="../styles/style.js"></script>
    <script defer src="searchForum.js"></script>
    <script defer src="../sessionCheck.js"></script>
    <script defer src="comments/newComment.js"></script>
</head>
<body>

<header>
    <div class="logo">
        <a id="sandwitch-icon" onclick="sidebar()">
            <i class="material-icons">menu</i>
        </a>
        <a href="index.php">
            logo
        </a>
    </div>
    <div class="nav">
        <nav id="nav">
            <a href="../Con-Ins/connexion.php" class="connexionButton">Connexion</a>
            <a href="../Compte/profile.php" class="compteButton">Compte</a>
            <div class="search">
                <a id="rechercher" onclick="bar_de_recherche()">
                    <i class="material-icons">search</i>
                </a>
                <input type="text" id="barderechercher" size="30"
                       placeholder="Rechercher" onkeyup="searchForum()">
            </div>
        </nav>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <a href="../Accueil/index.php">Accueil</a>
    <a href="../Forum/">Forum</a>
    <a class="compteButton" href="../Compte/profile.php">Compte</a>
    <a class="connexionButton" href="../Con-Ins/connexion.php">Connexion</a>
</div>

<div class="body" id="body">
    <main id="swup" class="transition-fade-scale">
        <div class="description">
            <div class="img"><img src="<?php echo $photoSub; ?>" alt=""></div>
            <div class="text">
                <?php
                $subName = $sub['namesub'];
                $subDescription = $sub['description'];
                echo "<title>$subName</title>";
                echo "<description>$subDescription</description>";
                ?>
            </div>
        </div>
        <div class="Posts">
            <?php
            $query = "Select * from posts where idsub=$idsub order by Date DESC ";
            $result = $database -> query( $query );
            echo '<a style="animation-delay: 0.2s" href="createPost.php?Id=' . $idsub . '" class="newBtn" id="newBtn">New Post</a>';
            $delai = 0.3;
            while ($posts = $result -> fetch_assoc()) {
                echo '<a style="animation-delay:' . $delai . 's" href="/Projet-Web-L1/Forum/Posts.php?id=' . $posts['Idpost'] . '">';
                echo '<div class="Title">' . $posts['Title'] . '<date>' . $posts['Date'] . '</date>' . '</div>';
                echo '<div class="post"> <p>' . $posts['Body'] . '</p> <img src="' . $posts['Photo'] . '" alt="">' . '</div>';
                echo '</a>';
                $delai += 0.1;
            }
            ?>
        </div>
    </main>
</div>

</body>
</html>
