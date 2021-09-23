<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>My Hero Academia :)</title>
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
                $name = 'MHA';
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
                    echo "<script type='text/javascript'> document.location = 'MHA.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">My Hero Academia</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>My Hero Academia</h1>
            <p>Genre : - Adventure</p>
            <div class="sousgenre"> - Fantasy</div>
            <div class="sousgenre"> - Superhero</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Kōhei Horikoshi</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 30</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Kenji Nagasaki</p>
            <div class="sousgenre2"> - Tomo Ōkubo (#39–51)</div>
            <div class="sousgenre2"> - Masahiro Mukai (#64–)</div>
            <p>Written by : - Yōsuke Kuroda</p>
            <p>Studio : Bones</p>
            <p>Streaming Website : ADN</p>
            <p>Episodes : 104 </p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>My Hero Academia (Japanese: 僕のヒーローアカデミア, Hepburn: Boku no Hīrō Akademia) is a Japanese superhero manga
                series written and illustrated by Kōhei Horikoshi. The story follows Izuku Midoriya, a boy born without
                superpowers (called Quirks) in a world where they have become commonplace, but who still dreams of
                becoming a superhero himself. He is scouted by All Might, Japan's greatest hero, who chooses Midoriya as
                his successor and shares his Quirk with him after recognizing his potential, and later helps to enroll
                him in a prestigious high school for heroes in training. </p>
            <br>
            <p>The series has been serialized in Weekly Shōnen Jump since July 2014, with its chapters additionally
                collected into 30 tankōbon volumes as of April 2021. The series has also inspired numerous spin-off
                manga, such as My Hero Academia Smash!!, My Hero Academia: Vigilantes and My Hero Academia: Team-Up
                Missions, as well as an anime television series by Bones. </p>
            <br>
            <p>Its first season aired in Japan from April to June 2016, followed by a second season from April to
                September 2017, then a third season from April to September 2018, a fourth season from October 2019 to
                April 2020, and a fifth season premiered in March 2021. It has also received three animated spinoff
                films, titled My Hero Academia: Two Heroes, My Hero Academia: Heroes Rising, and My Hero Academia: World
                Heroes Mission respectively. There are plans for a live-action film by Legendary Entertainment. </p>
            <br>
            <p>The manga won the 2019 Harvey Award for Best Manga. As of April 2021, the manga has over 50 million
                copies in circulation worldwide. Both the manga and anime adaptation have received an overwhelming
                positive response from both critics and audiences, and are considered one of the best series of the
                2010s. </p>
            <br>
            <h1>Synopsis</h1>
            <br>
            <h2>Setting</h2>
            <br>
            <p>The story of My Hero Academia is set in a world where currently most of the human population has gained
                the ability to develop superpowers called "Quirks" (個性, Kosei), which occur in children within the age
                of four: it is estimated that around 80% of the world population has a Quirk. There are infinite types
                of Quirks, and it is extremely unlikely to find two people who have the exact same power, unless they
                are closely related. These particular abilities have allowed the development of a new category of
                people: Heroes, who face the evil-voted individuals who use the Quirks for selfish and criminal
                purposes, commonly known as Villains. In addition, Heroes who choose to exercise heroism at work level
                are recognized as Pro Heroes. </p>
            <br>
            <h2>Premise</h2>
            <br>
            <p>The series focuses on Izuku Midoriya, a young man who dreams of becoming a Hero despite being bullied by
                his violent childhood friend Katsuki Bakugo for lacking a Quirk. Both youths idolize one of the world's
                greatest heroes All Might, who they both met with Izuku being one of few to know of a critical injury
                All Might has been concealing from the public eye to maintain morale. All Might also reveals the nature
                of his Quirk "One For All" and passes it down to Izuku to succeed him after seeing the youth's
                determination in the face of danger. As Izuku begins his path to becoming a hero in attending U.A. High
                School (雄英高校, Yūei Kōkō) alongside Bakugo and the friends they make in Class 1-A, a nemesis to the "One
                For All" users named All For One conditions his apprentice Tomura Shigaraki to destroy the current
                society and its heroes. </p>
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
                            $stmt->bindValue(':page_id', '42');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '42'";
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