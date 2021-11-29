<?php

$name = "";
$name_err = "";

$uniname = "";
$uniname_err = "";

$id = "";
$id_err = "";

$email = "";
$email_err = "";

$phone = "";
$phone_err = "";

$gender = "";
$gender_err = "";

$bloodgrp = "";
$bloodgrp_err = "";

if (isset($_POST["submit"])) {
    if(empty($_POST['name'])) {
        $name_err = "Name can't be empty";
    } else if(strlen($_POST['name']) < 2) {
        $name_err = "Invalid Name";
    } else {
        $name = validate_input($_POST['name']);
    }
	
	if(empty($_POST['uniname'])) {
        $uniname_err = "University Name can't be empty";
    } else if(strlen($_POST['uniname']) < 2) {
        $uniname_err = "Invalid University Name";
    } else {
        $uniname = validate_input($_POST['uniname']);
    }
	
	if(empty($_POST['id'])) {
        $id_err = "ID Number can't be empty";
    } else if (preg_match("^([0-9]\d{6})$", $_POST['id']) != 1) {
        $id_err = "Invalid ID number";
    } else {
        $id = validate_input($_POST['id']);
    }

    if(empty($_POST['email'])) {
        $email_err = "Email is required";
    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Email is not valid";
    } else {
        $email = validate_input($_POST['email']);
    }

    if(empty($_POST['phone'])) {
        $phone_err = "Phone Number can't be empty";
    } else if (preg_match("^((01)[3-9]\d{1}[0-9]\d{6})$", $_POST['phone']) != 1) {
        $phone_err = "Invalid Phone number";
    } else {
        $phone = validate_input($_POST['phone']);
    }

    if(empty($_POST['gender'])) {
        $gender_err = "Select Gender";
    } else {
        $gender = validate_input($_POST['gender']);
    }

    if(empty($_POST['bloodgrp'])) {
        $bloodgrp_err = "Select Blood group";
    } else {
        $bloodgrp = $_POST['bloodgrp'];
    }
}

function validate_input($str) {
    return htmlspecialchars(trim($str));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP validation</title>

    <style>
        .err {
            color: red;
        }
    </style>
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <legend>
                <label for="name">Name</label>
            </legend>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
            <span class="err"><?php echo $name_err; ?></span>
        </fieldset>
		
		<fieldset>
            <legend>
                <label for="uniName">University Name</label>
            </legend>
            <input type="text" uniName="uniname" id="uniname" value="<?php echo $uniname; ?>">
            <span class="err"><?php echo $uniname_err; ?></span>
        </fieldset>
		
		<fieldset>
            <legend>
                <label for="id">ID</label>
            </legend>
            <input type="text" name="id" id="id" value="<?php echo $id; ?>">
            <span class="err"><?php echo $id_err ?></span>
        </fieldset>

        <fieldset>
            <legend>
                <label for="email">Email</label>
            </legend>
            <input type="text" name="email" id="email" value="<?php echo $email; ?>">
            <span class="err"><?php echo $email_err ?></span>
        </fieldset>

        <fieldset>
            <legend>
                <label for="phone">Phone Number</label>
            </legend>
            <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
            <span class="err"><?php echo $phone_err ?></span>
        </fieldset>

        <fieldset>
            <legend>
                <label for="gender">Gender</label>
            </legend>
            <input type="radio" name="gender" value="male" id="male"<?php echo ($gender == "male") ? " checked": ""; ?>><label for="male">Male</label>
            <input type="radio" name="gender" value="female" id="female"<?php echo ($gender == "female") ? " checked": ""; ?>><label for="female">Female</label>
            <input type="radio" name="gender" value="other" id="other"<?php echo ($gender == "other") ? " checked": ""; ?>><label for="other">Other</label>
            <span class="err"><?php echo $gender_err ?></span>
        </fieldset>

        <fieldset>
            <legend>
                <label for="bloodgrp">Blood Group</label>
            </legend>
            <select name="bloodgrp" id="bloodgrp">
                <option selected></option>
                <option value="a+"<?php echo ($bloodgrp == "a+") ? " selected": ""; ?>>A+</option>
                <option value="a-"<?php echo ($bloodgrp == "a-") ? " selected": ""; ?>>A-</option>
                <option value="b+"<?php echo ($bloodgrp == "b+") ? " selected": ""; ?>>B+</option>
                <option value="b-"<?php echo ($bloodgrp == "b-") ? " selected": ""; ?>>B-</option>
                <option value="o+"<?php echo ($bloodgrp == "o+") ? " selected": ""; ?>>O+</option>
                <option value="o-"<?php echo ($bloodgrp == "o-") ? " selected": ""; ?>>O-</option>
                <option value="ab+"<?php echo ($bloodgrp == "ab+") ? " selected": ""; ?>>AB+</option>
                <option value="ab-"<?php echo ($bloodgrp == "ab-") ? " selected": ""; ?>>AB-</option>
            </select>
            <span class="err"><?php echo $bloodgrp_err ?></span><br><br>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

</body>

</html>