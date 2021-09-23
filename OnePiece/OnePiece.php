<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>One Piece :)</title>
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
                $name = 'OnePiece';
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
                    echo "<script type='text/javascript'> document.location = 'OnePiece.php'; </script>";
                }
            } else {
                echo '<style type="text/css">
                    .favorites-icon{
                        display: none;
                    }
                    </style>';
            }
        ?>
        <h1 class="oneline">One Piece</h1>
        <img class="baniere" src="images/baniere.png">
    </div>

    <div class="bio">
        <div class="leftSide">
            <br>
            <h1>One Piece</h1>

            <p>Genre : - Adventure</p>
            <div class="sousgenre">- Fantasy</div>

            <br>
            <h1>Manga</h1>
            <p>Written by : Eiichiro Oda</p>
            <p>Published by : Shueisha</p>
            <p>Volumes : 98</p>

            <br>
            <h1>Anime</h1>
            <p>Directed by : - Kōnosuke Uda</p>
            <div class="sousgenre2">- Junji Shimizu </div>
            <div class="sousgenre2">- Munehisa Sakai </div>
            <div class="sousgenre2">- Hiroaki Miyamoto </div>
            <div class="sousgenre2">- Toshinori Fukazawa </div>
            <div class="sousgenre2">- Tatsuya Nagamine </div>
            <div class="sousgenre2">- Kōhei Kureta</div>
            <div class="sousgenre2">- Aya Komaki </div>
            <div class="sousgenre2">- Satoshi Itō </div>
            <p>Studio : Toei Animation</p>
            <p>Streaming Website : ADN</p>
            <p>Episodes : 983</p>
            <br>
        </div>
        <div class="separator"></div>
        <div class="rightSide">
            <br>
            <h1>Synopsis</h1>
            <br>
            <p>One Piece is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in
                Shueisha's Weekly Shōnen Jump magazine since July 1997, with its individual chapters compiled
                into 98 tankōbon volumes as of February 2021. The story follows the adventures of Monkey D. Luffy, a boy
                whose body gained the properties of rubber after unintentionally eating a Devil Fruit. With
                his crew of pirates, named the Straw Hat Pirates, Luffy explores the Grand Line in search of the world's
                ultimate treasure known as "One Piece" in order to become the next King of the Pirates.</p>
            <br>
            <p>Premiering in July 1997, One Piece has currently published over 1000 chapters (collected into nearly 100
                tankōbon volumes) and generated a massive franchise, including an anime adaptation from Toei
                Animation, many feature films, and countless other pieces of merchandise. Since the late 2000s it has
                been recognized as Japan's most popular manga, even being commemorated by the Guinness World
                Records as the world's best-selling single-author comic book.</p>
            <br>
            <p>The series focuses on Monkey D. Luffy, a young man who, inspired by his childhood idol and powerful
                pirate "Red Haired" Shanks, sets off on a journey from the East Blue Sea to find the titular
                treasure and proclaim himself the King of the Pirates. In an effort to organize his own crew, the Straw
                Hat Pirates, Luffy rescues and befriends a swordsman named Roronoa Zoro, and they head off
                in search of the One Piece. They are joined in their journey by Nami, a navigator and thief; Usopp, a
                sniper and a pathological liar; and Vinsmoke Sanji, a perverted chef. They acquire a ship named
                the Going Merry and engage in confrontations with notorious pirates of the East Blue. As Luffy and his
                crew set out on their adventures, others join the crew later in the series, including Tony Tony
                Chopper, a doctor and anthropomorphized reindeer; Nico Robin, an archaeologist and former assassin;
                Franky, a cyborg shipwright; Brook, a skeletal musician and swordsman; and Jimbei, a fish-man
                helmsman and former member of the Seven Warlords of the Sea. Once the Going Merry becomes damaged beyond
                repair, the Straw Hat Pirates acquire a new ship named the Thousand Sunny. Together, they
                encounter other pirates, bounty hunters, criminal organizations, revolutionaries, secret agents and
                soldiers of the corrupt World Government, and various other friends and foes, as they sail the
                seas in pursuit of their dreams.</p>
            <br>
            <h1>Setting</h1>
            <br>
            <h2>Geography</h2>
            <br>
            <p>The world of One Piece is populated by humans and many other races, such as fish-men and merfolk (two
                races of fish/human hybrids), dwarves, minks (a race of humanoids with animal features),
                and giants. It is covered by two vast oceans, which are divided by a massive mountain range called the
                Red Line, which is also the only continent in the world. The Grand Line, a sea that runs
                perpendicular to the Red Line, further divides them into four seas: North Blue, East Blue, West Blue,
                and South Blue. Surrounding the Grand Line are two regions called
                Calm Belts, similar to horse latitudes, which experience almost no wind or ocean currents and are the
                breeding ground for huge sea creatures called sea kings. Because of this, the
                calm belts are very effective barriers for those trying to enter the Grand Line. However, navy ships,
                members of an intergovernmental organization known as the World Government, are able to
                use a sea-prism stone to mask their presence from the sea kings and can simply pass through the calm
                belts. All other ships are forced to take a more dangerous route, going through a mountain
                at the first intersection of the Grand Line and the Red Line, a canal system known as Reverse Mountain.
                Sea water from each of the four seas runs up that mountain and merges at the top to
                flow down a fifth canal and into the first half of the Grand Line, called Paradise because how it
                compared to the second half. The second half of the Grand Line, beyond the second intersection with
                the Red Line, is known as the New World.</p>
            <br>
            <h2>Devil Fruits</h2>
            <br>
            <p>A Devil Fruit is a type of fruit that, when eaten, grants a power to the eater. A person may only eat one
                Devil Fruit during their lifetime, as eating a second Devil Fruit will swiftly end their
                life.</p>
            <br>
            <p>There are three categories of Devil Fruits.</p>
            <br>
            <p>Paramecia is a category of fruits that gives the user superhuman abilities, such as Luffy's rubber powers
            </p>
            <br>
            <p>Zoan fruits allow the user to fully or partially transform into a specific animal like the Human-Human
                Fruit enabling the reindeer Tony Tony Chopper to have his anthropomorphic appearance.
                Certain Zoan fruits allow the user to transform into mythical creatures. There are even Ancient Devil
                Fruits that enable a user to turn into a prehistoric animal like X Drake's fruit enabling him to
                transform into an Allosaurus. Through an unknown technique developed by scientist Dr. Vegapunk,
                inanimate objects can also "eat" a Devil Fruit such as Spandam's sword Funkfreed which can transform
                into
                an elephant.</p>
            <br>
            <p>Logia fruits give control over and allow the user "to change their living body structure into the powers
                of nature", like Smoker's control over smoke, Ace's control over fire, and Sir Crocodile's control over
                sand.</p>
            <br>
            <h2>Haki</h2>
            <br>
            <p>Haki (覇気, lit. "Ambition") is a latent ability that every living being in the world of One Piece
                possesses; very few manage to awaken it, and even fewer master it. There are three varieties of Haki:
                Color of Observation (見聞色の覇気, Kenbunshoku no Haki) allows one to sense the presence of other beings and
                to have a form of limited precognition. Color of Arms (武装色の覇気, Busōshoku no Haki) allows one to envelop
                body parts and even inanimate forms with a force akin to an invisible armor that possesses defensive and
                offensive properties. It also allows one to inflict harm upon Devil Fruit users. The rare Color of the
                Supreme King (覇王色の覇気, Haōshoku no Haki) is an ability that, unlike the other two Haki, only a few gifted
                people have. The Color of the Supreme King enables one to overpower the will of the weak-willed. It can
                be used to force others into submission or even render victims unconscious. Strong-willed people can
                withstand, or even completely ignore, the effects of this Haki, even if they do not possess the ability
                themselves. This Haki can also have physical impacts, such as causing shock waves and destruction to the
                user's surroundings</p>
        </div>

        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
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
                            $stmt->bindValue(':page_id', '46');
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
                $sql = "SELECT user_comment_id, comment_id, page_id, username, user_pp, content, date_time  FROM comment WHERE page_id = '46'";
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