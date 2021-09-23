<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Steins;Gate :)</title>
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
                $name = 'Steins;Gate';
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
                    echo "<script type='text/javascript'> document.location = 'Steins;Gate.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Steins;Gate</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Steins;Gate</h1>
            <p>Genre : - Science fiction</p>
            <div class="sousgenre"> - Romance</div>
            <div class="sousgenre"> - Mystery</div>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Hiroshi Hamasaki</p>
            <div class="sousgenre2"> - Takuya Sato</div>
            <p>Written by : - Jukki Hanada</p>
            <p>Studio : White Fox</p>
            <p>Episodes : 24</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Steins;Gate (シュタインズ・ゲート, Shutainzu Gēto) is a Japanese visual novel developed by 5pb. and Nitroplus, and was released on October 15, 2009 for the Xbox 360. This is the two companies' second time collaborating together after Chaos;Head. A port to the Windows operating system on the PC was released on August 26, 2010 and a port for Sony's PlayStation Portable handheld game console will be released in June, 2011. The game is described by the development team as a "hypothetical science adventure game" (想定科学ADV, Sōtei Kagaku ADV). The gameplay in Steins;Gate follows a linear plot line which offers pre-determined scenarios with courses of interaction. </p>
            <br>
            <p>The Steins;Gate anime is an adaptation of the visual novel Steins;Gate, originally developed by 5pb and Nitroplus. The anime series was produced by White Fox and directed by Hiroshi Hamasaki and Takuya Satō, with composition by Jukky Hanada and music by Takeshi Abo and Murakami Jun. </p>
            <br>
            <p>The Steins;Gate anime adaptation was initially announced on July 25, 2010, by Chiyomaru Shikura on his Twitter account, with further details being revealed on the September 2010 issues of the Japanese magazines Newtype and Comptiq. The anime started airing in Japan on April 6, 2011, spanning a total of 24 episodes and an OVA. </p>
            <br>
            <p>The story of Steins;Gate takes place in Akihabara and is about a group of friends who have customized their microwave into a device that can send text messages to the past. As they perform different experiments, an organization named SERN who has been doing their own research on time travel tracks them down and now the characters have to find a way to avoid being captured by them. Steins;Gate has been praised for its intertwining storyline and the voice actors have been commended for their portrayal of the characters. A manga adaptation of the story illustrated by Sarachi Yomi began serialization in Media Factory's Monthly Comic Alive magazine on September 26, 2009. A second manga series illustrated by Kenji Mizuta began serialization in Mag Garden's Monthly Comic Blade on December 28, 2009. An anime adaptation began airing on April 6, 2011. </p>
            <br>
            <br>
            <ul class="character-list">
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/okabe.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Rintaro Okabe</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Rintaro Okabe (岡部 倫太郎 Okabe Rintarō?), often nicknamed Okarin (オカリン) or Hououin Kyouma (鳳凰院凶真), is a self-proclaimed mad scientist and the main protagonist of the Steins;Gate series.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/makise.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Kurisu Makise</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Kurisu Makise (牧瀬 紅莉栖 Makise Kurisu?) is the daughter of Shouichi Makise, a genius girl who graduated from university at the age of seventeen, and a member of the Brain Science Institute at Viktor Chondria University and the Future Gadget Lab. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/hashida.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Itaru Hashida</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Itaru Hashida (橋田至, Hashida Itaru), also known by his nickname Daru, his online handle DaSH ("Daru the Super Hacker"), and Barrel Titor, is an experienced hacker and a hardcore otaku. He is a member of the Future Gadget Lab and a close friend of Rintaro Okabe. He also eventually becomes the husband of Yuki Amane and the father of Suzuha Amane. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/shiina.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Mayuri Shiina</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Mayuri Shiina (椎名 まゆり, Shīna Mayuri), also known as Mayushii☆, is Rintaro Okabe's childhood friend, a part-time worker at May Queen Nyan-nyan and a member of the Future Gadget Lab. She is also an avid cosplay maker and friend of Luka Urushibara and Akiha Rumiho. </p>
                    </div>
                </li>
            </ul>
            <br>
            <br>
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
                            $stmt->bindValue(':page_id', '55');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '55'";
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