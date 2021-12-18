<?php

/**
 * Can access direcly by URL
 */

define("_DIRECT_ACCESS", true);

?>
<?php require_once __DIR__ . "/helper/functions.php"; ?>
<?php require_once _ROOT_DIR . "controller/EditProfileController.php"; ?>

<?php

?>

<?php header_page("Edit Profile"); ?>

<?php primary_menu(); ?>

    <section class="main">

        <?php aside_menu(); ?>

        <main>
            <!-- <form class="main__content--edit-profile__form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend class="edit_profile_center_text">EDIT PROFILE</legend>
                    <div>
                        <table class="table_center">
                            <tr>
                                <td><label for="name">Name :</label></td>
                                <td><input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>"></td>
                                <td class="error"><?php echo $err_name ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table_center">
                            <tr>
                                <td><label for="email">Email :</label></td>
                                <td><input type="text" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"></td>
                                <td class="error"><?php echo $err_email ?></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table_center">
                            <tr>
                                <td><label>Gender :</label></td>
                                <td><input type="radio" name="gender" value="male" id="male" <?php echo ($_SESSION['gender'] == "male") ? " checked" : ""; ?>><label for="male">Male</label>
                                    <input type="radio" name="gender" value="female" id="female" <?php echo ($_SESSION['gender'] == "female") ? " checked" : ""; ?>><label for="female">Female</label>
                                    <input type="radio" name="gender" value="other" id="other" <?php echo ($_SESSION['gender'] == "other") ? " checked" : ""; ?>><label for="other">Other</label>
                                </td>
                                <td><span class="error"><?php echo $err_gender; ?></span></td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table_center">
                            <td><label for="dob">Date of Birth :</label></td>
                            <td><input type="date" name="dob" value="<?php echo $_SESSION['dob']; ?>" id="dob"></td>
                            <td><span class="error"><?php echo $err_dob; ?></span></td>
                        </table>
                        <hr>
                    </div>
                    <div>
                        <input type="submit" name="edit" value="Submit" class="login_center">
                        <span class="success"><?php echo $success_msg; ?></span>
                        <span class="error"><?php echo $unsuccess_msg; ?></span>
                    </div>
                </fieldset>
            </form>
        </main>
    </section>