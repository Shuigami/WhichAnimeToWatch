<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>The Promised Neverland :)</title>
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
                $name = 'ThePromisedNeverLand';
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
                    echo "<script type='text/javascript'> document.location = 'ThePromisedNeverLand.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">The Promised Neverland</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>The Promised Neverland</h1>
            <p>Genre : - Dark Fantasy</p>
            <div class="sousgenre">- Science Fiction</div>
            <div class="sousgenre">- Thriller</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Kaiu Shirai</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 20</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Mamoru Kanbe</p>
            <p>Written by : Toshiya Ono (#1–21)</p>
            <div class="sousgenre2">- Kaiu Shirai (#13–21)</div>
            <p>Studio : CloverWorks</p>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 23</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>The Promised Neverland (Japanese: 約束のネバーランド, Hepburn: Yakusoku no Nebārando) is a Japanese manga series
                written by Kaiu Shirai and illustrated by Posuka Demizu. It was serialized in Shueisha's Weekly Shōnen
                Jump from August 2016 to June 2020, with its chapters collected in twenty tankōbon volumes. In North
                America, Viz Media licensed the manga for English release and serialized it on their digital Weekly
                Shonen Jump magazine. The series follows a group of orphaned children in their plan to escape from their
                orphanage, after learning the dark truth behind their existence and the purpose of the orphanage. </p>
            <br>
            <p>The Promised Neverland was adapted into an anime television series produced by CloverWorks and broadcast
                on Fuji TV's Noitamina programming block. The series' first season ran for 12 episodes from January to
                March 2019. A second season ran for 11 episodes from January to March 2021. A live-action film
                adaptation was released in December 2020. Amazon Studios is also developing an American live-action
                series. </p>
            <br>
            <p>In 2018, the manga won the 63rd Shogakukan Manga Award in the shōnen category. As of April 2021, The
                Promised Neverland had over 32 million copies in circulation, including digital versions, making it one
                of the best-selling manga series. The anime series' first season was well received by critics, being
                considered as one of the best anime series of the 2010s. The second season, however, received negative
                reception, mainly due to its rushed pacing and simplification of the original manga's plot. </p>
            <br>
            <h1>Synopsis</h1>
            <br>
            <h2>Setting</h2>
            <br>
            <p>It is the year 2045, and over 1000 years after an agreement called "The Promise" was made to end a long
                war between humans and demons. "The Promise" was an agreement where each would live in their own
                separate "worlds": the human world, free from the threat of demons; and the demon world, where human
                breeding farms were set up to provide food for the demons. By eating humans, demons take on their
                attributes which prevent them from degenerating into mindless monsters. In the demon world, a special
                breeding program was set up under the guise of orphanages; there, a human "Mother" would oversee the
                children to make sure they grew up as intelligent as possible. These children had identifying numbers
                tattooed on them and had no knowledge of the outside world. They believed that they were orphans and
                once they reached a certain age or intelligence, they would be taken out for adoption, but were fed to
                high-ranking demons instead. </p>
            <br>
            <h2>Plot</h2>
            <br>
            <p>The bright and cheerful Emma is an 11-year-old orphan living in Grace Field House, a self-contained
                orphanage housing her and 37 other orphans. They lead an idyllic life, with plentiful food, plush beds,
                clean clothes, games and the love of their "Mom", Isabella. Their education is seen as an important part
                of their development, and Emma with her two best friends Norman and Ray, always excel in the regular
                exams. The orphans are allowed complete freedom, except to venture beyond the perimeter wall or gate
                which separate the house from the outside world. </p>
            <br>
            <p>One night, Conny is sent away to be "adopted", but Emma and Norman follow with her favorite stuffed
                animal toy. At the gate, they find Conny dead and discover the truth about their existence in this
                idyllic orphanage - to be raised as meat for demons.</p>
                <br>
            <ul class="character-list">
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/emma.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Emma</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Emma (エマ, Ema) is the main protagonist of The Promised Neverland. Caring and extroverted, Emma often proves herself to be one of the most reliable orphans and is often seen surrounded by friends. She is known for her incredible ability to learn, capable athleticism, and ample optimism. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/ray.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Ray</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Ray (レイ, Rei) is one of the deuteragonists of The Promised Neverland alongside with Norman</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/norman.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Norman</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Norman (ノーマン, Nōman) is one of the deuteragonists of The Promised Neverland alongside Ray.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/isabella.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Isabella</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Isabella (イザベラ, Izabera), also known as Mama (ママ; English "Mom"), is a major character of The Promised Neverland and the main antagonist in the Introduction- and Jailbreak Arc.</p>
                    </div>
                </li>
            </ul>
            <br>
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
                            $stmt->bindValue(':page_id', '59');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '59'";
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