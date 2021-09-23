<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Attack On Titans :)</title>
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
                $name = 'SNK';
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
                    echo "<script type='text/javascript'> document.location = 'SNK.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Attack On Titans</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Attack On Titans</h1>
            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Dark fantasy</div>
            <div class="sousgenre">- Post-apocalyptic</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Hajime Isayama</p>
            <p>Published by : Kodansha</p>
            <p>Volumes : 34</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Tetsurō Arak</p>
            <div class="sousgenre2">- Masashi Koizuka</div>
            <div class="sousgenre2">- Yūichirō Hayashi</div>
            <div class="sousgenre2">- Jun Shishido</div>
            <p>Studio : Wit Studio/MAPPA </p>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 75</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Attack on Titan (Japanese: 進撃の巨人, Hepburn: Shingeki no Kyojin, lit. "The Attack Titan") is a Japanese
                manga series written and illustrated by Hajime Isayama. It is set
                in a world where humanity lives inside cities surrounded by three enormous walls that protect them from
                the gigantic man-eating humanoids referred to as Titans; the story
                follows Eren Yeager, who vows to exterminate the Titans after a Titan brings about the destruction of
                his hometown and the death of his mother. Attack on Titan was
                serialized in Kodansha's monthly Bessatsu Shōnen Magazine from September 2009 to April 2021 and has been
                collected into 33 tankōbon volumes as of January 2021.</p>
            <br>
            <p>An anime television series adapting the manga was produced by Wit Studio (seasons 1–3) and MAPPA (season
                4). A 25-episode first season was broadcast from April to September
                2013, followed by a 12-episode second season broadcast from April to June 2017. A 22-episode third
                season was broadcast in two parts, with the first 12 episodes airing from
                July to October 2018 and the last 10 episodes airing from April to July 2019. A fourth and final season
                premiered in December 2020, airing 16 episodes in its first part,
                with the remainder announced to air in early 2022.</p>
            <br>
            <p>Attack on Titan has become a critical and commercial success. As of December 2019, the manga has over 100
                million tankōbon copies in print worldwide, making it one of the
                best-selling manga series of all time. It has won several awards, including the Kodansha Manga Award,
                the Attilio Micheluzzi Award, and Harvey Award.</p>
            <br>
            <h1>Setting</h1>
            <br>
            <p>The plot of Attack on Titan centers on a civilization inside three walls, the last location where humans
                still live. Over one hundred years ago, humanity was driven to the
                brink of extinction after the emergence of humanoid giants called Titans, who attack and eat humans on
                sight. The last remnants of humanity retreated behind three
                concentric walls and enjoyed nearly a century of peace. To combat Titans, the nation's military employs
                Vertical Maneuvering Equipment, a set of waist-mounted grappling
                hooks and gas-powered propulsion enabling immense mobility in three dimensions.</p>
            <br>
            <h1>Plot (Spoil Saison 1)</h1>
            <br>
            <p>The story revolves around a boy named Eren Yeager, who lives in the town of Shiganshina, located on the
                outermost of three circular walls protecting humanity from Titans.
                In the year 845, the wall is breached by two new types of Titans, named the Colossus Titan and the
                Armored Titan. During the incident, Eren's mother is eaten by a Titan
                while Eren escapes. He swears revenge on all Titans and enlists in the military along with his childhood
                friends, Mikasa Ackerman and Armin Arlert.</p>
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
                            $stmt->bindValue(':page_id', '7');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '7'";
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