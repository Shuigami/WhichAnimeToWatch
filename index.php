<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php include_once 'account/dbseconnect.php'; ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Come watch some anime :)</title>
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="home/css/style.css">
    <link rel="stylesheet" href="home/css/chat.css">
    <link rel="stylesheet" href="home/css/title.css">
    <link rel="stylesheet" href="home/css/iconStyles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<?php 
    // Retrouver info utilisateur
    if(isset($_SESSION['user_id'])){
        // Prepare our query to show the user their info
        $query = "SELECT name, country, email, password, phone, id, language, image  FROM users WHERE id = :user_id";
        $user = $conn->prepare($query);
        $user->bindValue(':user_id', $_SESSION['user_id']);
        $user->execute();

        // Store the result
        $result = $user->fetch(PDO::FETCH_ASSOC);
    }
?>
<script src="home/js/chat.js"></script>
<body onload="pickRandom();">
    <nav class="navbar">
        <ul class="navbar-nav" id="ul">
            <li class="logo">
                <a class="nav-link">
                    <span class="link-text-logo">WATW</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                        class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z">
                        </path>
                    </svg>
                </a>
            </li>
            <div class="spacer"></div>
            <ul id="bonne-ul">
                <li class="nav-item" id="nav-item-id">
                    <a href="JujutsuKaisen/JujutsuKaisen.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="JujutsuKaisen/images/icon.jpg">
                        </div>
                        <span class="link-text">Jujutsu Kaisen</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="OnePiece/OnePiece.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="OnePiece/images/icon.jpg">
                        </div>
                        <span class="link-text">One Piece</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="HxH/HxH.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="HxH/images/icon.jpg">
                        </div>
                        <span class="link-text">Hunter X Hunter</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="SNK/SNK.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="SNK/images/icon.jpg">
                        </div>
                        <span class="link-text">Attack On Titans</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="TokyoRevengers/TokyoRevengers.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="TokyoRevengers/images/icon.jpg">
                        </div>
                        <span class="link-text">Tokyo Revengers</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="DemonSlayer/DemonSlayer.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="DemonSlayer/images/icon.jpg">
                        </div>
                        <span class="link-text">Demon Slayer</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="FireForce/FireForce.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="FireForce/images/icon.jpg">
                        </div>
                        <span class="link-text">Fire Force</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="DrStone/DrStone.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="DrStone/images/icon.jpg">
                        </div>
                        <span class="link-text">Dr Stone</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="VinlandSaga/VinlandSaga.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="VinlandSaga/images/icon.jpg">
                        </div>
                        <span class="link-text">Vinland Saga</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="FoodWars/FoodWars.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="FoodWars/images/icon.jpg">
                        </div>
                        <span class="link-text">Food Wars</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="AssassinationClassroom/AssassinationClassroom.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="AssassinationClassroom/images/icon.jpg">
                        </div>
                        <span class="link-text">Assassination Classroom</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="ThePromisedNeverland/ThePromisedNeverland.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="ThePromisedNeverland/images/icon.jpg">
                        </div>
                        <span class="link-text">The Promised Neverland</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="YourName/YourName.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="YourName/images/icon.jpg">
                        </div>
                        <span class="link-text">Your Name</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="Haikyu/Haikyu.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="Haikyu/images/icon.jpg">
                        </div>
                        <span class="link-text">Haikyū!!</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="YourLieInApril/YourLieInApril.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="YourLieInApril/images/icon.jpg">
                        </div>
                        <span class="link-text">Your Lie In April</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="IWantToEatYourPancreas/IWantToEatYourPancreas.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="IWantToEatYourPancreas/images/icon.jpg">
                        </div>
                        <span class="link-text">I want to eat your pancreas</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="7seeds/7seeds.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="7seeds/images/icon.jpg">
                        </div>
                        <span class="link-text">7 seeds</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="BtheBeginning/BtheBeginning.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="BtheBeginning/images/icon.jpg">
                        </div>
                        <span class="link-text">B the Beginning</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="CaroleAndTuesday/CaroleAndTuesday.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="CaroleAndTuesday/images/icon.jpg">
                        </div>
                        <span class="link-text">Carole & Tuesday</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="CautiousHero/CautiousHero.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="CautiousHero/images/icon.jpg">
                        </div>
                        <span class="link-text">Cautious Hero</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="Nagatoro/Nagatoro.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="Nagatoro/images/icon.jpg">
                        </div>
                        <span class="link-text">Don't Toy with Me, Miss Nagatoro</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="Erased/Erased.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="Erased/images/icon.jpg">
                        </div>
                        <span class="link-text">Erased</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="FairyTail/FairyTail.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="FairyTail/images/icon.jpg">
                        </div>
                        <span class="link-text">Fairy Tail</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="GoblinSlayer/GoblinSlayer.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="GoblinSlayer/images/icon.jpg">
                        </div>
                        <span class="link-text">Goblin Slayer</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="KurokoBasket/KurokoBasket.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="KurokoBasket/images/icon.jpg">
                        </div>
                        <span class="link-text">Kuroko no Basket</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="MHA/MHA.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="MHA/images/icon.jpg">
                        </div>
                        <span class="link-text">My Hero Academia</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="ShieldHero/ShieldHero.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="ShieldHero/images/icon.jpg">
                        </div>
                        <span class="link-text">The Rising Of Shield Hero</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="SAO/SAO.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="SAO/images/icon.jpg">
                        </div>
                        <span class="link-text">Sword Art Online</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="Parasyte/Parasyte.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="Parasyte/images/icon.jpg">
                        </div>
                        <span class="link-text">Parasyte</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="NoGameNoLife/NoGameNoLife.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="NoGameNoLife/images/icon.jpg">
                        </div>
                        <span class="link-text">No Game No Life</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="DeathNote/DeathNote.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="DeathNote/images/icon.jpg">
                        </div>
                        <span class="link-text">Death Note</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="SamuraiChamploo/SamuraiChamploo.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="SamuraiChamploo/images/icon.jpg">
                        </div>
                        <span class="link-text">Samurai Champloo</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="Steins;Gate/Steins;Gate.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="Steins;Gate/images/icon.jpg">
                        </div>
                        <span class="link-text">Steins;Gate</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-item-id">
                    <a href="VioletEvergarden/VioletEvergarden.php" class="nav-link">
                        <div class="icon">
                            <img class="navbar-img" src="VioletEvergarden/images/icon.jpg">
                        </div>
                        <span class="link-text">Violet Evergarden</span>
                    </a>
                </li>
            </ul>
        </ul>
    </nav>
    <main class="main">

    <div class="title">
        <div class="icon-nav">
            <a href="index.php"><img class="icon-logo" src="mainimages/home.png"></a>
        </div>
        <div class="Iam">

            <p>Which anime</p>
            <b>
                <div class="innerIam">
                    to watch<br />
                    to look<br />
                    to smile at<br />
                    to see<br />
                    to enjoy
                </div>
            </b>
        </div>
        <div class="smallTitle">
            <h1>WATW</h1>
        </div>
        <div class="icon-nav" id="left">
            <a href="search/search.php">
                <div class="icon-logo"><img id="search" src="mainimages/search.png"></div>
            </a>
            <ul class="settings">
                <li class="settings-item"><img class="settings-logo" src="mainimages/settings.png"></li>
                <li class="settings-item"><img class="settings-logo" src="mainimages/night.png" onclick="DayOrNight()"></li>
                <li class="settings-item">
                    <a href="account/account_overview.php">
                        <?php 
                        // Retrouver info utilisateur
                        if(isset($_SESSION['user_id'])){
                            // Prepare our query to show the user their info
                            $query = "SELECT name, country, email, password, phone, id, language, image  FROM users WHERE id = :user_id";
                            $user = $conn->prepare($query);
                            $user->bindValue(':user_id', $_SESSION['user_id']);
                            $user->execute();

                            // Store the result
                            $result = $user->fetch(PDO::FETCH_ASSOC);
                            if(!empty($result['image'])){
                                echo '<img class="account-img-setting" id="account-img-setting" src="data:image/png;base64,'. $result['image'].'"/>';
                            } else {
                                echo '<img class="settings-logo" src="mainimages/account.png">';
                            }
                        } else {
                            echo '<img class="settings-logo" src="mainimages/account.png">';
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>

        <div class="baniere">
            <div class="slideshow-container" id="slides">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="OnePiece\images\baniere.png" >
                    <div class="text">
                        <h1>One Piece</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="JujutsuKaisen\images\baniere.jpg" >
                    <div class="text">
                        <h1>Jujutsu Kaisen</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="HxH\images\baniere.jpg">
                    <div class="text">
                        <h1>Hunter X Hunter</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="SNK\images\baniere.jpg">
                    <div class="text">
                        <h1>Attack On Titans</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="TokyoRevengers\images\baniere.png">
                    <div class="text">
                        <h1>Tokyo Revengers</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="DemonSlayer\images\baniere.jpg">
                    <div class="text">
                        <h1>Demon Slayer</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="FireForce\images\baniere.jpg">
                    <div class="text">
                        <h1>Fire Force</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="DrStone\images\baniere.png">
                    <div class="text">
                        <h1>Dr Stone</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="VinlandSaga\images\baniere.png">
                    <div class="text">
                        <h1>Vinland Saga</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="FoodWars\images\baniere.png">
                    <div class="text">
                        <h1>Food Wars</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img class="imageRelou" src="AssassinationClassroom\images\baniere.jpg">
                    <div class="text">
                        <h1>Assassination Classroom</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="ThePromisedNeverland\images\baniere.jpg">
                    <div class="text">
                        <h1>The Promised Neverland</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="YourName\images\baniere.jpg">
                    <div class="text">
                        <h1>Your Name</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="Haikyu\images\baniere.jpg">
                    <div class="text">
                        <h1>Haikyū!!</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="YourLieInApril\images\baniere.jpg">
                    <div class="text">
                        <h1>Your Lie In April</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="IWantToEatYourPancreas\images\baniere.jpg">
                    <div class="text">
                        <h1>I want to eat your pancreas</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="7seeds\images\baniere.jpg">
                    <div class="text">
                        <h1>7 seeds</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="BtheBeginning\images\baniere.jpg">
                    <div class="text">
                        <h1>B the Beginning</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="CaroleAndTuesday\images\baniere.jpg">
                    <div class="text">
                        <h1>Carole & Tuesday</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="CautiousHero\images\baniere.jpg">
                    <div class="text">
                        <h1>Cautious Hero</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="Nagatoro\images\baniere.jpg">
                    <div class="text">
                        <h1>Don't Toy with Me, Miss Nagatoro</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="Erased\images\baniere.jpg">
                    <div class="text">
                        <h1>Erased</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="FairyTail\images\baniere.jpg">
                    <div class="text">
                        <h1>Fairy Tail</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="GoblinSlayer\images\baniere.jpg">
                    <div class="text">
                        <h1>Goblin Slayer</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="KurokoBasket\images\baniere.jpg">
                    <div class="text">
                        <h1>Kuroko no Basket</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="MHA\images\baniere.jpg">
                    <div class="text">
                        <h1>My Hero Academia</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="SAO\images\baniere.jpg">
                    <div class="text">
                        <h1>Sword Art Online</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="Parasyte\images\baniere.jpg">
                    <div class="text">
                        <h1>Parasyte</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="NoGameNoLife\images\baniere.jpg">
                    <div class="text">
                        <h1>No Game No Life</h1>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img src="DeathNote\images\baniere.jpg">
                    <div class="text">
                        <h1>Death Note</h1>
                    </div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
        </div>
        <div class="container-container" id="container-container">
            <div class="container 1">
                <div class="container-title">
                    <h1>Action</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 1" onclick="categoriePlus(-1, 1)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 1" onclick="categoriePlus(1 , 1)">&#10094;</a>
                    <ul class="categories" id="categories 1"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 2">
                <div class="container-title">
                    <h1>Romance</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 2" onclick="categoriePlus(-1, 2)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 2" onclick="categoriePlus(1, 2)">&#10094;</a>
                    <ul class="categories" id="categories 2"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 3">
                <div class="container-title">
                    <h1>Not well known</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 3" onclick="categoriePlus(-1, 3)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 3" onclick="categoriePlus(1, 3)">&#10094;</a>
                    <ul class="categories" id="categories 3"> </ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 4">
                <div class="container-title">
                    <h1>New release</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 4" onclick="categoriePlus(-1, 4)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 4" onclick="categoriePlus(1, 4)">&#10094;</a>
                    <ul class="categories" id="categories 4"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 5">
                <div class="container-title">
                    <h1>Sad</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 5" onclick="categoriePlus(-1, 5)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 5" onclick="categoriePlus(1, 5)">&#10094;</a>
                    <ul class="categories" id="categories 5"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 6">
                <div class="container-title">
                    <h1>Classical</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 6" onclick="categoriePlus(-1, 6)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 6" onclick="categoriePlus(1, 6)">&#10094;</a>
                    <ul class="categories" id="categories 6"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 7">
                <div class="container-title">
                    <h1>Hobbies</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 7" onclick="categoriePlus(-1, 7)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 7" onclick="categoriePlus(1, 7)">&#10094;</a>
                    <ul class="categories" id="categories 7"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 8">
                <div class="container-title">
                    <h1>Isekai</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 8" onclick="categoriePlus(-1, 8)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 8" onclick="categoriePlus(1, 8)">&#10094;</a>
                    <ul class="categories" id="categories 8"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
            <div class="container 9">
                <div class="container-title">
                    <h1>Psychological</h1>
                    <hr>
                </div>
                <div class="container-categories">
                    <a class="categories-arrow prev-cat" id="prev-cat 9" onclick="categoriePlus(-1, 8)">&#10094;</a>
                    <a class="categories-arrow next-cat" id="next-cat 9" onclick="categoriePlus(1, 8)">&#10094;</a>
                    <ul class="categories" id="categories 9"></ul>
                </div>
                <!-- Next and previous buttons -->
                <hr class="categories-separator">
            </div>
        </div>
        <div class="bio">
            <br>
            <h1>Which Anime To Watch?</h1>
            <p>If you are wonderingWhich anime i'd like to watch ?", this website is for you !</p>
            <p>Indeed, this website can tell you which anime you are correponding with, and he is update every day !</p>
            <br>
            <p>Proident eiusmod pariatur adipisicing dolor. Ex sit non qui reprehenderit cupidatat. Ea veniam cupidatat
                exercitation exercitation. Est dolor est est esse Lorem qui irure laborum dolore tempor. Incididunt
                minim cupidatat est Lorem. Culpa esse esse esse pariatur ipsum consectetur excepteur nisi dolor. Velit
                aute non proident ea eiusmod incididunt deserunt excepteur in cillum.

                Exercitation occaecat sunt cupidatat cupidatat deserunt. Nisi elit elit quis veniam ut commodo. Labore
                labore duis in est ut nulla ad ea esse id quis magna. Ut duis in quis proident nostrud ex eiusmod
                excepteur sit veniam nisi duis labore. Est aliqua nisi sit quis elit do. Fugiat laborum adipisicing ex
                irure deserunt adipisicing veniam culpa.</p>
            <br>
            <p>Consectetur laboris esse irure irure nulla velit ad Lorem in amet labore id adipisicing. Incididunt sit
                ullamco dolore est nulla non amet duis magna adipisicing magna nostrud mollit eu. Enim officia ut nisi
                cillum. Proident pariatur esse est culpa eiusmod esse elit in ipsum. Magna cupidatat reprehenderit
                nostrud consequat id aute voluptate ut. Cupidatat commodo ut elit exercitation irure magna culpa
                incididunt ad occaecat esse culpa fugiat.

                Dolore sunt incididunt occaecat magna id. Cillum aute in ullamco fugiat tempor cupidatat qui irure
                voluptate. Magna nisi sit reprehenderit duis nostrud quis ex non Lorem exercitation nulla eiusmod cillum
                id. Ut ad eiusmod velit mollit nostrud excepteur laboris incididunt ut pariatur voluptate tempor. Esse
                do tempor Lorem amet consectetur.

                Enim fugiat irure ea minim reprehenderit quis sunt. Consequat dolor eu voluptate duis voluptate duis non
                minim incididunt irure id aute aliquip. Incididunt minim qui eiusmod reprehenderit proident ad. Commodo
                nostrud deserunt sit mollit elit do ea occaecat nostrud nisi. Non dolor minim Lorem tempor deserunt esse
                pariatur minim sunt veniam exercitation est.</p>
            <br>
            <p>Aliqua officia dolore qui et veniam sit ad exercitation ut anim reprehenderit duis dolore occaecat.
                Nostrud quis ea ea magna id. Cillum mollit dolor et qui laboris nostrud deserunt dolore.

                Elit esse velit irure exercitation elit aute est incididunt culpa elit. Labore eiusmod consectetur
                pariatur ad. Sunt dolor nulla anim sint qui.

                Amet veniam aliqua commodo excepteur culpa id magna. Et aliquip id incididunt ea in reprehenderit non in
                cupidatat. Velit anim consectetur tempor voluptate consequat non non laboris incididunt qui. Commodo
                dolore tempor officia laboris qui nulla.</p>
            <br>
            <br>
        </div>
        <div class="social">
            <ul class="social-global">
                <li class="social-link 1" id="instagram">
                    <a href="#">
                        <div class="img-container">
                            <img src="mainimages/instagram.png">
                        </div>Instagram
                    </a>
                </li>
                <li class="social-link 2" id="youtube">
                    <a href="#">
                        <div class="img-container">
                            <img src="mainimages/youtube.png">
                        </div>Youtube
                    </a>
                </li>
                <li class="social-link 3" id="discord">
                    <a href="IWantToEatYourPancreas/IWantToEatYourPancreas.php">
                        <div class="img-container">
                            <img src="mainimages/discord.png">
                        </div>Discord
                    </a>
                </li>
                <li class="social-link 4" id="twitter">
                    <a href="#">
                        <div class="img-container">
                            <img src="mainimages/twitter.png">
                        </div>Twitter
                    </a>
                </li>
            </ul>
        </div>
    </main>
    <?php include_once 'home/includes/chat.php'; ?>
</body>
<script src="home/js/slider.js"></script>
<script src="home/js/navbar.js"></script>
<script src="home/js/categorie.js"></script>
<script src="home/js/black-theme.js"></script>

</html>