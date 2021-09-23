<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>7 seeds :)</title>
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
                $name = '7seeds';
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
                    echo "<script type='text/javascript'> document.location = '7seeds.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">7 seeds</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>7 seeds</h1>
            <p>Genre : - Science fiction</p>
            <div class="sousgenre">- Survival</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Yumi Tamura</p>
            <p>Published by : Shogakukan</p>
            <p>Volumes : 35</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Yukio Takahashi</p>
            <p>Written by : Tōko Machida</p>
            <p>Studio : Gonzo (#1–24)</p>
            <div class="sousgenre2">- Studio Kai (#13–24)</div>
            <p>Streaming Website : Netflix</p>
            <p>Episodes : 24</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>7 Seeds (stylized as 7SEEDS) is a Japanese manga series written and illustrated by Yumi Tamura. It is set
                in a post-apocalyptic future, long enough after a meteorite hits Earth that new species have evolved,
                and follows the struggles of five groups of young adults to survive after they are revived from cryonic
                preservation. The title comes from five groups of individuals in cryogenic chambers along with supplies,
                called "seeds", laid down by the Japanese government. </p>
            <br>
            <p>The manga was originally serialized in Shogakukan's Bessatsu Shōjo Comic magazine, premiering in the
                November 2001 issue; it transferred to Flowers magazine in April 2002, where it ran until its conclusion
                in May 2017. Shogakukan collected the individual chapters into 35 bound volumes. The series won the 52nd
                Shogakukan Manga Award for Best Shōjo Manga in 2007. Including digital sales, it has sold more than 6
                million copies in Japan. </p>
            <br>
            <p>An original net animation (ONA) anime adaptation, produced by Gonzo and directed by Yukio Takahashi, was
                announced in November 2018. The first season was released worldwide on Netflix in June 2019. A second
                season produced by Studio Kai premiered on 26 March 2020. </p>
            <br>
            <h1>Story</h1>
            <br>
            <p>When astronomers predict that the Earth will be hit by a meteorite, the world leaders meet to develop a
                plan for human survival called the Seven Seeds project. Each country agrees to preserve numbers of
                healthy young people through cryogenics, which will allow them to survive the devastation of the impact.
                After a computer determines that Earth is once again safe for human life, it will revive each group.
            </p>
            <br>
            <p>The Japanese government creates five groups of survivors named Winter, Spring, Summer A, Summer B, and
                Fall. Each group consists of seven members, who are not told about what will happen before they are
                placed in cryonic preservation, and one adult guide who is trained in wilderness survival. These groups
                are scattered across Japan: the Summer groups in southern and northern Kyūshū, Fall in western Honshū,
                Spring in central Honshū near Tokyo, and Winter in Hokkaidō. </p>
            <br>
            <p>Awoken from the cryogenic sleep many years later, the young men and women find themselves amidst a
                hostile environment bare of any human life. Their former home country Japan has greatly changed.
                Completely alone, they must depend only on themselves to survive in the new world. </p>
            <br>
            <!-- <div class="streaming-website">
                <h1>Website : <a href="https://www.adkami.com/anime/3473/1/1/2/1/">https://www.adkami.com/anime/3473/1/1/2/1/</a></h1>
            </div> -->
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
                            $stmt->bindValue(':page_id', '1');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '1'";
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