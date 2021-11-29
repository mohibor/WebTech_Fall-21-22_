<?php
session_start();

$messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : [
    "errors" => [],
    "success" => "",
    "unsuccess" => "",
    "data" => []
];

$_SESSION['messages'] = [
    "errors" => [],
    "success" => "",
    "unsuccess" => "",
    "data" => []
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Details</title>

    <style>
        nav ul li {
            display: inline-block;
            border-style: solid;
            border-color: lightblue;
        }

        nav ul li a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
        }

        nav {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="AddProduct.php">Add Product</a></li>
            <li><a href="ViewProduct.php">View Product</a></li>
        </ul>
    </nav>
</body>

</html>