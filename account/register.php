<?php include_once 'includes/header.php'; ?>

<?php 
// Check if user already logged in
if(isset($_SESSION['user_id'])){
    // User already logged in, send them to the home page
    echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
}
// Check if email & password has been submit
if(!empty($_POST['email']) && !empty($_POST['password'])){
    // Prepare query string
    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($query);

    // Tell our query string where to find the vales
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

    if( $stmt->execute() ){
        // Prepare our query
        $query = "SELECT * FROM users WHERE email = :email";
        $account = $conn->prepare($query);
        $account->bindValue(':email',$_POST['email']);
        $account->execute();

        // Store results
        $result = $account->fetch(PDO::FETCH_ASSOC);
        // var_dump($results);

        // If there is a result and the pass match, store a session
        if(count($result) > 0 && password_verify($_POST['password'], $result['password'])){
            $_SESSION['user_id'] = $result['id'];
            echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
        } else {
            // Failed to validate user, return error message
            echo "Failed to login";
        }
    } else {
        print $stmt->errorCode();
    }
}

?>

    <div class="container" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%)">
        <div class="row">
            <div class="col-md-12">
                <h2>Register</h2>
                <p>Please fill this form to create an account</p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>Already have an account? <a href="login.php">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'includes/footer.php'; ?>