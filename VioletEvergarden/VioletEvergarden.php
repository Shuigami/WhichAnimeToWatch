<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Violet Evergarden :)</title>
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
                $name = 'VioletEvergarden';
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
                    echo "<script type='text/javascript'> document.location = 'Violet Evergarden.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Violet Evergarden</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Violet Evergarden</h1>
            <p>Genre : - Coming-of-age</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Taichi Ishidate</p>
            <div class="sousgenre2"> - Haruka Fujita</div>
            <p>Written by : - Reiko Yoshida</p>
            <div class="sousgenre2"> - Takaaki Suzuki</div>
            <div class="sousgenre2"> - Tatsuhiko Urahata</div>
            <p>Studio : Kyoto Animation</p>
            <p>Episodes : 13</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Violet Evergarden (Japanese: ヴァイオレット・エヴァーガーデン, Hepburn: Vaioretto Evāgāden) is a Japanese light novel series written by Kana Akatsuki and illustrated by Akiko Takase. It won the grand prize in the fifth Kyoto Animation Award's novel category in 2014, the first ever work to win a grand prize in any of the three categories (novel, scenario, and manga). Kyoto Animation published the first light novel on December 25, 2015, under their KA Esuma Bunko imprint</p>
            <br>
            <p>A 13-episode anime television series adaptation by Kyoto Animation aired between January and April 2018 with several advance screenings taking place in 2017. The series was awarded Best Animation at the 2019 Crunchyroll Anime Awards. An original video animation episode was released in July 2018, and a spin-off film premiered in Japan in September 2019. A second anime film, Violet Evergarden: The Movie, was released on September 18, 2020.</p>
            <br>
            <h2>Plot</h2>
            <br>
            <p>The story revolves around Auto Memory Dolls (自動手記人形, Jidō Shuki Ningyō): people initially employed by a scientist named Dr. Orland to assist his blind wife Mollie in writing her novels, and later hired by other people who needed their services. In the present time, the term refers to the industry of writing for others. The story follows Violet Evergarden's journey of reintegrating back into society after the war is over and her search for her life's purpose now that she is no longer a soldier in order to understand the last words her mentor and guardian, Major Gilbert, had told her: "I love you." </p>
            <br>
            <ul class="character-list">
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/violet.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Violet Evergarden</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Violet is a newcomer to the CH Postal Company, and works as an Auto Memory Doll—a ghostwriter for people who cannot write or are looking for help expressing their emotions in letters. As an abandoned and nameless child, Violet was found by navy officer Dietfried Bougainvillea on an island where he and several members of his crew were forced to land after a naval engagement.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/gilbert.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Gilbert Bougainvillea</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>A major in the Leidenschaftlich Army, Gilbert came from an aristocratic family. Although he treasures Violet much more than anything else, he never expressed his feelings to her because of their identity as soldiers. It is his final words to her—"I love you"—that drive her to move forward on her new path as an Auto Memory Doll.</p>
                    </div>
                </li>
            </ul>
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
                            $stmt->bindValue(':page_id', '63');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '63'";
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