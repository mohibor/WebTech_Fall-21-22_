<?php

session_start();


function validate_input($str)
{
    return htmlspecialchars(trim($str));
}

if (isset($_POST['deleteproduct'])) {

    require_once "../model/model.php";

    $messages = [
        "errors" => [],
        "success" => "",
        "unsuccess" => "",
        "data" => []
    ];

    $has_err = false;

    $id = "";

    // Name
    if (empty($_POST['id'])) {
        $messages['errors']['id'] = "ID is required";
        $has_err = true;
    } else if (!is_numeric($_POST['id'])) {
        $messages['errors']['id'] = "Invalid ID";
        $has_err = true;
    } else {
        $id = validate_input($_POST['id']);
        $messages['data']['id'] = $id;
    }


    if (!$has_err) {

        if (deleteProduct($id)) {
            header("Location: ../ViewProduct.php");
            exit();
        } else {
            $messages['unsuccess'] = "Unsuccessful to delete Product";

            $_SESSION['messages'] = $messages;
            header("Location: ../DeleteProduct.php?pd=" . $id);
            exit();
        }
    } else {
        $_SESSION['messages'] = $messages;
        header("Location: ../DeleteProduct.php?pd=" . $id);
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
            'buyingprice' => $data['sellingPrice'],
            'sellingprice' => $data['buyingPrice']
        ];

        $_SESSION['messages'] = $messages;
    } else {
        $messages['unsuccess'] = "No Products found";
        $_SESSION['messages'] = $messages;
    }
}