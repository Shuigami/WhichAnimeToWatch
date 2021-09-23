<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php include_once 'dbseconnect.php'; ?>
    <head>
        <title>My Account | Friends List :)</title>
        <link rel="shortcut icon" href="#" />
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="../home/css/style.css">
        <link rel="stylesheet" href="../home/css/title.css">
        <link rel="stylesheet" href="css/friend_account.css">
        <link rel="stylesheet" href="css/account_all.css">
        <link rel="stylesheet" href="css/favorites.css">
        <link rel="stylesheet" href="css/account_overview.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
    </head>

    <script src="../home/js/friend.js"></script>
    <body>
        <?php include_once '../home/includes/title.php'; ?>
        <?php 
            // Retrouver info utilisateur
            if(isset($_SESSION['user_id'])){
                // Prepare our query to show the user their info
                $query = "SELECT name, country, email, password, phone, id, language, image, friends, fav, bio FROM users WHERE id = :user_id";
                $user = $conn->prepare($query);
                $user->bindValue(':user_id', $_SESSION['user_id']);
                $user->execute();

                // Store the result
                $result = $user->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container-account">
            <?php include_once 'includes/sidebar.php'; ?>
            <div class="info_container account_view" id="info_container">
                <div class="info_div">
                    <div class="title-account">
                        <h1>My Account</h1>
                        <p>Logout <a href="logout.php">here</a></p>
                    </div>
                    <div class="info">
                        <?php echo "<div class='info_img_container'><div class='info_img'><img src='data:image/png;base64,".$result['image']."'></div></div>";?>
                        <?php echo "<div class='info_name'><h1>".$result['name']."</h1></div>";?>
                        <?php echo "<div class='info_country'><img src='../country-flags/".$result['country'].".png'></div>";?>
                    </div>
                    <div class="info_biography">
                    <h1 style="text-align:center; font-size: 1.6vw;">Biography</h1>
                        <br>
                        <?php 
                            if(!empty($result['bio'])){
                                echo "<div class='info_bio'><p>".$result['bio']."</p></div>";
                            } else {
                                echo "<div class='info_bio'><p style='text-align:center'> This user has no biography :( </p></div>";
                            }
                        ?>
                    </div>
                    <div class="info_favorites">
                        <h1 style="text-align:center; font-size: 1.6vw;">Favorites</h1>
                        <ul class="favorites-list" id="categories a1">
                        <?php 
                            if($result['fav'] == null){
                                echo "<div class='info_bio'><p style='text-align:center'> This user has no favorites :( </p></div>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="friends" id="friends-list">
                    <h1 style="text-align:center; border-bottom: 0.2vw solid var(--text-primary); margin-bottom: 1vw;">Friends</h1>
                    <?php 
                        if($result['friends'] != null){
                        // Display favorites
                
                        $array = preg_split("/[\s,]+/", $result['friends']);
                        for($i = 0; $i < count($array); $i++){
                            $friends_id = $array[$i];
                            $query = "SELECT name, id, image  FROM users WHERE id = $friends_id";
                            $user = $conn->prepare($query);
                            $user->execute();
                
                            // Store the result
                            $result2 = $user->fetch(PDO::FETCH_ASSOC);
                            $id = $result2['id'];
                            $name = $result2['name'];
                            $image = $result2['image'];
                            echo "<script type='text/javascript'>FriendListInFriendPage('$id','$name','$image');</script>";
                        }
                    } else {
                        if($result['fav'] == null){
                            echo "<div class='info_bio'><p style='text-align:center'> This user has no friends :( </p></div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php } else{
        ?>
            <h1> You're not logged in </h1>
            <p>Already have an account? <a href="login.php">Login Here</a></p>
        <?php
            }
        ?>
    </body>
    <script src="../home/js/black-theme.js"></script>
    <script src='../home/js/categorie.js'></script>
    <script src="../home/js/friend.js"></script>
    <?php 
        if(!isset($_SESSION['user_id'])) return;
        if($result['fav'] == null) return;
        // Display favorites
        $array = preg_split("/[\s,]+/", $result['fav']);
        for($i = 0; $i < count($array); $i++){
            echo "<script type='text/javascript'>CreateCategory('../".$array[$i]."', 'a1')</script>";
        }
    ?>
</html>