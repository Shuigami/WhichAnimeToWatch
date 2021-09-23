<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Sword Art Online :)</title>
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
                $name = 'SAO';
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
                    echo "<script type='text/javascript'> document.location = 'SAO.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Sword Art Online</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Sword Art Online</h1>

            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Science Fiction</div>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Tomohiko Itō</p>
            <div class="sousgenre2">- Manabu Ono</div>
            <p>Studio : A-1 Pictures</p>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 96</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Sword Art Online (Japanese: ソードアート・オンライン, Hepburn: Sōdo Āto Onrain) is a Japanese light novel series written by Reki Kawahara and illustrated by abec. The series takes place in the near future and focuses on protagonist Kazuto "Kirito" Kirigaya and Asuna Yuuki as they play through various virtual reality MMORPG worlds. Kawahara originally wrote the series as a web novel on his website from 2002 to 2008. The light novels began publication on ASCII Media Works' Dengeki Bunko imprint from April 10, 2009, with a spin-off series launching in October 2012. The series has spawned twelve manga adaptations published by ASCII Media Works and Kadokawa. The novels and the manga adaptations have been licensed for release in North America by Yen Press. </p>
            <br>
            <p>An anime television series produced by A-1 Pictures, known simply as Sword Art Online, aired in Japan between July and December 2012, with a television film Sword Art Online: Extra Edition airing on December 31, 2013, and a second season, titled Sword Art Online II, airing between July and December 2014. An animated film titled Sword Art Online The Movie: Ordinal Scale, featuring an original story by Kawahara, premiered in Japan and Southeast Asia on February 18, 2017, and was released in the United States on March 9, 2017. A spin-off anime series titled Sword Art Online Alternative Gun Gale Online premiered in April 2018, while a third season titled Sword Art Online: Alicization aired from October 2018 to September 2020. An anime film adaptation of Sword Art Online: Progressive titled Sword Art Online Progressive: Aria of a Starless Night is set to premiere in Q4 2021. A live-action series will be produced by Netflix. Six video games based on the series have been released for multiple consoles. </p>
            <br>
            <p>Sword Art Online has received widespread commercial success, with the light novels having over 26 million copies sold worldwide. The light novel series had good reviews, mainly on later arcs, while other series like Progressive were praised since the beginning. The anime series has received mixed to positive reviews, with praise for its animation, musical score and exploration of the psychological aspects of virtual reality, but criticisms for its pacing and writing. </p>
            <br>
            <h1>Synopsis</h1>
            <br>
            <p>As one of the lucky 10,000 who received the brand new Nerve Gear (next generation virtual reality console), Kiragaya Kazuto AKA Kirito immerses himself in the world of Sword Art Online, an MMORPG with a fantastic universe. The dream turns into a nightmare when the God of this world announces to all the players that they are stuck in this universe without any way to disconnect. Not only that, but players' avatars are replaced by their real-life appearance and any death in the game is equivalent to a death in reality. Will Kirito manage to finish the game and save the 10,000 players, well, can we still call it a game?</p>
            <br>
            <h1>Characters</h1>
            <br>
            <ul class="character-list">
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="images/kirito.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Kirito</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Kirigaya Kazuto aka kirito is one of the 10,000 gamers to have obtained the Nerve Gear, a brand new virtual reality console. Passionate about video games, this young man had managed to get the beta version of Sword Art Online in order to collect information in order to start the final version with some advantages. This is how he started this new adventure without knowing that it would soon mix fiction and reality.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="images/asuna.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Asuna Yuki</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Swordswoman with an unknown past, Asuna Yuki handles the sword like no other. Highly ranked in one of the most important factions of Sword Art Online, this young woman will become the sidekick of the great black swordsman ...</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="images/kayaba.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Kayaba Akihiko</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Brilliant researcher in neuroscience, Kayaba akihiko is the man at the origin of the creation of the Nerve gear, some rumors say that would be also him the person responsible for all this history...</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="images/tsuboi.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Tsuboi Ryoutarou</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Tsuboi Ryoutarou AKA Klein is a young man who has an undisguised love for ancient Japan, he is a samurai fan who fights with his katana. He is the first Kirito's friend  in Sword Art Online.</p>
                    </div>
                </li>
            </ul>
        </div>
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
                            $stmt->bindValue(':page_id', '56');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '56'";
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