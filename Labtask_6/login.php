<?php

/**
 * Can access direcly by URL
 */

define("_DIRECT_ACCESS", true);

?>
<?php require_once __DIR__ . "/helper/functions.php"; ?>
<?php require_once _ROOT_DIR . "controller/LoginController.php"; ?>
<?php

?>

<?php header_page("Login"); ?>

<?php primary_menu(); ?>

<section class="main">

    <?php // aside_menu(); 
    ?>

    <main>
        <form class="main__content--login__form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend class="login_center_text">Login</legend>
                <div>
                    <table class="table_center">
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td>: <input type="text" name="username" id="username" value="<?php echo $username ?>"></td>
                            <td><span class="error"><?php echo $err_username; ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td>: <input type="password" name="password" id="password" value="<?php echo $password ?>"></td>
                            <td><span class="error"><?php echo $err_password; ?></span></td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div class="table_center">
                    <input type="checkbox" name="rememberme" id="rememberme">
                    <label for="rememberme">Remember Me</label>
                    <span class="error"><?php echo $err_rememberme; ?></span><br><br>
                    <span><a href="forget-password.php">Forgot Password?</a></span><br><br>
                    <input type="submit" name="login" value="Submit" class="login_center">
                    <span class="error"><?php echo $credential_msg; ?></span>
                </div>
            </fieldset>
        </form>
    </main>
</section>