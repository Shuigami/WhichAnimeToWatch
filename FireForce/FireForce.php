<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Fire Force :)</title>
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
                $name = 'FireForce';
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
                    echo "<script type='text/javascript'> document.location = 'FireForce.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Fire Force</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Fire Force</h1>

            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Dark fantasy</div>
            <div class="sousgenre">- Science fiction</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Atsushi Ōkubo</p>
            <p>Published by : Kodansha</p>
            <p>Volumes : 28</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : Yuki Yase (S1))</p>
            <div class="sousgenre2">- Tatsuma Minamikawa (S2</div>
            <p>Written by : Yamato Haijima (S1)</p>
            <div class="sousgenre2">- Tatsuma Minamikawa (S2</div>
            <p>Streaming Website : Wakanim</p>
            <p>Episodes : 48 </p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Fire Force (Japanese: 炎炎ノ消防隊, Hepburn: En'en no Shōbōtai, lit. "Blazing Fire Brigade") is a Japanese
                manga series written and illustrated by Atsushi Ōkubo. It has been serialized in Kodansha's Weekly
                Shōnen Magazine since September 2015, and collected into 28 tankōbon volumes as of April 2021. In North
                America, the manga has been licensed for English language release by Kodansha USA. </p>
            <br>
            <p>An anime television series adaptation by David Production aired from July to December 2019 on the MBS's
                Super Animeism block. A second season aired from July to December 2020. The anime television series has
                been licensed by Funimation. </p>
            <h1>Synopsis</h1>
            <br>
            <h2>Setting</h2>
            <br>
            <p>The Great Cataclysm (大災害, Daisaigai) is an event that happened two hundred and fifty years ago, 50 years
                before the Solar year 198, with many nations wiped out when the world was set on fire with only few
                inhabitable areas left in the aftermath. The survivors took refuge in the Tokyo Empire, which remained
                mostly stable during the period despite losing some of its landmass. The Tokyo Emperor Raffles I
                establishes the faith of the Holy Sol Temple as it and Haijima Industries developed the perpetual
                thermal energy plant Amaterasu to power the country. In Year 198 of Tokyo's Solar Era, special fire
                brigades called the Fire Force fight increasing incidents of spontaneous human combustion where human
                beings are turned into living infernos called "Infernals" (焰ビト, Homura Bito). While the Infernals are
                first generation cases of spontaneous human combustion, with more powerful horned variations known as
                Demons, later generations possess pyrokinesis while retaining human form. The Fire Force was formed by
                combining people with these powers from the Holy Sol Temple, The Tokyo Armed Forces, and the Fire
                Defense Agency, and is composed of eight independent companies. </p>
            <br>
            <h2>Plot</h2>
            <br>
            <p>Shinra Kusakabe is a third generation pyrokinetic youth who gained the nickname "Devil's Footprints" for
                his ability to ignite his feet at will, and was ostracized as a child for the fire that killed his
                mother and younger brother Sho 12 years ago. He joins Special Fire Force Company 8, which features other
                pyrokinetics who dedicated themselves to ending the Infernal attacks for good while investigating
                Companies 1 through 7 for potential corruption in their ranks. Shinra begins to learn that the fire that
                killed his mom was a cover for Sho to be taken by the White Clad, a doomsday cult behind the Infernal
                attacks with agents within the facets of the Tokyo Empire. Company 8 and their allies oppose the White
                Clad while learning of their goal to gather eight individuals like Shinra and Sho to repeat the Great
                Cataclysm for an ancient being who manipulated humanity for that very purpose. </p>
        </div>

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
                            $stmt->bindValue(':page_id', '23');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '23'";
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