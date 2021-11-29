<?php

session_start();

require_once "../model/model.php";


function validate_input($str)
{
    return htmlspecialchars(trim($str));
}

$messages = [
    "errors" => [],
    "success" => "",
    "unsuccess" => "",
    "data" => []
];

if (isset($_POST['addproduct'])) {
    $has_err = false;

    $name = "";
    $buyingprice = "";
    $sellingprice = "";
    $display = "";

    if (empty($_POST['name'])) {
        $messages['errors']['name'] = "Name is required";
        $has_err = true;
    } else if (strlen($_POST['name']) < 2) {
        $messages['errors']['name'] = "Invalid Name";
        $has_err = true;
    } else if (preg_match("/^[a-zA-Z-.]/", $_POST['name']) != 1) {
        $messages['errors']['name'] = "Invalid Name";
        $has_err = true;
    } else {
        $name = validate_input($_POST['name']);
        $messages['data']['name'] = $name;
    }

    if (empty($_POST['buyingprice'])) {
        $messages['errors']['buyingprice'] = "Buying price is required";
        $has_err = true;
    } else if (!is_numeric($_POST['buyingprice'])) {
        $messages['errors']['buyingprice'] = "Invalid Price";
        $has_err = true;
    } else {
        $buyingprice = validate_input($_POST['buyingprice']);
        $messages['data']['buyingprice'] = $buyingprice;
    }

    if (empty($_POST['sellingprice'])) {
        $messages['errors']['sellingprice'] = "Selling price is required";
        $has_err = true;
    } else if (!is_numeric($_POST['sellingprice'])) {
        $messages['errors']['sellingprice'] = "Invalid Price";
        $has_err = true;
    } else {
        $sellingprice = validate_input($_POST['sellingprice']);
        $messages['data']['sellingprice'] = $sellingprice;
    }

    if (isset($_POST['display']) && preg_match("/on|off/", $_POST['display']) != 1) {
        $messages['errors']['display'] = "Invalid display value";
        $has_err = true;
    } else {
        $display = isset($_POST['display']) ? $_POST['display'] : "";
        $messages['data']['display'] = $display;
    }

    if (!$has_err) {
        $product = new Product();

        $product->setName($name);
        $product->setBuyingPrice($buyingprice);
        $product->setSellingPrice($sellingprice);

        if (addProduct($product)) {
            $messages['success'] = "Product Added Successfully";

            if($display == "on")
            {
                $_SESSION['messages'] = $messages;
                header("Location: ../ViewProduct.php");
                exit();
            }

            $_SESSION['messages'] = $messages;
            header("Location: ../AddProduct.php");
            exit();
        } else {
            $messages['unsuccess'] = "Product Add Failed";

            $_SESSION['messages'] = $messages;
            header("Location: ../AddProduct.php");
            exit();
        }
    } else {
        $_SESSION['messages'] = $messages;
        header("Location: ../AddProduct.php");
        exit();
    }
} else {
    $_SESSION['messages'] = $messages;
    header("Location: ../AddProduct.php");
    exit();
}