<?php include_once 'includes/header.php'; ?>

<?php 
// Check if user already logged in
if(isset($_SESSION['user_id'])){
    // User already logged in, send them to the home page
    echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
}

if(!empty($_COOKIE["email-cookie"]) && !empty($_COOKIE["password-cookie"])){
    // Prepare our query
    $cookie_email = $_COOKIE["email-cookie"];
    $cookie_password = $_COOKIE["password-cookie"];
    $query = "SELECT * FROM users WHERE email = :email ";
    $account = $conn->prepare($query);
    $account->bindValue(":email",$cookie_email);
    $account->execute();

    // Store results
    $result = $account->fetch(PDO::FETCH_ASSOC);
    // var_dump($results);

    // If there is a result and the pass match, store a session
    if(count($result) > 0 && password_verify($cookie_password, $result['password'])){
        $_SESSION['user_id'] = $result['id'];

        echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
    } else {
        // Failed to validate user, return error message
        echo "Failed to login";
    }
}

// Check if email & password has been submit
if(!empty($_POST['email']) && !empty($_POST['password'])){
    // Prepare our query
    $query = "SELECT * FROM users WHERE email = :email";
    $account = $conn->prepare($query);
    $account->bindValue(':email',$_POST['email']);
    $account->execute();

    // Store results
    $result = $account->fetch(PDO::FETCH_ASSOC);
    //var_dump($result);

    // If there is a result and the pass match, store a session
    if($result != false && password_verify($_POST['password'], $result['password'])){
        $username = $_POST["email"];
        $password = $_POST["password"];

        $_SESSION['user_id'] = $result['id'];
        
        // Set Auth Cookies if 'Remember Me' checked
        if (!empty($_POST["remember"])) {
            setcookie("email-cookie", $username, time() + (86400 * 30));
            setcookie("password-cookie", $password, time() + (86400 * 30));
        } 
        echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
    }
}

?>
    <div class="container" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%)">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
                <p>Please fill this connect to your account</p>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                        <label for="remember-me">Remember me</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>No have an account yet? <a href="register.php">Register Here</a></p>
                </form>
                <?php  
                // Check if email & password has been submit
                if(!empty($_POST['email']) && !empty($_POST['password'])){
                    // Prepare our query
                    $query = "SELECT * FROM users WHERE email = :email";
                    $account = $conn->prepare($query);
                    $account->bindValue(':email',$_POST['email']);
                    $account->execute();

                    // Store results
                    $result = $account->fetch(PDO::FETCH_ASSOC);
                    //var_dump($result);

                    if($result == false){
                        echo "<br><br><p style='text-align: center'>Failed to login. Please try again and verify your email and your password.</p><p style='text-align: center'>If you're new, <a href='register.php'>Register Here</a></p>";
                    } 
                }
                ?>
            </div>
        </div>
    </div>

<?php include_once 'includes/footer.php'; ?>