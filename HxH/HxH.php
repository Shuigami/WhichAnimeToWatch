<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hunter X Hunter :)</title>
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
                $name = 'HxH';
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
                    echo "<script type='text/javascript'> document.location = 'HxH.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Hunter X Hunter</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>
    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Hunter X Hunter</h1>

            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Fantasy</div>
            <div class="sousgenre">- Martial Arts</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Yoshihiro Togashi</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 36</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Hiroshi Kōjina</p>
            <p>Studio : Madhouse</p>
            <p>Streaming Website : Netflix/ADN</p>
            <p>Episodes : 148</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Hunter × Hunter (stylized as HUNTER×HUNTER; pronounced "Hunter Hunter") is a Japanese manga series
                written and illustrated by Yoshihiro Togashi. It has been serialized in
                Shueisha's Weekly Shōnen Jump since March 1998, although the manga has frequently gone on extended
                hiatuses since 2006. Its chapters have been collected in 36 tankōbon
                volumes as of October 2018. The story focuses on a young boy named Gon Freecss who discovers that his
                father, who left him at a young age, is actually a world-renowned
                Hunter, a licensed professional who specializes in fantastical pursuits such as locating rare or
                unidentified animal species, treasure hunting, surveying unexplored
                enclaves, or hunting down lawless individuals. Gon departs on a journey to become a Hunter and
                eventually find his father. Along the way, Gon meets various other Hunters
                and encounters the paranormal.</p>
            <br>
            <h1>Setting</h1>
            <br>
            <p>Hunters (ハンター, Hantā) are licensed, elite members of humanity who are capable of tracking down secret
                treasures, rare beasts, or even other individuals. They can also
                access locations that regulars cannot access. To obtain a license one must pass the rigorous annual
                Hunter Examination run by the Hunter Association, which has a
                success rate of less than one in a hundred-thousand. A Hunter may be awarded up to three stars: a single
                star for making "remarkable achievements in a particular
                field"; they may then be upgraded to two stars for "holding an official position" and mentoring another
                Hunter up to single star level; and finally upgraded to three
                stars for "remarkable achievements in multiple fields.</p>
            <br>
            <p>Nen (念) is the ability to control one's own life energy or aura, which is constantly emitted from them
                whether they know it or not. There are four basic Nen techniques:
                Ten (纏) maintains the aura in the body, strengthening it for defense; Zetsu (絕) shuts the aura flow off,
                useful for concealing one's presence and relieving fatigue; Ren
                (練) enables a user to produce more Nen; and Hatsu (發) is a person's specific use of Nen.[6] Nen users
                are classified into six types based on their Hatsu abilities;
                Enhancers (強化系, Kyōkakei) strengthen and reinforce their natural physical abilities; Emitters (放出系,
                Hōshutsukei) project aura out of their bodies; Manipulators
                (操作系, Sōsakei) control objects or living things; Transmuters (変化系, Henkakei) change the type or
                properties of their aura; Conjurers (具現化系, Gugenkakei) create
                objects out of their aura; and Specialists (特質系, Tokushitsukei) have unique abilities that do not fall
                into the previous categories.[7] A Nen user can enter into a
                Contract (誓約, Seiyaku) where, by pledging to follow certain Limitations (制約, Seiyaku), their abilities
                are strengthened in relation to how strict they are. An example
                of this is Kurapika who, in order to have an unbreakable chain that will hold members of the Phantom
                Troupe no matter what, offered his life, should he use it on anyone
                other than its members.</p>
            <br>
            <h1>Plot (Spoil Saison 1)</h1>
            <br>
            <p>The story follows a young boy named Gon Freecss, who was told all his life that both his parents were
                dead. But when he learns from Kite, an apprentice of his father Ging
                Freecss, that he is still alive and has since become an accomplished Hunter, Gon leaves his home on
                Whale Island (くじら島, Kujira Tō) to take the Hunter Examination
                (ハンター試験, Hantā Shiken) in order to become a Hunter like him.[9][10][11] During the exam, Gon meets and
                soon befriends three of the other applicants: Kurapika,
                the last remaining member of the Kurta clan who wishes to become a Hunter in order to avenge his clan
                and recover their scarlet-glowing eyes that were plucked from their
                corpses by a band of thieves known as the Phantom Troupe; Leorio, a prospective physician who, in order
                to pay for medical school, desires the financial benefits that
                Hunters receive; and Killua Zoldyck, another twelve-year-old boy who has left his former life as a
                member of the world's most notorious assassin family.[10][11][3] Among
                many other examinees, Gon continuously encounters Hisoka, a mysterious and deadly transmuter who takes
                an interest in him. After passing by many trials together, Gon and
                his friends end up passing the exam except for Killua, who fails after killing another applicant due to
                being controlled by his brother, Illumi, and runs away to his
                family's estate in shame.</p>
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
                            $stmt->bindValue(':page_id', '31');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '31'";
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