<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>I want to eat your pancreas :)</title>
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
                $name = 'IWantToEatYourPancreas';
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
                    echo "<script type='text/javascript'> document.location = 'IWantToEatYourPancreas.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">I want to eat your pancreas</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>I want to eat your pancreas</h1>
            <p>Genre : - Coming-of-age</p>
            <div class="sousgenre">- Drama</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Izumi Kirihara</p>
            <p>Published by : Futabasha</p>
            <p>Volumes : 2</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Shinichirō Ushijima</p>
            <p>Written by : Shinichirō Ushijima</p>
            <p>Studio : Studio VOLN</p>
            <p>Streaming Website : Netflix</p>
            <p>Episodes : 22</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>I Want to Eat Your Pancreas (Japanese: 君の膵臓をたべたい, Hepburn: Kimi no Suizō o Tabetai), also known as Let Me
                Eat Your Pancreas, is a light novel by the Japanese writer Yoru Sumino. Initially serialized as a web
                novel in the user-generated site Shōsetsuka ni Narō in 2014, the book was published in print in 2015 by
                Futabasha. A manga adaptation ran from 2016 to 2017. A live-action film titled Let Me Eat Your Pancreas
                premiered in 2017, and an anime film adaptation titled I Want to Eat Your Pancreas on 1 September 2018.
            </p>
            <br>
            <h2>Plot</h2>
            <br>
            <p>Haruki comes across a book in a hospital waiting room. He soon discovers that it is a diary kept by his
                very popular classmate, Sakura, who reveals to him that she is secretly suffering from a fatal
                pancreatic illness. Despite this, Sakura intends to maintain a normal school life, and thus is drawn to
                Haruki due to his relatively unfazed reaction to her condition. They begin to spend time together and
                become friends. </p>
            <br>
            <p>One school break, Sakura invites Haruki on a train trip to Fukuoka during which the two play
                truth-or-dare and eventually share a bed in their hotel. Afterwards, Sakura's friends and classmates
                grow suspicious and resentful of Haruki's newfound closeness to her. The two begin doing activities from
                Sakura's bucket list together, until Sakura is suddenly hospitalized.</p>
            <br>
            <h3>Spoil</h3>
            <br>
            <p>During her hospitalization, the two sneak out to see fireworks together. When Sakura is discharged she
                messages Haruki inviting him to lunch, but does not show up their meeting spot. Later that night, Haruki
                is watching the news with his family, which reveals that Sakura was stabbed on her way home and that she
                is dead. He breaks down and does not attend her funeral. </p>
            <br>
            <p>Later, he visits her mother and asks for Sakura's diary. Her mother recognizes him, and reveals Sakura
                left a letter for him. The letter tells him to keep the diary and to make her best friend Kyouko read
                it, as she was unaware of Sakura's illness and hated Haruki. Soon after Haruki reads the letter, he
                immediately breaks down into tears as he never felt so much sorrow for a single person before. Before
                leaving, Sakura's mother asks for his name. He replies "Haruki" to which she replies, "so you two were
                meant to be," explaining the meaning of their names, Haruki (spring tree) and Sakura (cherry blossom).
                He meets with Kyouko, who is in denial that Sakura ever lied to her, but after reading the diary she
                runs away. Haruki runs after and asks her to be his friend, for it was Sakura who made him open up to
                people and he wants to honor her memory. The movie ends with Haruki and Kyouko visiting Sakura's grave a
                year later, the two of them having become friends– and that Kyouko might soon be dating Issei Miyata
                (the classmate that keeps offering bubblegums to Haruki). </p>
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
                            $stmt->bindValue(':page_id', '32');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '32'";
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