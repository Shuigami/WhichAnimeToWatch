<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Lie In April :)</title>
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
                $name = 'YourLieInApril';
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
                    echo "<script type='text/javascript'> document.location = 'YourLieInApril.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Your Lie In April</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Your Lie In April</h1>
            <p>Genre : - Musical</p>
            <div class="sousgenre">- Romantic</div>
            <div class="sousgenre">- Drama</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Naoshi Arakawa</p>
            <p>Published by : Kodansha</p>
            <p>Volumes : 11</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Kyōhei Ishiguro</p>
            <p>Written by : Takao Yoshioka</p>
            <p>Studio : A-1 Pictures</p>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 22</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Your Lie in April, known in Japan as Shigatsu wa Kimi no Uso (四月は君の嘘) or Kimiuso for short, is a Japanese
                manga series written and illustrated by Naoshi Arakawa. The series was serialized in Kodansha's Monthly
                Shōnen Magazine from April 2011 to May 2015. The story follows a young pianist named Kо̄sei Arima, who
                loses the ability to hear the piano after his mother's death. </p>
            <br>
            <p>An anime television series adaptation by A-1 Pictures aired from October 2014 to March 2015 on Fuji TV's
                Noitamina block. A live-action film adaptation of the same name was released in September 2016. The
                series has also been adapted into a stage play, a light novel, and it was set to be adapted into a
                musical, but it was canceled. </p>
            <br>
            <p>The series was generally received very well, with many critics giving praise to the animation, the
                soundtrack, and the ending. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>Piano prodigy Kōsei Arima dominates various music competitions and becomes famous among child musicians.
                When his mother Saki dies suddenly, he has a mental breakdown while performing at a piano recital; this
                results in him no longer being able to hear the sound of his piano even though his hearing is otherwise
                perfectly fine. </p>
            <br>
            <p>Two years later, Kōsei has not touched the piano and views the world in monochrome, without any flair or
                color. He resigns himself to living out his life with his good friends Tsubaki and Watari, until one
                day, a girl changes everything. Kaori Miyazono, an audacious, free-spirited, fourteen-year-old violinist
                whose playing style reflects her manic personality. She helps Kōsei return to the music world and shows
                him that it should be free and mold-breaking, unlike the structured and rigid style Kōsei was used to.
                As she continues to uplift him, he quickly realizes that he loves her, although she already likes
                Watari. </p>
            <br>
            <h3>Spoil</h3>
            <br>
            <p>Later, while performing together, Kaori suddenly collapses after a moving performance and is
                hospitalised. At first Kaori says that she is anaemic and just needs some routine testing, but this is
                revealed to be a lie. Kaori is discharged and back to her happy self, inviting Kōsei to play at a Gala
                with her. However, Kaori fails to show up on the day of the Gala, and as her health deteriorates, she
                becomes dejected. Kōsei plays a duet with Nagi Aiza, in the hope of motivating her. After listening to
                it, Kaori opts for a risky surgery that may kill her if it fails, just so that she can play with him one
                more time. While playing in the finals of the Eastern Japan Piano Competition, Kōsei sees Kaori's spirit
                accompanying him and eventually realizes that she has died during the surgery. </p>
            <br>
            <p>A letter written by Kaori was given to Kōsei by her parents at her funeral. The letter reveals that she
                was aware that she was about to die, so she became more free-spirited, both as a person and in her
                music, in order to not take her regrets to Heaven. She also reveals that she had been in love with Kōsei
                since she was five, and was inspired to play the violin so that she could one day play with him. Her
                supposed feelings towards Watari was a lie, fabricated in order to get closer to Kōsei without hurting
                Tsubaki, who also has limerent feelings towards Kōsei. After finding this out, Tsubaki confronts Kōsei
                and tells him that she will be by his side for the rest of her life. Kaori also leaves behind a picture
                of her as a child coming back from the concert that inspired her, with Kōsei in the background walking
                back home. Kōsei later frames this picture. </p>
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
                            $stmt->bindValue(':page_id', '66');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '66'";
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