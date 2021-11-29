<?php

session_start();


function validate_input($str)
{
    return htmlspecialchars(trim($str));
}

if (isset($_POST['editproduct'])) {

    require_once "../model/model.php";

    $messages = [
        "errors" => [],
        "success" => "",
        "unsuccess" => "",
        "data" => []
    ];

    $has_err = false;

    $name = "";
    $buyingprice = "";
    $sellingprice = "";

    // Name
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

    // Buying price
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

    // Selling price
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


    if (!$has_err) {
        $product = new Product();

        $product->setId($_POST['id']);
        $product->setName($name);
        $product->setBuyingPrice($buyingprice);
        $product->setSellingPrice($sellingprice);

        if (editProduct($product)) {
            $messages['success'] = "Product Edit Successful";

            $_SESSION['messages'] = $messages;
            header("Location: ../EditProduct.php?id=" . $_POST['id']);
            exit();
        } else {
            $messages['unsuccess'] = "Product Edit Unsuccessful";

            $_SESSION['messages'] = $messages;
            header("Location: ../EditProduct.php?id=" . $_POST['id']);
            exit();
        }
    } else {
        $_SESSION['messages'] = $messages;
        header("Location: ../EditProduct.php?id=" . $_POST['id']);
        exit();
    }
} else if (isset($_GET['id'])) {

    require_once "./model/model.php";

    $data = getProduct($_GET['id']);


    $messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : [
        "errors" => [],
        "success" => "",
        "unsuccess" => "",
        "data" => []
    ];

    if ($data) {

        $messages['data'] = [
            'id' => $data['productId'],
            'name' => $data['productName'],
            'buyingprice' => $data['buyingPrice'],
            'sellingprice' => $data['sellingPrice']
        ];

        $_SESSION['messages'] = $messages;
    } else {
        $messages['unsuccess'] = "No Products found";
        $_SESSION['messages'] = $messages;
    }
}