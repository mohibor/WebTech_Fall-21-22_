<?php

$messages = [];
// var_dump($_POST);
// return;
if (isset($_POST['nid'])) {

    define('STORE_NID', '6892712065');

    $has_err = false;

    $nid = "";


    // Validate NID
    if (empty($_POST['nid'])) {
        $messages['errors'] = "NID is required";
        $has_err = true;
    } else if (preg_match("/^(?!0)(([0-9]{10,13}))$/", $_POST['nid']) !== 1) {
        $messages['errors'] = "Invalid NID";
        $has_err = true;
    } else if (STORE_NID === $_POST['nid']) {
        $messages['errors'] = "NID already registred";
        $has_err = true;
    } else {
        $messages['data'] = htmlspecialchars(trim($_POST['nid']));
    }

    echo json_encode($messages);
} else if (isset($_POST['email'])) {

    define('STORE_EMAIL', 'mohib@user.com');

    $has_err = false;

    $email = "";


    // Validate email
    if (empty($_POST['email'])) {
        $messages['errors'] = "Email is required";
        $has_err = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $messages['errors'] = "Invalid Email";
        $has_err = true;
    } else if (STORE_EMAIL === $_POST['email']) {
        $messages['errors'] = "Email already registred";
        $has_err = true;
    } else {
        $messages['data'] = htmlspecialchars(trim($_POST['email']));
    }

    echo json_encode($messages);
} else {
    $messages['errors'] = "Invalid server request";
    // echo '<pre>';
    // print_r($messages);
    // echo '</pre>';


    echo json_encode($messages);
}
