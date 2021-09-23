<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Food Wars :)</title>
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
                $name = 'FoodWars';
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
                    echo "<script type='text/javascript'> document.location = 'FoodWars.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Food Wars</h1>
        <img class="baniere" src="images/baniere.png">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Food Wars</h1>
            <p>Genre : - Comedy</p>
            <div class="sousgenre">- Cooking</div>
            <div class="sousgenre">- Slice Of life</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Yūto Tsukuda</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 36</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Yoshitomo Yonetani</p>
            <p>Written by : - Shogo Yasukawa</p>
            <p>Studio : J.C.Staff</p>
            <p>Streaming Website : Netflix/Crunchyuroll</p>
            <p>Episodes : 86 + 5 OVAs</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Food Wars!: Shokugeki no Soma (Japanese: 食戟のソーマ, Hepburn: Shokugeki no Sōma, lit. "Sōma of the
                Shokugeki") is a Japanese manga series written by Yūto Tsukuda and illustrated by Shun Saeki. Yuki
                Morisaki also works as a Contributor, providing the recipes for the series. It was serialized in
                Shueisha's Weekly Shōnen Jump from November 2012 to June 2019. Its chapters were compiled in 36 tankōbon
                volumes published by Shueisha. The manga is licensed by Viz Media in North America, who has been
                releasing the volumes digitally since March 2014, and released the first volume in print in August 2014.
            </p>
            <br>
            <p>An anime adaptation by J.C.Staff aired between April and September 2015. A second season, titled Food
                Wars! The Second Plate aired between July and September 2016. The first cour of the third season, titled
                Food Wars! The Third Plate, aired between October and December 2017. The second half aired between April
                and June 2018. A fourth season, titled Food Wars! The Fourth Plate, aired between October and December
                2019. The fifth and final season, titled Food Wars! The Fifth Plate, aired between April and September
                2020. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <h2>Setting</h2>
            <br>
            <p>The series is set mainly at Totsuki Saryo Culinary Institute, an elite culinary school located in Tokyo,
                Japan, which only a handful of students graduate from each year.[a] Its students mostly come from
                Totsuki's junior high school, but transfers are taken provided they pass the entrance exam. The campus
                is a wide-ranging resort with many research societies (clubs), cooking classrooms, and large arenas used
                for competitions. Housing varies, but the most affordable is the Polaris Dormitory, where characters
                have to impress the dorm matron with a dish in order to secure residence. Totsuki also runs a chain of
                resort hotels, with the biggest being the Totsuki resort run by Gin Dojima, which is visited during
                Soma's first year at Totsuki. </p>
            <br>
            <p>The top student chefs occupy seats on the Council of Ten Masters, the highest governing body in the
                school aside from the school director. Students can initiate a shokugeki (anime: food war), a cooking
                fight with stipulations on the line, with any other student or alumnus. Battles fought in this way could
                be for cooking utensils, research society facilities, council membership, or even expulsion from the
                school. </p>
            <br>
            <h2>Plot</h2>
            <br>
            <p>Teenager Soma Yukihira aspires to become a full-time chef in his father, Joichiro's family restaurant
                "Restaurant Yukihira" and surpass his father's culinary skills, but Joichiro gets a new job that
                requires him to travel around the world and close his shop. Joichiro has to enroll Soma in Totsuki Saryo
                Culinary Institute, an elite culinary school where students engage in food competitions called
                shokugeki. He secures himself a spot at the school, despite the objections of Erina Nakiri, the talented
                granddaughter of the school's dean. Soma is assigned to Polaris Dormitory where he meets other aspiring
                chefs, including Megumi Tadokoro. The story follows his adventures as he interacts with his peers and
                challenges Totsuki's students as well as others in shokugeki competitions. Learning that his father was
                not only a student of Totsuki, but also the second seat in the Council of Ten, Soma plans on becoming
                the best at the academy. </p>
            <br>
            <p>Soma and the other first-year students participate in a cooking camp judged by the school's alumni that
                expels about a third of the entering class. He enters the Fall Classic, a competition that takes the top
                60 first-year students and pares them down to eight students who then compete in a single elimination
                tournament, The Autumn Elections. The first-years then participate in week-long stagiaire internships at
                local restaurants, as well as a large-scale school-wide Moon Festival. During the Moon Festival, Erina's
                father Azami takes over the school, and Soma and Erina form a rebel faction to challenge the
                establishment. The disgruntled members of the Council join the Rebel Faction and with support from
                Joichiro and Gin, the Rebels confront Azami's organization "Central" in a Regiment De Cuisine (Team
                Shokugeki). Eventually the Rebels emerge victorious and oust Azami with Erina as the new Headmaster.
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
                            $stmt->bindValue(':page_id', '24');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '24'";
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