<?php include_once '../account/dbseconnect.php'; ?>
<div class="title">
    <div class="icon-nav">
        <a href="../index.php"><img class="icon-logo" src="../mainimages/home.png"></a>
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
        <a href="../search/search.php">
            <div class="icon-logo"><img id="search" src="../mainimages/search.png"></div>
        </a>
        <ul class="settings">
            <li class="settings-item"><img class="settings-logo" src="../mainimages/settings.png"></li>
            <li class="settings-item"><img class="settings-logo" src="../mainimages/night.png" onclick="DayOrNight()"></li>
            <li class="settings-item">
                <a href="../account/account_overview.php"><?php 
                        // Retrouver info utilisateur
                        if(isset($_SESSION['user_id'])){
                            // Prepare our query to show the user their info
                            $query = "SELECT image  FROM users WHERE id = :user_id";
                            $user = $conn->prepare($query);
                            $user->bindValue(':user_id', $_SESSION['user_id']);
                            $user->execute();

                            // Store the result
                            $result = $user->fetch(PDO::FETCH_ASSOC);
                            if(!empty($result['image'])){
                                echo '<img class="account-img-setting" id="account-img-setting" src="data:image/png;base64,'. $result['image'].'"/>';
                            } else {
                                echo '<img class="settings-logo" src="../mainimages/account.png">';
                            }
                        } else {
                            echo '<img class="settings-logo" src="../mainimages/account.png">';
                        }
                        ?>
                </a>
            </li>
        </ul>
    </div>
</div>