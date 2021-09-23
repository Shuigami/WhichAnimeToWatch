<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tokyo Revengers :)</title>
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
                $name = 'TokyoRevengers';
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
                    echo "<script type='text/javascript'> document.location = 'TokyoRevengers.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Tokyo Revengers</h1>
        <img class="baniere" src="images/baniere.png">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Tokyo Revengers</h1>

            <p>Genre : - Action</p>
            <div class="sousgenre">- Science Fiction</div>
            <div class="sousgenre">- Yanki</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Ken Wakui</p>
            <p>Published by : Kodansha</p>
            <p>Volumes : 22 </p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Koichi Hatsumi</p>
            <p>Written by : - Yasuyuki Mutō</p>
            <p>Studio : Liden Films</p>
            <p>Streaming Website : Crunchyroll</p>
            <p>Episodes : 15</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Tokyo Revengers (東京卍リベンジャーズ, Tōkyō 卍 Revengers) is a shōnen manga series created by Ken Wakui. It has
                been prepublished since July 4, 2017 in the weekly magazine
                Weekly Shōnen Magazine and then collected in bound volumes by Kōdansha Publishing. In November 2019, 14
                volumes and more than 130 chapters are released in Japan.</p>
            <br>

            <h1>Synopsis</h1>
            <br>
            <p>Takemichi Hanagaki's life is at an all-time low. Just when he thought it couldn't get worse, he finds out
                that Hinata Tachibana, his ex-girlfriend, was murdered by the Tokyo
                Manji Gang: a group of vicious criminals that has been disturbing society's peace for quite some time.
            </p>
            <br>
            <p>Wondering where it all went wrong, Takemichi suddenly finds himself travelling through time, ending up 12
                years in the past—when he was still in a relationship with Hinata.
                Realizing he has a chance to save her, Takemichi resolves to infiltrate the Tokyo Manji Gang and climb
                the ranks in order to rewrite the future and save Hinata from her
                tragic fate.</p>
            <br>
            <p>Tokyo Manji Gang (東京卍會, Tōkyō Manji-Kai), otherwise known as Toman, is a biker gang lead by Manjiro
                "Mikey" Sano & Ken "Draken" Ryuguji. The gang is responsible for the
                death of Takemichi Hanagaki ex-girlfriend in the present and as he ends up back in time, he decides to
                join the gang and prevent her death...</p>
            <br>
            <h1>Character</h1>
            <br>
            <ul class="character-list">
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/TakemichiHanagaki.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Takemichi Hanagaki</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Takemichi Hanagaki (花垣武道, Hanagaki Takemichi?) or Takemitchy (タケミっち, Takemitchi?) is a young
                            man who can travel back in time: a Time Leaper. In order to save his girlfriend Hinata
                            Tachibana and over time, everyone he cares about, he decides to become a top member in Toman
                            and save them. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/mikey.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Manjiro Sano</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Manjiro Sano (佐野万次郎 Sano Manjirō?), or Mikey (マイキー, Maikī?), is a founding member and the
                            leader of Tokyo Manji Gang. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/draken.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Ken Ryuguji</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Ken Ryuguji (龍宮寺堅 Ryūguji Ken?), or Draken (ドラケン, Doraken?), is the vice-president and one of
                            the founding members of the Tokyo Manji Gang. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/hinata.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Hinata Tachibana</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Hinata Tachibana (橘日向 Tachibana Hinata?) is the girlfriend of Takemichi Hanagaki who is the
                            primary reason for Takemichi's desire to change the past. In 2005, Hinata is a 14 year old
                            girl. On July 4, 2017, Hinata will be killed during a brawl between two Tokyo gangs, along
                            with her brother Naoto Tachibana.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/naoto.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Naoto Tachibana</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Naoto Tachibana (橘直人, Tachibana Naoto?) is the younger brother of Hinata Tachibana, a
                            detective in the organized crime department of Tokyo, and the "trigger" for Takemichi
                            Hanagaki's time travel powers. </p>
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
                            $stmt->bindValue(':page_id', '61');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '61'";
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