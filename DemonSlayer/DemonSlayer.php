<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Demon Slayer :)</title>
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
                $name = 'DemonSlayer';
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
                    echo "<script type='text/javascript'> document.location = 'DemonSlayer.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Demon Slayer</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>
    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Demon Slayer</h1>

            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Dark fantasy</div>
            <div class="sousgenre">- Martial Arts</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Koyoharu Gotouge</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 23</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Haruo Sotozaki</p>
            <p>Studio : Ufotable</p>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 26</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Demon Slayer: Kimetsu no Yaiba (鬼滅の刃, Kimetsu no Yaiba, lit. "Blade of Demon Destruction") is a Japanese
                manga series written and illustrated by Koyoharu Gotouge. It
                follows Tanjiro Kamado, a young boy who wants to become a demon slayer after his family is slaughtered
                and his younger sister Nezuko is turned into a demon. It was
                serialized in Shueisha's shōnen manga magazine Weekly Shōnen Jump from February 2016 to May 2020, with
                its chapters collected in 23 tankōbon volumes. It has been published
                in English by Viz Media and simulpublished by Shueisha on their Manga Plus platform. .</p>
            <br>
            <p>A 26-episode anime television series adaptation produced by Ufotable aired in Japan from April to
                September 2019. A sequel film, Demon Slayer: Kimetsu no Yaiba the Movie:
                Mugen Train, premiered in October 2020 and became the highest-grossing anime film and Japanese film of
                all time. Meanwhile, the second season will premiere in 2021.</p>
            <br>
            <p>As of February 2021, the manga had over 150 million copies in circulation, including digital versions,
                making it one of the best-selling manga series of all time. Meanwhile,
                the anime series has received critical acclaim, with critics praising the animation and fight sequences.
                It has received numerous awards and is considered one of the best
                anime of the 2010s. As of December 2020, the Demon Slayer franchise is estimated to have generated total
                sales of at least ¥270 billion ($2.6 billion) in Japan.</p>
            <br>

            <h1>Setting</h1>
            <br>
            <p>The story takes place in Taishō-era Japan. It follows Tanjiro Kamado and his sister Nezuko Kamado as they
                seek a cure to Nezuko's demon curse. Tanjiro and Nezuko become
                entangled in the affairs of a secret society, known as the Demon Slayer Corps, that have been waging a
                secret war against demons for centuries. The demons are former
                humans who sold their humanity in exchange for power. They feed on humans and possess supernatural
                abilities such as super strength, magic and regeneration. Demons can
                only be killed if they're decapitated with weapons crafted from an alloy known as Sun Steel, injected
                with poison extracted from wisteria flowers, or exposed to sunlight.
                The Demon Slayers, on the other hand, are entirely human, however, they employ special breathing
                techniques, known as "Breathing Styles", which grant them superhuman
                strength and increased resistance.</p>
            <br>

            <h1>Premise</h1>
            <br>
            <p>Tanjiro Kamado is a kind-hearted and intelligent boy who lives with his family in the mountains. He has
                become his family's sole source of income after the passing of his
                father, making trips to the nearby village to sell charcoal. Everything changes when he comes home one
                day to discover that his family has been attacked and slaughtered
                by a demon. Tanjiro and his sister Nezuko are the sole survivors of the incident, with Nezuko being
                transformed into a demon, but still surprisingly showing signs of
                human emotion and thought. After an encounter with Giyū Tomioka, a demon slayer, Tanjiro is recruited by
                him and sent to be taught by Sakonji Urokodaki, another member
                of the Demon Slayer Corps, to also become a demon slayer, and begins his quest to help his sister turn
                human again and avenge the deaths of the rest of his family.</p>

        </div>

        <div class="box"></div>
        <div class="box"></div>
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
                            $stmt->bindValue(':page_id', '16');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '16'";
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