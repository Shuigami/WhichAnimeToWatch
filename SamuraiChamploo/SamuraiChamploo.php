<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Samurai Champloo :)</title>
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
                $name = 'SamuraiChamploo';
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
                    echo "<script type='text/javascript'> document.location = 'SamuraiChamploo.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Samurai Champloo</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Samurai Champloo</h1>
            <p>Genre : - Adventure</p>
            <div class="sousgenre"> - Historical</div>
            <div class="sousgenre"> - Samouraï</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Masaru Gotsubo</p>
            <p>Published by : Kadokawa Shoten</p>
            <p>Volumes : 2</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Shinichirō Watanabe</p>
            <p>Written by : - Shinji Obara</p>
            <p>Studio : Manglobe</p>
            <p>Streaming Website : Netflix</p>
            <p>Episodes : 26</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <h2>Plot</h2>
            <br>
            <p>A young girl named Fuu is working as a waitress in a tea shop when she is abused by a band of samurai. She is saved by a mysterious rogue named Mugen and a young rōnin named Jin. Mugen attacks Jin after he proves to be a worthy opponent. The pair begin fighting one another and inadvertently cause the death of the local magistrate's son. For this crime, they are to be executed. With help from Fuu, they are able to escape execution. In return, Fuu asks them to travel with her to find "the samurai who smells of sunflowers". </p>
            <br>
            <h2>Setting and style</h2>
            <br>
            <p>According to the director, the series is set during the Edo period, roughly sixty years after the end of the Sengoku period.[6] Samurai Champloo employs a blend of historical Edo-period backdrops with modern styles and references.[7] The show relies on factual events of Edo-era Japan, such as the Shimabara Rebellion ("Unholy Union"; "Evanescent Encounter, Part I"); Dutch exclusivity in an era in which an edict restricted Japanese foreign relations ("Stranger Searching"); ukiyo-e paintings ("Artistic Anarchy"); and fictionalized versions of real-life Edo personalities like Mariya Enshirou and Miyamoto Musashi ("Elegy of Entrapment, Verse 2"). The content and accuracy of the historical content is often distorted via artistic license. </p>
            <br>
            <h2>Characters</h2>
            <br>
            <ul class="character-list">
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/mugen.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Mugen</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>A brash vagabond from the penal colony of the Ryukyu Islands, Mugen is a 19-year-old wanderer with a wildly unconventional fighting style. Rude, lewd, vulgar, conceited, temperamental and psychotic, he is something of an antihero. He is fond of fighting and has a tendency to pick fights for petty reasons.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/jin.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Jin</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Jin is a 20-year-old reserved rōnin who carries himself in the conventionally stoic manner of a samurai of the Tokugawa era. Using his waist-strung daishō, he fights in the traditional kenjutsu style of a samurai trained in a prominent, sanctioned dojo. He is pursued by several members of his dojo as he had killed their master in self-defense.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/Fuu.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Fuu</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>A spirited 15-year-old girl, Fuu asks Mugen and Jin to help her find a sparsely described man she calls "the samurai who smells of sunflowers". Her father left her and her mother for an unknown reason.</p>
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
                            $stmt->bindValue(':page_id', '54');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '54'";
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