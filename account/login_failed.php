<?php include_once 'includes/header.php'; ?>

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
            </div>
        </div>
    </div>

<?php include_once 'includes/footer.php'; ?>