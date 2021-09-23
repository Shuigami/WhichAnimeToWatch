<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Kuroko no Basket :)</title>
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
                $name = 'KurokoBasket';
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
                    echo "<script type='text/javascript'> document.location = 'KurokoBasket.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Kuroko no Basket</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Kuroko no Basket</h1>
            <p>Genre : - Comedy</p>
            <div class="sousgenre"> - Sport</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Tadatoshi Fujimaki</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 30</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Shunsuke Tada</p>
            <p>Written by : - Noburo Takagi</p>
            <p>Studio : Production I.G</p>
            <p>Streaming Website : Netflix/ADN</p>
            <p>Episodes : 75 + 3 OVA</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Kuroko's Basketball (Japanese: 黒子のバスケ, Hepburn: Kuroko no Basuke, The Basketball Which Kuroko Plays in
                Japan) is a Japanese sports manga series written and illustrated by Tadatoshi Fujimaki. It was
                serialized in Weekly Shōnen Jump from December 2008 to September 2014, with the individual chapters
                collected into 30 tankōbon volumes by Shueisha. It tells the story of a high school basketball team
                trying to make it to the national tournament. </p>
            <br>
            <p>It was adapted into an anime television series by Production I.G, which aired for three seasons from
                April 2012 to June 2015. A sequel manga by Fujimaki titled Kuroko's Basketball: Extra Game was
                serialized in Jump Next! from December 2014 to March 2016. An anime film adaptation of the Kuroko's
                Basketball: Extra Game manga premiered in Japan in March 2017. A stage play adaptation opened in April
                2016 followed by more stage adaptations. </p>
            <br>
            <p>The manga has been licensed for English-language release by Viz Media in North America. As of November
                2020, Kuroko's Basketball had over 31 million copies in circulation. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>The Teiko Junior High basketball team rose to distinction by demolishing basketball teams within Japan,
                winning the junior high Nationals for three consecutive years. The all-star players of the team became
                known as the Generation of Miracles. After graduating from middle school, the five star players went to
                different high schools with top basketball teams. However, a fact known to few is that there was another
                player in the "Generation of Miracles": a phantom sixth man. This mysterious player is now a freshman at
                Seirin High, a new school with a powerful, if little-known, team. Now, Tetsuya Kuroko – the sixth member
                of the "Generation of Miracles", and Taiga Kagami – a naturally talented player who spent most of middle
                school in the US, aim to bring Seirin to the top of Japan and begin taking on Kuroko's former teammates
                one by one. The series chronicles Seirin's rise to become Japan's number one high school team. The
                Generation of Miracles include Ryota Kise, Shintaro Midorima, Daiki Aomine, Atsushi Murasakibara, and
                Seijuro Akashi. </p>
            <br>
            <h2>Spoil</h2>
            <br>
            <p>Seirin High team fought Ryota Kise's team first in a practice match. Although Kise was capable of copying
                all of Kagami skills with added strength and speed, Kuroko's abilities helped narrow the distance and
                eventually, Seirin won this game. They then met Shintaro Midorima in the preliminaries of Interhigh. The
                game was much more difficult, not only because Midorima and the last three members of "Generation of
                Miracles" are considerably stronger than Ryota Kise, but also Kuroko's ability of misdirection was
                completely shut down by Takao's Hawk Eyes. They managed to defeat team Shutoku but their winning streak
                ended after they lost badly to Touhou Academy, whose basketball team contained the Ace of the
                "Generation of Miracles" - Daiki Aomine. After this game, they lost their remaining two matches against
                Senshinkan and Meisei and were eliminated from the Interhigh. However, a new player arrives to join
                Seirin - Kiyoshi Teppei, the man who formed the Seirin Basketball team. They spent the entire summer
                training for the Winter Cup, even coincidentally meeting Shutoku while training. </p>
            <br>
            <p>In the preliminaries, they met team Shutoku again. This match ended into a tie, so Seirin needed to
                defeat team Kirisaki Daichi. Kirisaki Daichi's captain was Makoto Hanamiya, a member of the Uncrowned
                Kings well-known for his underhanded methods to win a match. However, they won and gained a ticket to
                the Winter Cup. </p>
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
                            $stmt->bindValue(':page_id', '37');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '37'";
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