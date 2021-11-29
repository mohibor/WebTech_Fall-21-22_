<?php

function validate_input($str)
{
    return htmlspecialchars(trim($str));
}

if ($_SERVER['SCRIPT_FILENAME'] == strtr(__FILE__, "\\", "/")) {
    header("Location: ../ViewProduct.php");
    exit();
}

require_once "./model/model.php";

$messages = [
    "errors" => [],
    "success" => "",
    "unsuccess" => "",
    "data" => []
];

$datas = getAllProduct();

if ($datas) {
    $messages['data'] = $datas;
    $_SESSION['messages'] = $messages;
} else {
    $messages['unsuccess'] = "No Products found";
    $_SESSION['messages'] = $messages;
}