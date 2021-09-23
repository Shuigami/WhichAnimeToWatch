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
        <link rel="stylesheet" href="css/friend_list.css">
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
                <div class="all-friends">
                    <ul class="friends-list" id="friends-list">
                        <!-- <li class="friend">
                            <a href="#">
                                <div class="friend-image">
                                    <div class="friend-image-container">
                                        <img src="../DrStone/images/icon.jpg">
                                    </div>
                                </div>
                                <div class="friend-username">
                                    <p>Testaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                                </div>
                            </a>
                            <div class='delete-button'>
                                <a href="friend.php?friend_deleted=true">
                                    <img class='blacked' src='../mainimages/bin.png'>
                                </a>
                            </div>
                            <div class="border">
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_GET['friend_deleted'])){
            $actual_link = "$_SERVER[REQUEST_URI]";
            $split = preg_split("/([=])/", $actual_link);
            $friend_id = $split[1];
            
            $array = preg_split("/[\s,]+/", $result['friends']);
            if(in_array($friend_id, $array)){
                $oldid = array_search($friend_id, $array);
                unset($array[$oldid]);
            }
            $friends_string = implode(" , ", $array);
            $user_id = $result['id'];
            // Changer info
            $sql = "UPDATE users SET friends ='$friends_string' WHERE id=$user_id";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            echo "<script type='text/javascript'> document.location = 'friend_list.php'; </script>";
        }
        ?>
    </body>
    <script src="../home/js/black-theme.js"></script>
    <script src="../home/js/friend.js"></script>
    <?php 
        if($result['friends'] == null) return;
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
            echo "<script type='text/javascript'>FriendList('$id','$name','$image');</script>";
        }
    }
    ?>
</html>