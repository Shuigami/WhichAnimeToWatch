<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php include_once 'dbseconnect.php'; ?>
    <head>
        <title>My Account | Friends List :)</title>
        <link rel="shortcut icon" href="#" />
        <link rel="stylesheet" href="../home/css/styles-anime-page.css">
        <link rel="stylesheet" href="../home/css/iconStyles.css">
        <link rel="stylesheet" href="../home/css/style.css">
        <link rel="stylesheet" href="../home/css/title.css">
        <link rel="stylesheet" href="css/favorites.css">
        <link rel="stylesheet" href="css/friend_account.css">
        <link rel="stylesheet" href="css/account_all.css">
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
            $friend_page_cookie = "";
            if(!empty($_COOKIE['friend_page_cookie'])){
                $friend_page_cookie = $_COOKIE["friend_page_cookie"];
            }
            // Retrouver info utilisateur
            if(!empty($_COOKIE['friend_page_cookie']) || $friend_page_cookie != null){
                // Prepare our query to show the user their info
                $query = "SELECT name, country, email, password, phone, id, language, image, fav, friends, bio  FROM users WHERE id = $friend_page_cookie";
                $user = $conn->prepare($query);
                $user->execute();

                // Store the result
                $result = $user->fetch(PDO::FETCH_ASSOC);


                // Prepare our query to show the user their info
                $query = "SELECT friends  FROM users WHERE id = :user_id";
                $user = $conn->prepare($query);
                $user->bindValue(':user_id', $_SESSION['user_id']);
                $user->execute();

                // Store the result
                $result2 = $user->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="info_container">
                <div class="info_div">
                    <div class="info">
                        <?php echo "<div class='info_img_container'><div class='info_img'><img src='data:image/png;base64,".$result['image']."'></div></div>";?>
                        <?php echo "<div class='info_name'><h1>".$result['name']."</h1></div>";?>
                        <div class="info_right">
                            <?php if(($friend_page_cookie != $_SESSION['user_id'])){?>
                            <div class="add_btn" id="add_btn">
                                <a href="?friend_add">
                                    <img src="../mainimages/add-icon.png">
                                </a>
                            </div>
                            <?php 
                                if(isset($_GET['friend_add'])){
                                    $friends_array = preg_split("/[\s,]+/", $result2['friends']);
                                    if(!in_array($friend_page_cookie, $friends_array)){ // Si l'utilisateur n'est pas dans la liste d'amis
                                        if($friends_array[0] == ""){
                                            array_push($friends_array, $friend_page_cookie);
                                            $friends_string = implode("", $friends_array);
                                        } else {
                                            array_push($friends_array, $friend_page_cookie);
                                            $friends_string = implode(" , ", $friends_array);
                                        }
                                    } else {
                                        $old_friend = array_search($friend_page_cookie, $friends_array);
                                        unset($friends_array[$old_friend]);
                                        $friends_string = implode(" , ", $friends_array);
                                    }
                                    $sql = "UPDATE users SET friends ='$friends_string' WHERE id=:user_id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindValue(':user_id', $_SESSION['user_id']);
                                    $stmt->execute();
                                    echo "<script type='text/javascript'> document.location = 'friend_account.php'; </script>";
                                }
                            ?>
                            <?php echo "<script type='text/javascript'>IsFriend('".$result2['friends']."', '".$friend_page_cookie."')</script>"; ?>
                            <?php } else { ?>
                                <div class="add_btn" id="add_btn">
                                    <h1>Can't be friend with yourself</h1>
                                </div>
                            <?php } echo "<div class='info_country'><img src='../country-flags/".$result['country'].".png'></div>";?>
                        </div>
                    </div>
                    <div class="info_biography">
                        <h1 style="text-align:center; font-size: 1.6vw;">Biography</h1>
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
                <div class="border"></div>
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
        <?php } else {
            echo "<div class='page_expired'><div><h1>Page Expired :(</h1><h2>Please try again to search for this user <a href='users_search.php'>here</a></h2></div></div>";
        } ?>
    </body>
    <script src="../home/js/black-theme.js"></script>
    <script src='../home/js/categorie.js'></script>
    <script src="../home/js/friend.js"></script>
    <?php 
        if(!empty($_COOKIE['friend_page_cookie'])){
            if($result['fav'] == null) return;
            // Display favorites
            $array = preg_split("/[\s,]+/", $result['fav']);
            for($i = 0; $i < count($array); $i++){
                echo "<script type='text/javascript'>CreateCategory('../".$array[$i]."', 'a1')</script>";
            }
        }
    ?>
</html>