<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php include_once 'dbseconnect.php'; ?>
    <head>
        <title>My Account | Favorites :)</title>
        <link rel="shortcut icon" href="#" />
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="../home/css/styles-anime-page.css">
        <link rel="stylesheet" href="../home/css/style.css">
        <link rel="stylesheet" href="../home/css/iconStyles.css">
        <link rel="stylesheet" href="../home/css/title.css">
        <link rel="stylesheet" href="css/account_all.css">
        <link rel="stylesheet" href="css/favorites.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
    </head>
    
    <body>
    
        <?php include_once '../home/includes/title.php'; ?>
        <?php 
            // Retrouver info utilisateur
            if(isset($_SESSION['user_id'])){
                // Prepare our query to show the user their info
                $query = "SELECT fav FROM users WHERE id = :user_id";
                $user = $conn->prepare($query);
                $user->bindValue(':user_id', $_SESSION['user_id']);
                $user->execute();

                // Store the result
                $result = $user->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container-account">
            <?php include_once 'includes/sidebar.php'; ?>
            <div class="favorites-div" id="info_container">
                <ul class="favorites-list" id="categories a1">
                </ul>
            </div>
        </div>

        <?php
            } else{
        ?>
            <h1> You're not logged in </h1>
            <p>Already have an account? <a href="login.php">Login Here</a></p>
        <?php
            }
        ?>
    </body>

    <script src="../home/js/black-theme.js"></script>
    <script src='../home/js/categorie.js'></script>
    <?php 
        if($result['fav'] == null) return;
        // Display favorites
        $array = preg_split("/[\s,]+/", $result['fav']);
        for($i = 0; $i < count($array); $i++){
            echo "<script type='text/javascript'>CreateCategory('../".$array[$i]."', 'a1')</script>";
        }
    ?>
    
</html>