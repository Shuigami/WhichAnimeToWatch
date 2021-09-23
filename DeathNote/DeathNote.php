<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Death Note :)</title>
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
                $name = 'DeathNote';
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
                    echo "<script type='text/javascript'> document.location = 'DeathNote.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Death Note</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Death Note</h1>
            <p>Genre : - Mystery</p>
            <div class="sousgenre"> - Psychological thriller</div>
            <div class="sousgenre"> - Supernatural thriller</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Tsugumi Ohba</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 12</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Tetsurō Araki</p>
            <p>Written by : - Toshiki Inoue</p>
            <p>Studio : Madhouse</p>
            <p>Streaming Website : Netflix / Adn</p>
            <p>Episodes : 37</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Death Note (stylized as DEATH NOTE) is a Japanese manga series written by Tsugumi Ohba and illustrated by Takeshi Obata. The story follows Light Yagami, a teen genius who discovers a mysterious notebook: the "Death Note", which belonged to the Shinigami Ryuk, and grants the user the supernatural ability to kill anyone whose name is written in its pages. The series centers around Light's subsequent attempts to use the Death Note to carry out a worldwide massacre of individuals whom he deems immoral and to create a crime-free society, using the alias of a god-like vigilante named "Kira", and the subsequent efforts of an elite Japanese police task force, led by enigmatic detective L, to apprehend him. Death Note ran in Shueisha's manga magazine Weekly Shōnen Jump from December 2003 to May 2006. Its 108 chapters were collected in 12 tankōbon volumes. </p>
            <br>
            <p>A 37-episode anime television series adaptation, produced by Madhouse and directed by Tetsurō Araki, was broadcast in Japan on Nippon Television from October 2006 to June 2007. A light novel based on the series, written by Nisio Isin, was also released in 2006. Additionally, various video games have been published by Konami for the Nintendo DS. The series was adapted into three live action films released in Japan in June 2006, November 2006, and February 2008, and a television drama in 2015. A miniseries titled Death Note: New Generation and a fourth film were released in 2016. An American film adaptation was released exclusively on Netflix in August 2017 and a sequel is reportedly in the works. </p>
            <br>
            <p>Death Note media, except for video games and soundtracks, is licensed and released in North America by Viz Media. The episodes from the anime first appeared in North America as downloadable from IGN before Viz Media licensed it. The series was aired on YTV's Bionix anime block in Canada and on Adult Swim in the United States with a DVD release following. The live-action films briefly played in certain North American theaters, in 2008, before receiving home video releases. As of April 2015, the Death Note manga had over 30 million copies in circulation. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>In Tokyo, a disaffected high-school student named Light Yagami finds the "Death Note", a mysterious black notebook which can kill anyone as long as the user knows both the target's name and face. Initially terrified of its god-like power, Light considers the possibilities of the Death Note's abilities and kills high-profile Japanese criminals, then targeting international criminals. Five days after discovering the notebook, Light is visited by Ryuk, a "Shinigami" and the Death Note's previous owner. Ryuk, invisible to anyone who has not touched the notebook, reveals that he dropped the notebook into the human world out of boredom and is amused by Light's actions.</p>
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
                            $stmt->bindValue(':page_id', '14');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '14'";
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