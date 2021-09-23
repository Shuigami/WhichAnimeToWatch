<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Fairy Tail :)</title>
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
                $name = 'FairyTail';
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
                    echo "<script type='text/javascript'> document.location = 'FairyTail.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Fairy Tail</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Fairy Tail</h1>
            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Fantasy</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Hiro Mashima</p>
            <p>Published by : Kodansha</p>
            <p>Volumes : 63</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Shinji Ishihira</p>
            <p>Written by : Masashi Sogo</p>
            <p>Studio : A-1 Pictures</p>
            <p>Streaming Website : Netflix/ADN</p>
            <p>Episodes : 328</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Fairy Tail (stylized as FAIRY TAIL) is a Japanese manga series written and illustrated by Hiro Mashima.
                It was serialized in Kodansha's Weekly Shōnen Magazine from August 2006 to July 2017, with the
                individual chapters collected and published into 63 tankōbon volumes. The story follows the adventures
                of Natsu Dragneel, a member of the popular wizard guild Fairy Tail, as he searches the fictional world
                of Earth-land for the dragon Igneel. </p>
            <br>
            <p>The manga has been adapted into an anime series produced by A-1 Pictures, Dentsu Inc., Satelight, Bridge,
                and CloverWorks which was broadcast in Japan on TV Tokyo from October 2009 to March 2013. A second
                series was broadcast from April 2014 to March 2016. A third and final series aired from October 2018 to
                September 2019. The series has also inspired numerous spin-off manga, including a prequel by Mashima,
                Fairy Tail Zero, and a sequel storyboarded by him, titled Fairy Tail: 100 Years Quest. Additionally, A-1
                Pictures has developed nine original video animations and two animated feature films. </p>
            <br>
            <p>The manga series was originally licensed for an English language release in North America by Del Rey
                Manga, which began releasing the individual volumes in March 2008 and ended its licensing with the 12th
                volume release in September 2010. In December 2010, Kodansha USA took over the North American release of
                the series. The Southeast Asian network Animax Asia aired an English-language version of the anime for
                seven seasons from 2010 to 2015. The manga was also licensed in the United Kingdom by Turnaround
                Publisher Services and in Australia by Penguin Books Australia. The anime has been licensed by
                Funimation for an English-language release in North America. As of February 2020, Fairy Tail had 72
                million copies in print. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>The world of Earth-land is home to numerous guilds where wizards apply their magic for paid job requests.
                Natsu Dragneel, a Dragon Slayer wizard from the Fairy Tail guild, explores the Kingdom of Fiore in
                search of his missing adoptive father, the dragon Igneel. During his journey, he befriends a young
                celestial wizard named Lucy Heartfilia and invites her to join Fairy Tail. Lucy forms a team with Natsu
                and his cat-like Exceed partner, Happy, which is joined by other guild members: Gray Fullbuster, an ice
                wizard; Erza Scarlet, a magical knight; and Wendy Marvell and Carla, another Dragon Slayer and Exceed
                duo. The team embark on numerous missions together, which include subduing criminals, illegal dark
                guilds, and ancient Etherious demons created by Zeref, a wizard cursed with immortality and deadly
                power. </p>
            <br>
            <h2>Spoil</h2>
            <br>
            <p>After several adventures, Natsu and his companions find Zeref living in isolation on Fairy Tail's sacred
                ground of Sirius Island, where he expresses a desire to die for the atrocities he has committed. A
                battle over Zeref ensues between Fairy Tail and the dark guild Grimoire Heart, which attracts the
                attention of the evil black dragon Acnologia. The Fairy Tail wizards survive Acnologia's assault when
                the spirit of their guild's founder and Zeref's estranged lover, Mavis Vermillion, casts the defensive
                Fairy Sphere spell that places them into seven years of suspended animation. Later, Fairy Tail wages war
                against the Etherious dark guild Tartaros, who aim to unseal a book believed to contain E.N.D., Zeref's
                ultimate demon. When Acnologia returns to annihilate both guilds, Igneel – revealed to have sealed
                himself within Natsu – emerges to battle Acnologia, only to be killed in front of a helpless Natsu, who
                departs on a training journey to avenge Igneel. </p>
            <br>
            <p>After Natsu returns one year later, Fiore is invaded by the Alvarez Empire, a military nation ruled by
                Zeref, who intends to acquire Fairy Heart, a wellspring of infinite magic power housed within Mavis's
                equally cursed body preserved beneath Fairy Tail's guildhall. While battling Zeref, Natsu is informed of
                his own identity as both Zeref's younger brother and the true incarnation of E.N.D. (Etherious Natsu
                Dragneel), whom Zeref resurrected as a demon with the intention of being killed by him. When Natsu fails
                to do so, Zeref absorbs Fairy Heart from Mavis in a bid to rewrite the present timeline with one where
                he might prevent his own curse and Acnologia's rise to power. After Natsu defeats Zeref to stop the
                drastic changes to history his actions would create, Mavis lifts her and Zeref's curse by reciprocating
                his love, which kills them both. </p>
            <br>
            <p>Meanwhile, Fairy Tail and their allies detain Acnologia within a space-time rift created by the use of
                Eclipse, Zeref's time travel gate. However, Acnologia escapes while his disembodied spirit traps all of
                the present Dragon Slayers within the rift to maintain his godlike power. Lucy and the other wizards
                across the continent immobilize Acnologia's body within Fairy Sphere, while Natsu accumulates the other
                Dragon Slayers' magic and destroys Acnologia's spirit, killing him and freeing the Dragon Slayers from
                captivity. The following year, Natsu and his team depart on a century-old guild mission, continuing
                their adventures together. </p>
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
                            $stmt->bindValue(':page_id', '22');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '22'";
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