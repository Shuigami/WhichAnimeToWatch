<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Your Anime :)</title>
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="../home/css/style.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="../home/css/iconStyles.css">
    <link rel="stylesheet" href="../home/css/title.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
</head>

<body onload="shuffle();">
    <?php include_once '../home/includes/title.php'; ?>
    
    <div class="search-bar">
        <div class="background-img"><img src="images/landscape.jpg"></div>
        <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search Your Anime !">
    </div>
    <div class="search-result">
        <ul id="list">
            <li class="result" id="myResult">
                <a href="../JujutsuKaisen/JujutsuKaisen.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../JujutsuKaisen/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Jujutsu Kaisen</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../OnePiece/OnePiece.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../OnePiece/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">One Piece</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../HxH/HxH.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../HxH/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Hunter X Hunter</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../SNK/SNK.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../SNK/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Attack on Titans</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../TokyoRevengers/TokyoRevengers.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../TokyoRevengers/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Tokyo Revengers</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../DemonSlayer/DemonSlayer.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../DemonSlayer/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Demon Slayer</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../FireForce/FireForce.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../FireForce/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Fire Force</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../DrStone/DrStone.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../DrStone/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Dr Stone</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../VinlandSaga/VinlandSaga.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../VinlandSaga/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Vinland Saga</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../FoodWars/FoodWars.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../FoodWars/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Food Wars</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../AssassinationClassroom/AssassinationClassroom.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../AssassinationClassroom/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Assassination Classroom</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../ThePromisedNeverland/ThePromisedNeverland.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../ThePromisedNeverland/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">The Promised Neverland</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../YourName/YourName.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../YourName/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Your Name</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../Haikyu/Haikyu.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../Haikyu/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Haikyū!!</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../YourLieInApril/YourLieInApril.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../YourLieInApril/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Your Lie In April</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../IWantToEatYourPancreas/IWantToEatYourPancreas.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../IWantToEatYourPancreas/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">I want to eat your pancreas</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../7seeds/7seeds.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../7seeds/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">7 seeds</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../BtheBeginning/BtheBeginning.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../BtheBeginning/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">B the Beginning</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../CaroleAndTuesday/CaroleAndTuesday.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../CaroleAndTuesday/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Carole & Tuesday</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../CautiousHero/CautiousHero.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../CautiousHero/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Cautious Hero</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../Nagatoro/Nagatoro.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../Nagatoro/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Don't Toy with Me, Miss Nagatoro</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../Erased/Erased.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../Erased/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Erased</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../FairyTail/FairyTail.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../FairyTail/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Fairy Tail</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../GoblinSlayer/GoblinSlayer.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../GoblinSlayer/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Goblin Slayer</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../KurokoBasket/KurokoBasket.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../KurokoBasket/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Kuroko no Basket</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../MHA/MHA.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../MHA/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">My Hero Academia</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../ShieldHero/ShieldHero.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../ShieldHero/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">The Rising Of Shield Hero</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../SAO/SAO.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../SAO/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Sword Art Online</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../Parasyte/Parasyte.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../Parasyte/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Parasyte</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../NoGameNoLife/NoGameNoLife.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../NoGameNoLife/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">No Game No Life</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../DeathNote/DeathNote.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../DeathNote/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Death Note</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../SamuraiChamploo/SamuraiChamploo.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../SamuraiChamploo/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Samurai Champloo</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../Steins;Gate/Steins;Gate.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../Steins;Gate/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Steins;Gate</p>
                </a>
            </li>
            <li class="result" id="myResult">
                <a href="../VioletEvergarden/VioletEvergarden.php">
                    <div class="icon-container">
                        <div class="icon1">
                            <img class="navbar-img" src="../VioletEvergarden/images/icon.jpg">
                        </div>
                    </div>
                    <p id="name">Violet Evergarden</p>
                </a>
            </li>
        </ul>
    </div>
</body>
<script src="search.js"></script>
<script src="../home/js/black-theme.js"></script>

</html>