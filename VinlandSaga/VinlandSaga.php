<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Vinland Saga :)</title>
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
                $name = 'VinlandSaga';
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
                    echo "<script type='text/javascript'> document.location = 'VinlandSaga.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Vinland Saga</h1>
        <img class="baniere" src="images/baniere.png">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Vinland Saga</h1>
            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Epic</div>
            <div class="sousgenre">- Historical</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Makoto Yukimura</p>
            <p>Published by : Kodansha</p>
            <p>Volumes : 24</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Shūhei Yabuta</p>
            <p>Written by : Hiroshi Seko</p>
            <div class="sousgenre2">- Kenta Ihara</div>
            <p>Studio : Wit Studio</p>
            <p>Streaming Website : Prime</p>
            <p>Episodes : 24</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Vinland Saga (Japanese: ヴィンランド・サガ, Hepburn: Vinrando Saga) is a Japanese historical manga series written
                and illustrated by manga author Makoto Yukimura. The series is published by Kodansha, and was first
                serialized in the youth-targeted Weekly Shōnen Magazine before moving to the monthly manga magazine
                Monthly Afternoon, aimed at young adult men. As of November 2019, the series has been compiled into
                twenty-three bound volumes. Vinland Saga has also been licensed for English-language publication by
                Kodansha USA. </p>
            <br>
            <p>The title, Vinland Saga, would evoke associations to Vinland as described in two Norse sagas. Vinland
                Saga is, however, set in Dane-controlled England at the start of the 11th century, and features the
                Danish invaders of England, commonly known as Vikings. The story combines a dramatization of King Cnut
                the Great's historical rise to power with a revenge plot centered on the historical explorer Thorfinn,
                the son of a murdered ex-warrior who serves under a group of mercenaries responsible for the deed. </p>
            <br>
            <p>A 24-episode anime television series adaptation by Wit Studio aired on NHK General TV from July to
                December 2019. </p>
            <br>
            <p>Vinland Saga had over 5 million copies in circulation as of 2018. In 2012, the series won the 36th
                Kodansha Manga Award for Best General Manga. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <h2>Setting</h2>
            <br>
            <p>Vinland Saga is initially set mostly in 1013 AD England, which has been mostly conquered by the Danish
                King Sweyn Forkbeard. As King Sweyn nears death, his sons, Prince Harald and Prince Canute, are arguing
                over his succession. The story draws elements from historical accounts of the period such as The
                Flateyjarbók, The Saga of the Greenlanders and The Saga of Eric the Red.[5][6] </p>
            <br>
            <h2>Plot</h2>
            <br>
            <p>Fifteen years ago the Viking commander, Thors Snorresson, deserted a sea battle and commenced a peaceful
                life in Iceland with his wife Helga. Now, in the year 1002, their young son, Thorfinn, longs to see the
                paradise called Vinland. One day, the Jomsviking Floki arrives at Thorfinn's village to enlist Thors
                into battle, who is revealed to be a former Jomsviking himself. However, Floki's true motive is to
                murder Thors as punishment for deserting fifteen years prior. Thorfinn sneaks on his father's ship
                despite his orders to remain home, and the ship is eventually lured into a trap at the Faroe Islands and
                ambushed by a band of mercenaries led by Askeladd, with whom Floki had conspired to kill Thors. With his
                great strength and skill, Thors at first fights off the attackers even without using deadly force, but
                submits to execution after Thorfinn is taken hostage. After his father's death, Thorfinn joins
                Askeladd's crew in order to avenge his father and constantly challenges his commander to various duels.
            </p>
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
                            $stmt->bindValue(':page_id', '62');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '62'";
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