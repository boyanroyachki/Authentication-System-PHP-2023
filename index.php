<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/signup_model.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Document</title>
</head>
<body>
    <?php 
    if (!isset($_SESSION["user_id"])){ ?>
        <h3>Log in</h3>
        <form action="includes/login.inc.php" method="post">
             <input type="text" name="username" placeholder="Username">
             <input type="password" name="pwd" placeholder="Password">
             <button>Login</button>
        </form>
    <?php }?>


    <?php
      check_login_errors();
    ?>

    <h6>or</h6>

    <h3>Sign up</h3>

    <form action="includes/signup.inc.php" method="post">
        <?php signup_input();?>
        <button>Sign up</button>
    </form>

    <?php
        check_signup_errors(); 
    ?> 

    <?php
        if (isset($_SESSION["user_id"])){?>
            <h3>Log out</h3>
            <form action="includes/logout.inc.php" method="post">
            <button>Logout</button>
            </form>
    <?php }?>

<script src="js/main.js"></script>
</body>
</html>