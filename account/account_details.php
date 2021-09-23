<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php include_once 'dbseconnect.php'; ?>
    <head>
        <title>My Account :)</title>
        <link rel="shortcut icon" href="#" />
        <link rel="stylesheet" href="css/sidebar.css">
        <link rel="stylesheet" href="../home/css/styles-anime-page.css">
        <link rel="stylesheet" href="../home/css/iconStyles.css">
        <link rel="stylesheet" href="../home/css/title.css">
        <link rel="stylesheet" href="css/account_details.css">
        <link rel="stylesheet" href="css/account_all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
    </head>

    <body>
        <?php include_once '../home/includes/title.php'; ?>
        <?php 
            // Retrouver info utilisateur
            if(isset($_SESSION['user_id'])){
                // Prepare our query to show the user their info
                $query = "SELECT name, country, email, password, phone, id, language, image, bio FROM users WHERE id = :user_id";
                $user = $conn->prepare($query);
                $user->bindValue(':user_id', $_SESSION['user_id']);
                $user->execute();

                // Store the result
                $result = $user->fetch(PDO::FETCH_ASSOC);
        ?>

        <?php 
            // Changer info utilisateur
            if(!empty($_POST['name'])){
                $a = $_POST['name'];
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET name ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
            if(isset($_FILES['image'])){
                $imageFile = $_FILES['image']['tmp_name'];
                if($imageFile != empty($_FILES['image'])){
                    $imageFileContents = file_get_contents($imageFile);
                    $withBase64 = base64_encode($imageFileContents);
                    $user_id = $result['id'];
                    // Changer info
                    $sql = "UPDATE users SET image ='$withBase64' WHERE id=$user_id";
                    // Prepare statement
                    $stmt = $conn->prepare($sql);
                    // execute the query
                    $stmt->execute();
                }
            }
            if(!empty($_POST['bio'])){
                $a = $_POST['bio'];
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET bio ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
            if(!empty($_POST['country'])){
                $a = $_POST['country'];
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET country ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
            if(!empty($_POST['email'])){
                $a = $_POST['email'];
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET email ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
            if(!empty($_POST['password'])){
                $a =  password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET password ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
            if(!empty($_POST['phone'])){
                $a = $_POST['phone'];
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET phone ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
            if(!empty($_POST['language'])){
                $a = $_POST['language'];
                $user_id = $result['id'];
                // Changer info
                $sql = "UPDATE users SET language ='$a' WHERE id=$user_id";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
            }
        ?>
        <div class="container-account">
            <?php include_once 'includes/sidebar.php'; ?>     
                <div class="else" id="else">
                <div class="title-account">
                    <h1>My Account</h1>
                    <p>Logout <a href="logout.php">here</a></p>
                </div>
                <ul class="account-settings">
                    <form name="form" action="account_details.php" method="post" enctype="multipart/form-data">
                        <li class="account-settings-item image">
                            <h2>Image</h2>
                            <?php if(!empty($result['image'])){
                                echo '<img id="account-img-setting" src="data:image/png;base64,'. $result['image'].'" />';
                            } else {
                                echo '<img class="settings-logo" src="../mainimages/account.png" style="filter:invert(100%);">';
                            }?>
                            <div class="account-pen-imageuh">  
                                <input type="file" name="image" id="file" class="inputfile" />
                                <label for="file">
                                    <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                    <p>Choose a file</p>
                                </label>
                            </div>
                        </li>
                        <li class="account-settings-item">
                            <h2>Name</h2>
                            <?php echo "<h1>" . $result['name'] . "</h1>"; ?>
                            <div class="account-pen">
                                <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                <input type="text" name="name" placeholder="New Name"/>
                            </div>
                        </li>
                        <li class="biography account-settings-item">
                            <h2>Biography</h2>
                            <div class="inputdivtext">
                                <textarea name="bio" placeholder="<?php echo $result['bio'] ?>" cols="60vw" rows="5"></textarea>
                            </div>
                            <div class="inputdiv">
                                <div class="inputdivbg">
                                    <div class="test">
                                        <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImageBio"/>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="account-settings-item">
                            <h2>Country</h2>
                            <?php echo "<h1>" . $result['country'] . "</h1>"; ?>
                            <div class="account-pen">
                                <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                <input type="text" name="country" placeholder="Select a new country"/>
                            </div>
                        </li>
                        <li class="account-settings-item">
                            <h2>Email</h2>
                            <?php echo "<h1>" . $result['email'] . "</h1>"; ?>
                            <div class="account-pen">
                                <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                <input type="text" name="email" placeholder="New Email"/>
                            </div>
                        </li>
                        <li class="account-settings-item">
                            <h2>Password</h2>
                            <?php echo "<h1> - * - * - * - * - * - * - * - * - </h1>"; ?>
                            <div class="account-pen">
                                <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                <input type="text" name="password" placeholder="New Password"/>
                            </div>
                        </li>
                        <li class="account-settings-item">
                            <h2>Phone Number</h2>
                            <?php echo "<h1>" . $result['phone'] . "</h1>"; ?>
                            <div class="account-pen">
                                <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                <input type="text" name="phone" placeholder="New Phone number"/>
                            </div>
                        </li>
                        <li class="account-settings-item">
                            <h2>User id</h2>
                            <?php echo "<h1>" . $result['id'] . "</h1>"; ?>
                            <p style="position: absolute; top: 50%; right: 0; margin-right: 5vw; transform: translateY(-50%);">Can't change user id</p>
                        </li>
                        <li class="account-settings-item">
                            <h2>Language</h2>
                            <?php echo "<h1>" . $result['language'] . "</h1>"; ?>
                            <div class="account-pen">
                                <input type="image" src="../mainimages/pen.png" border="0" alt="Submit" class="inputImage" />
                                <input type="text" name="language" placeholder="Select a new language"/>
                            </div>
                        </li>
                    </form>
                </ul>
                <div style="padding-bottom: 1vw; float: right; padding-right: 2vw; padding-bottom: 2vw; padding-top: 1vw">
                    <p>Delete Account <a style="color: var(--text-title);"href="delete.php">here</a></p>
                </div>
            </div>
        </div>
        <?php
            } else{
        ?>
            <h1> You're not logged in </h1>
            <p>Already have an account? <a href="login.php">Login Here</a></p>
        <?php
            }
        ?>
    </body>

    <script src="../home/js/black-theme.js"></script>
</html>