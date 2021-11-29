<?php

session_start();

require_once "../model/model.php";


function validate_input($str)
{
    return htmlspecialchars(trim($str));
}

if (isset($_POST['search'])) {


    $has_err = false;
    $messages = [
        "errors" => [],
        "success" => "",
        "unsuccess" => "",
        "data" => []
    ];

    $searchquery = "";

    if (empty($_POST['searchquery'])) {
        $messages['errors']['searchquery'] = "Please enter a search query";
        $has_err = true;
    } else {
        $searchquery = validate_input($_POST['searchquery']);
        $messages['searchquery'] = $searchquery;
    }


    if (!$has_err) {
        $datas = getAllProduct($searchquery);

        if (count($datas)) {
            $messages['data'] = $datas;
            $_SESSION['messages'] = $messages;
        } else {
            $messages['data'] = $datas;
            $messages['unsuccess'] = "No Products found";
            $_SESSION['messages'] = $messages;
        }

        header("Location: ../ViewProduct.php?searchquery=" . $searchquery);
    } else {
        $_SESSION['messages'] = $messages;
        header("Location: ../ViewProduct.php?searchquery=" . $searchquery);
        exit();
    }
} else {
    header("Location: ../ViewProduct.php");
    exit();
}