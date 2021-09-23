<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Assassination Classroom :)</title>
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
                $name = 'AssassinationClassroom';
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
                    echo "<script type='text/javascript'> document.location = 'AssassinationClassroom.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">Assassination Classroom</h1>
        <img class="baniere" src="images/baniere.jpg">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>Assassination Classroom</h1>
            <p>Genre : - Action</p>
            <div class="sousgenre">- Science Fiction Comedy</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Yūsei Matsui</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 21 </p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Seiji Kishi</p>
            <p>Written by : - Makoto Uezu</p>
            <p>Studio : Lerche</p>
            <p>Streaming Website : Netflix/ADN</p>
            <p>Episodes :47 + 1 OVA </p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Presentation</h1>
            <br>
            <p>Assassination Classroom (Japanese: 暗殺教室, Hepburn: Ansatsu Kyōshitsu, stylized as ASSASSINATION CLASSROOM)
                is a Japanese science fiction comedy manga series written and illustrated by Yūsei Matsui. The series
                follows the daily life of an extremely powerful octopus-like being working as a junior high homeroom
                teacher, and his students dedicated to the task of assassinating him to prevent Earth from being
                destroyed. The students are considered “misfits” in their school and are taught in a separate building;
                the class he teaches is called 3-E. It was serialized in Shueisha's Weekly Shōnen Jump magazine from
                July 2012 to March 2016, with its chapters collected in twenty-one tankōbon volumes. </p>
            <br>
            <p>An original video animation (OVA) adaptation by Brain's Base was screened at the Jump Super Anime Tour
                from October to November 2013. This was followed by an anime television adaptation by Lerche, which
                aired on Fuji TV from January 2015 to June 2016. A live action film adaptation was released in March
                2015, and a sequel, titled Assassination Classroom: Graduation, was released in March 2016. </p>
            <br>
            <p>In North America, the manga has been licensed for English language release by Viz Media. The anime series
                has been licensed by Funimation. The series was obtained by Madman Entertainment for digital
                distribution in Australia and New Zealand. </p>
            <br>
            <p>As of September 2016, the Assassination Classroom manga had over 25 million copies in circulation. </p>
            <br>
            <h1>Plot</h1>
            <br>
            <p>Earth is left in jeopardy after an immensely powerful tentacled creature suddenly appears and destroys
                75% of the moon, leaving it permanently in the shape of a crescent. The organism claims that within a
                year he will destroy the planet next, but offers mankind a chance to avert this fate. In class 3-E, the
                End Class of Kunugigaoka Junior High School, he starts working as a homeroom teacher where he teaches
                his students regular subjects, as well as the ways of assassination. The Japanese government promises a
                reward of ¥10 billion (i.e. US$100 million) to whoever among the students succeeds in killing the
                organism, whom they have named "Koro-sensei" (殺せんせー, Korosensē, a pun on korosenai (殺せない, unkillable)
                and sensei (先生, teacher)). However, this proves to be a highly unachievable task, as not only does he
                have several superpowers at his disposal, including accelerated regeneration, visual cloning, an
                invincible form, and the ability to move and fly at Mach 20, but he is also the best teacher they could
                ask for, helping them to improve their grades, individual skills, and prospects for the future. </p>
            <br>
            <p>As the series goes on, the situation gets even more complicated as other assassins come after
                Koro-sensei's life, some coveting the reward, others for personal reasons. The students eventually learn
                the secrets involving him, the Moon's destruction, and his ties with their previous homeroom teacher
                including the true reason why he must be killed before the end of the school year. The series is
                narrated by Nagisa Shiota, one of the students in the class whose main strategy in killing Koro-sensei
                is making a list of all his weaknesses over time. At first, Nagisa appears to be one of the weaker
                members of Class 3-E, but he later emerges as one of the most skillful assassins in the class. </p>
                <br>
            <ul class="character-list">
            <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/nagisa.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Nagisa Shiota</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Nagisa Shiota (潮田 渚, Shiota Nagisa) is a student in Korosensei's Class 3-E of Kunugigaoka Junior High School and the main protagonist and narrator of Assassination Classroom. Despite his overall passive nature, Nagisa has a natural talent for assassination.</p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/korosensei.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Korosensei</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Korosensei (殺せんせー) was the homeroom teacher of Class 3-E of Kunugigaoka Junior High School, and the secondary protagonist and antihero of Assassination Classroom. He claimed to be responsible for creating the permanent crescent moon, and added that he planned to destroy the earth after teaching Class 3-E for a year. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/karma.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Karma Akabane</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Karma Akabane (赤羽 業 Akabane Karuma) is a student in Korosensei's Class 3-E of Kunugigaoka Junior High School who had been suspended from school due to his violent behavior and one of Nagisa's closest friends. </p>
                    </div>
                </li>
                <li class="character">
                    <div class="presentation">
                        <div class="character-img">
                            <div class="img-container"><img class="img-character" src="character/karasuma.jpg"></div>
                        </div>
                        <div class="character-name">
                            <p>Tadaomi Karasuma</p>
                        </div>
                    </div>
                    <div class="character-bio">
                        <p>Tadaomi Karasuma (烏間 惟臣 Karasuma Tadaomi) is an agent sent from Japan's Ministry of Defense to supervise Korosensei. In Kunugigaoka Junior High School, he was admitted as an assistant teacher and as the physical education teacher in Class 3-E. </p>
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
                            $stmt->bindValue(':page_id', '6');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '6'";
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