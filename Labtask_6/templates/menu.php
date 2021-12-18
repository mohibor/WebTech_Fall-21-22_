<?php

/**
 * Can't access directly by URL
 */

defined("_DIRECT_ACCESS") or exit("<h1>Your are not allowed</h1>");
?>

<?php function primary_menu()
{ ?>

    <header class="header">
        <div class="header__logo">
            <a href="index.php">
                <img src="images/logo (White).png" alt="Cloies">
            </a>

        </div>
        <nav class="header__navigation">

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>

                <ul>
                    <li><span>Logged in as <a href="view-profile.php"><?php echo ucfirst($_SESSION['username']); ?></a></span></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>

            <?php else : ?>

                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Registration</a></li>
                </ul>

            <?php endif; ?>

        </nav>
    </header>

<?php } ?>

<?php function aside_menu()
{ ?>

    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>

        <div id = "sidemenu" class="side_menu__navigation">
            <h1>Account</h1>
            <hr>
            <nav class="side_menu__navigation">
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="view-profile.php">View Profile</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-profile-picture.php">Change Profile Picture</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <br>
        <br>

    <?php endif; ?>

<?php } ?>