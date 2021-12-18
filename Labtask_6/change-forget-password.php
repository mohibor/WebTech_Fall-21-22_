<?php

/**
 * Can access direcly by URL
 */

define("_DIRECT_ACCESS", true);

?>
<?php require_once __DIR__ . "/helper/functions.php"; ?>
<?php require_once _ROOT_DIR . "controller/ChangeForgetPasswordController.php"; ?>

<?php

?>

<?php header_page("Change Password"); ?>

<?php primary_menu(); ?>

<section class="main">

    <?php aside_menu(); ?>

    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset class="forget_center_text">
                <legend>CHANGE PASSWORD<strong><i><?php echo isset($_SESSION['foget_pass_email']) && !empty($_SESSION['foget_pass_email']) ? " For " . $_SESSION['foget_pass_email'] : ""; ?></i></strong></legend>
                <div>
                    <table class="charge_forget_pass_table_center">
                        <tr>
                            <td><label for="newpass">New Password :</label></td>
                            <td><input type="password" name="newpass" id="newpass" value="<?php echo $newpass; ?>"></td>
                            <td><span class="error"><?php echo $err_newpass; ?></span></td>
                        </tr>
                        <tr>
                            <td><label for="retypepass">Confirm New Password :</label></td>
                            <td><input type="password" name="retypepass" id="retypepass" value="<?php echo $retypepass; ?>"></td>
                            <td><span class="error"><?php echo $err_retypepass; ?></span></td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div>
                    <input type="submit" name="changeforgetpass" value="Submit">
                    <span class="success"><?php echo $success_msg; ?></span>
                    <span class="error"><?php echo $unsuccess_msg; ?></span>
                </div>
            </fieldset>
        </form>
    </main>
</section>