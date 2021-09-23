<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Haikyū!! :)</title>
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
                $name = 'Haikyu';
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
                    echo "<script type='text/javascript'> document.location = 'Haikyu.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Haikyū!!</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Haikyū!!</h1>
            <p>Genre : - Comedy</p>
            <div class="sousgenre">- Coming-of-age</div>
            <div class="sousgenre">- Sport</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Haruichi Furudate</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 45</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Susumu Mitsunaka</p>
            <div class="sousgenre2">- Masako Satō</div>
            <p>Written by : Taku Kishimoto</p>
            <p>Studio : Production I.G</p>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 85 + 5 OVAs</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Haikyu!! (ハイキュー!!, from the kanji 排球 "volleyball") is a Japanese manga series written and illustrated by
                Haruichi Furudate. The story follows Shōyō Hinata, a boy determined to become a great volleyball player
                despite his small stature. It was serialized in Shueisha Weekly Shōnen Jump from February 2012 to July
                2020, with its chapters collected in forty-five tankōbon volumes. </p>
            <br>
            <p>An anime television series adaptation by Production I.G aired from April 2014 to September 2014, with 25
                episodes. A second season aired from October 2015 to March 2016, with 25 episodes. A third season aired
                from October 2016 to December 2016, with 10 episodes. A fourth season was announced during the Jump
                Festa '19 and was planned for release in two cours, the first cour of 13 episodes aired from January to
                April 2020, and the second cour of 12 episodes aired from October to December 2020. </p>
            <br>
            <p>In North America, the manga has been licensed by Viz Media, while the anime series has been licensed for
                digital and home release by Sentai Filmworks. </p>
            <br>
            <p>Both the manga and anime have been met with positive response. The manga won the 61st Shogakukan Manga
                Award for best shōnen manga in 2017. As of November 2020, Haikyu!! had over 50 million copies in
                circulation. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>Junior high school student, Shōyō Hinata, becomes obsessed with volleyball after catching a glimpse of
                Karasuno High School playing in Nationals on TV. Of short stature himself, Hinata is inspired by a
                player the commentators nickname 'The Little Giant', Karasuno's short but talented wing spiker. Though
                inexperienced, Hinata is athletic and has an impressive vertical jump; he joins his school's volleyball
                club – only to find he is its sole member, forcing him to spend the next two years trying to convince
                other students to help him practice. </p>
            <br>
            <p>In third and final year of junior high, some of Hinata's friends agree to join the club so he can compete
                in a tournament. In his first official game ever, they suffer a crushing defeat to the team favoured to
                win the tournament – that included third-year Tobio Kageyama, a prodigy setter nicknamed 'The King of
                the Court' for both his skill and his brutal play style. The two spark a short rivalry, and after the
                game, Hinata vows to defeat Kageyama in high school. </p>
            <br>
            <p>Hinata studies and is accepted to Karasuno, the same high school the "Little Giant" played for, but is
                shocked to discover that Kageyama has also chosen to attend Karasuno. Karasuno is revealed to have lost
                its reputation as a powerhouse school following the era of the Little Giant, often being referred to
                'The Wingless Crows' by other local teams. However, by combining Kageyama's genius setting skills with
                Hinata's remarkable athleticism, the duo create an explosive new volleyball tactic and develop an
                unexpected but powerful setter-spiker partnership. </p>
            <br>
            <p>Along the way, Hinata and Kageyama push each other into reaching their full potential and Hinata develops
                relationships with his first real team, thus beginning Karasuno's journey of redemption to restore their
                reputation and make it to Nationals. </p>
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
                            $stmt->bindValue(':page_id', '28');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '28'";
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