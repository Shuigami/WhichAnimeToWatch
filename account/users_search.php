<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php include_once 'dbseconnect.php'; ?>
    <head>
        <title>My Account | Friends List :)</title>
        <link rel="shortcut icon" href="#" />
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="../home/css/styles-anime-page.css">
        <link rel="stylesheet" href="../home/css/iconStyles.css">
        <link rel="stylesheet" href="../home/css/title.css">
        <link rel="stylesheet" href="css/account_all.css">
        <link rel="stylesheet" href="css/friend_search.css">
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
                $query = "SELECT name, country, email, password, phone, id, language, image, friends  FROM users WHERE id = :user_id";
                $user = $conn->prepare($query);
                $user->bindValue(':user_id', $_SESSION['user_id']);
                $user->execute();

                // Store the result
                $result = $user->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="container-account">
            <?php include_once 'includes/sidebar.php'; ?>     
            <div class="else" id="else">
                <div class="container-search">
                    <form name="form" method="post" enctype="multipart/form-data">
                        <input type="text" name="friend" placeholder="Search Your Friends !">
                        <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                    </form>
                </div>
                <div class="container-friends-list">
                    <ul>
                    <?php
                        if(!empty($_POST['friend'])){
                            $search_name = $_POST['friend'];
                            // Prepare our query to show the user their info
                            $query = "SELECT name, id, image FROM users WHERE name = :friends_id";
                            $user = $conn->prepare($query);
                            $user->bindValue(':friends_id', $_POST['friend']);
                            $user->execute();
                            
                            while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                                echo "<li class='friend_result'><a onclick=setCookie('friend_page_cookie'," . $row['id'] . ",10) href='friend_account.php'>
                                <div class='friend_image'><img src='data:image/png;base64,". $row['image']."'></div>
                                <div class='friend_name'><p>".$row['name']."</p></div></a>
                                </li>";
                            }
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script src="../home/js/black-theme.js"></script>
    <?php 
    }
    ?>
    
</html>