<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Dr Stone :)</title>
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
                $name = 'DrStone';
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
                    echo "<script type='text/javascript'> document.location = 'DrStone.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Dr Stone</h1>
        <img class="baniere" src="images/baniere.png">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Dr Stone</h1>
            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Science Fiction</div>
            <div class="sousgenre">- Post-apocalyptic</div>
            <div class="sousgenre">- Science</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Riichiro Inagaki</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 20 </p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Shinya Iino</p>
            <p>Written by : Yuichiro Kido</p>
            <p>Studio : TMS/8PAN</p>
            <p>Streaming Website : ADN</p>
            <p>Episodes : 24</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Dr. Stone (stylized as Dr.STONE) is a Japanese manga series written by Riichiro Inagaki and illustrated
                by the South Korean artist Boichi. It has been serialized in Shueisha's Weekly Shōnen Jump since March
                2017, with its chapters collected in twenty tankōbon volumes as of April 2021. The story follows teenage
                scientific genius Senku Ishigami, who plans to rebuild civilization after humanity was mysteriously
                petrified for 3,700 years. Viz Media licensed the manga in North America. Shueisha began to simulpublish
                the series in English on the website and app Manga Plus since January 2019. </p>
            <br>
            <p>An anime television series adaptation by TMS Entertainment aired from July to December 2019. A second
                season of the anime series focused on the "Stone Wars" arc aired from January to March 2021. A third
                season has been announced. </p>
            <br>
            <p>As of April 2021, the Dr. Stone manga had over 10 million copies in circulation. In 2019, Dr. Stone won
                the 64th Shogakukan Manga Award for the shōnen category. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>Beginning in April 5738 CE, it's been over 3,700 years since a mysterious flash petrified nearly all
                human life. A 15-year-old genius named Senku Ishigami is suddenly revived to find himself in a world
                where all traces of human civilization have been eroded by time. Senku sets up a base-camp and begins to
                study the petrified humans in order to determine the cause of the event, as well as a cure. </p>
            <br>
            <p>Over the next 6 months, Senku's friend Taiju Oki wakes up and Senku learns their revival was made
                possible with nitric acid. With this discovery, they develop a compound that will allow them to
                instantly revive others. They begin by reviving a famous martial artist named Tsukasa Shishiō, and their
                classmate (and Taiju's crush) Yuzuriha Ogawa, with the goal of rebuilding civilization with a focus on
                science. </p>
            <br>
            <p>Tsukasa ultimately reveals that he opposes Senku's idea of forming a new scientific civilization,
                believing the old world was tainted and should not be restored. Instead, he desires to establish a new
                world order based on power and strength, going so far as to destroy any petrified adults he encounters
                in order to prevent them from interfering with his goals. </p>
            <br>
            <p>After extorting the formula for the revival compound from Senku, Tsukasa attempts to murder him when he
                realized that Senku knows how to create weapons that he cannot defend against. Believing he successfully
                killed Senku, Tsukasa leaves to begin establishing his own faction in the Stone World. </p>
            <br>
            <p>After recovering from his near death experience, Senku discovers a tribe of people already living on the
                planet and sees this as an opportunity to create his Kingdom of Science. These people are originally
                hesitant, but eventually learn the benefits that science can bring to their survival. Over time, Senku
                becomes more trusted by the tribe, eventually being taught of their past – where he discovers that the
                village was started by his adoptive father, along with five other astronauts, who were unaffected due to
                being in the International Space Station at the time of the petrification event. </p>
            <br>
            <p>Together with his new allies and friends, Senku's Kingdom of Science engages in a war with Tsukasa's
                clan, ultimately emerging victorious and affirming themselves as a force to be reckoned with. After the
                victory they discover that Senku's adopted father had left precious metals which can be used as
                catalysts to mass produce revival fluid in the nearby island which is now inhabited by a tribe known as
                the Petrification Kingdom, who possess the device used to petrify the world so long ago. </p>
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
                            $stmt->bindValue(':page_id', '19');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '19'";
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