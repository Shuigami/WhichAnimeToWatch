<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Erased :)</title>
    <?php include_once '../home/includes/style_includes.php'; ?>
</head>

<body>
    <?php include_once '../home/includes/title.php'; ?>


    <div class="WorkTitle">
        <div class="favorites-icon">
            <a href="?addto=true">
                <img src="../mainimages/fav.png">
            </a>
        </div>
        <?php 
            if(isset($_SESSION['user_id'])){
                // Prepare our query to show the user their info
                $query = "SELECT name, country, email, password, phone, id, language, image, fav  FROM users WHERE id = :user_id";
                $user = $conn->prepare($query);
                $user->bindValue(':user_id', $_SESSION['user_id']);
                $user->execute();

                // Store the result
                $result = $user->fetch(PDO::FETCH_ASSOC);
                $name = 'Erased';
                $array = preg_split("/[\s,]+/", $result['fav']);

                if(in_array($name, $array)){
                    echo '<style type="text/css">
                    .favorites-icon img{
                        filter: invert(53%) sepia(35%) saturate(825%) hue-rotate(306deg)
                        brightness(96%) contrast(95%);
                    }
                    .favorites-icon img:hover{
                        filter: invert(25%) sepia(20%) saturate(1815%) hue-rotate(306deg) 
                        brightness(94%) contrast(89%);
                    }
                    </style>';
                }

                if(isset($_GET['addto'])){ // Ajouter au favori
                    if($result['fav'] == null){         // Aucun favori
                        $result['fav'] = $name;
                        $fav = $result['fav'];
                    } else {                            // Déjà un ou plusieurs favori(s)
                        if(in_array($name, $array)){    // S'il y est déjà
                            $oldname = array_search($name, $array);
                            unset($array[$oldname]);
                        } else {                        // S'il y est pas
                            array_push($array, $name);
                        }
                        $arraystring = implode(" , ", $array);
                        $fav = $arraystring;
                    }
                    $user_id = $result['id'];
                    // Changer info
                    $sql = "UPDATE users SET fav ='$fav' WHERE id=$user_id";
                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    // execute the query
                    $stmt->execute();
                    echo "<script type='text/javascript'> document.location = 'Erased.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Erased</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Erased</h1>
            <p>Genre : - Mystery</p>
            <div class="sousgenre">- Science fiction</div>
            <div class="sousgenre">- Thriller</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Kei Sanbe</p>
            <p>Published by : Kadokawa Shoten</p>
            <p>Volumes : 8</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Tomohiko Itō</p>
            <p>Written by : Taku Kishimoto</p>
            <p>Studio : A-1 Pictures</p>
            <p>Streaming Website : Netflix</p>
            <p>Episodes : 12</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Erased, known in Japan as Boku dake ga Inai Machi (僕だけがいない街, lit. "The Town Where Only I Am Missing";
                abbr. 僕街, BokuMachi), is a Japanese manga series written and illustrated by Kei Sanbe. It was serialized
                in Kadokawa Shoten's Young Ace magazine from June 2012 to March 2016, and is licensed in English by Yen
                Press. An anime adaptation by A-1 Pictures aired on Fuji TV's Noitamina programming block from January
                to March 2016, and a live action film was released in March 2016. A live-action drama series was
                released by Netflix in December 2017. A spin-off manga was published from June to November 2016 and the
                spin-off novel series by Hajime Ninomae was released in Kadokawa's Bungei Kadokawa magazine from
                November 2015 to March 2016. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>The story follows Satoru Fujinuma, a young man living in Chiba who possesses an ability known as
                "Revival" that sends him back in time moments before a life-threatening incident, enabling him to
                prevent it from happening again. When his mother is murdered by an unknown assailant in his own home,
                Satoru's ability sends him back eighteen years into the past and Satoru is given the opportunity to not
                only save his mother, but also prevent a kidnapping incident that took the lives of three of his
                childhood friends. </p>
            <br>
        </div>

        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>
    <div class="comment">
        <div class="comment-publish">
            <div class="comment-img-container">
                <?php // Retrouver info utilisateur
                if(isset($_SESSION['user_id'])){
                    // Prepare our query to show the user their info
                    $query = "SELECT image  FROM users WHERE id = :user_id";
                    $user = $conn->prepare($query);
                    $user->bindValue(':user_id', $_SESSION['user_id']);
                    $user->execute();

                    // Store the result
                    $result = $user->fetch(PDO::FETCH_ASSOC);
                    if(!empty($result['image'])){
                        echo '<img id="account-img-setting" src="data:image/png;base64,'. $result['image'].'"/>';
                    } else {
                        echo '<img class="settings-logo" id="account-img-setting" src="../mainimages/account.png">';
                    }
                } else {
                    echo '<img class="settings-logo" id="account-img-setting" src="../mainimages/account.png">';
                }
                ?>
            </div>
            <form action="" method="post">
                <input class="comment-input" type="text" name="published_comment" placeholder="      Write comments">
                <?php 
                    if(isset($_SESSION['user_id'])){
                        // Prepare our query to show the user their info
                        $query = "SELECT name, image  FROM users WHERE id = :user_id";
                        $user = $conn->prepare($query);
                        $user->bindValue(':user_id', $_SESSION['user_id']);
                        $user->execute();

                        // Store the result
                        $result = $user->fetch(PDO::FETCH_ASSOC);
                        if(!empty($_POST['published_comment'])){
                            $sql = "INSERT INTO comment (user_comment_id, page_id, username, user_pp, content, date_time) VALUES (:user_comment_id, :page_id, :username, :user_pp, :content, :date_time)";
                            $stmt = $conn->prepare($sql);

                            // Tell our query string where to find the vales
                            $stmt->bindValue(':user_comment_id', $_SESSION['user_id']);
                            $stmt->bindValue(':date_time', date("Y-m-d H:i:s"));
                            $stmt->bindValue(':page_id', '21');
                            $stmt->bindValue(':username', $result['name']);
                            if(!empty($result['image'])){
                                $stmt->bindValue(':user_pp', $result['image']);
                            } else {
                                $stmt->bindValue(':user_pp', '');
                            }
                            $stmt->bindValue(':content', $_POST['published_comment']);
                            $stmt->execute();
                        }
                    }
                ?>
            </form>
        </div>
        <div class="comment-section">
            <ul class="comment-list">
                <?php
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '21'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                // Store results
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['comment_id'];
                    echo 
                    "<li class='comment-element' id=". $id .">
                        <div class='comment-publisher'>
                            <div class='comment-publisher-name-container'>
                                <div class='comment-publisher-center'>
                                    <h2>"
                                        .$row['username'];
                    echo 
                    "               </h2>
                                </div>
                            </div>
                            <div class='comment-publisher-img-container'>
                                <div class='comment-publisher-container'>";
                    
                    if(!empty($row['user_pp'])){
                        echo '<img id="account-img-setting" src="data:image/png;base64,'. $row['user_pp'].'"/>';
                    } else {
                        echo '<img class="setting-logo" id="account-img-setting" src="../mainimages/account.png"/>';
                    }

                    echo 
                    "           </div>
                            </div>
                        </div>
                        <div class='comment-text'>
                            <p>".$row['content']."</p>
                            <p class='date'>".$row['date_time']."</p>";
                    
                    if(isset($_SESSION['user_id'])){
                        if($row['user_comment_id'] == $_SESSION['user_id']){
                            echo
                            "        <div class='delete-button' id=''>
                                        <img class='blacked' onclick='findIdOfParent(this)' src='../mainimages/bin.png''>
                                    </div>
                                </div>
                            </li>";
                            } 
                    }
                }

                if(isset($_COOKIE['get_comment_id'])){
                    $comment_id = $_COOKIE['get_comment_id'];
                    $sql = "DELETE FROM `comment` WHERE `comment`.`comment_id` = $comment_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                }
                ?>
            </ul>
        </div>
    </div>

</body>
<script language="javascript"> 
    function findIdOfParent(obj) {
        var a = obj;
        var b = a.parentNode;
        var c = b.parentNode;
        var d = c.parentNode;

        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 5000;
        now.setTime(expireTime);

        console.log(now);
        document.cookie = "get_comment_id" + "=" + escape(d.id) + "; expires=" + now.toUTCString() + ";path=/";
    }
</script>
<script src="../home/js/black-theme.js"></script>

</html>