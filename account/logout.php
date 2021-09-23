<?php
// Start the session ready to destroy the details
session_start();

setcookie("email-cookie", "", time() - 3600);
setcookie("password-cookie", "", time() - 3600);


// Destroy all evidence
session_unset();
session_destroy();
echo "<script type='text/javascript'> document.location = '../index.php'; </script>";

?>