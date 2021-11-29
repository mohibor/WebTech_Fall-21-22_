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
    <title>Product Details | Add Product</title>

    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        table tr td:first-child {
            width: 150px;
        }

        nav {
            text-align: center;
        }

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


        .center {
            margin-left: auto;
            margin-right: auto;
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
    <form action="./controller/ConAddProduct.php" method="post">
        <fieldset>
            <legend class="center">Add Product</legend>
            <div>
                <table class="center">
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td>:<input type="text" name="name" id="name" value="<?php echo isset($messages['data']['name']) ? $messages['data']['name'] : ""; ?>"></td>
                        <td class="error"><?php echo isset($messages['errors']['name']) ? $messages['errors']['name'] : ""; ?></td>
                    </tr>
                </table>
                <table class="center">
                    <tr>
                        <td><label for="buyingprice">Buying Price</label></td>
                        <td>:<input type="text" name="buyingprice" id="buyingprice" value="<?php echo isset($messages['data']['buyingprice']) ? $messages['data']['buyingprice'] : ""; ?>"></td>
                        <td class="error"><?php echo isset($messages['errors']['buyingprice']) ? $messages['errors']['buyingprice'] : ""; ?></td>
                    </tr>
                </table>
                <table class="center">
                    <tr>
                        <td><label for="sellingprice">Selling Price</label></td>
                        <td>:<input type="text" name="sellingprice" id="sellingprice" value="<?php echo isset($messages['data']['sellingprice']) ? $messages['data']['sellingprice'] : ""; ?>"></td>
                        <td class="error"><?php echo isset($messages['errors']['sellingprice']) ? $messages['errors']['sellingprice'] : ""; ?></td>
                    </tr>
                </table>
                <table class="center">
                    <tr>
                        <td><input type="checkbox" name="display" id="display" <?php echo isset($messages['data']['display']) && $messages['data']['display'] == "on" ? " checked" : ""; ?>><label for="display">Display</label></td>
                        <td class="error"><?php echo isset($messages['errors']['display']) ? $messages['errors']['display'] : ""; ?></td>
                        <td></td>
                    </tr>
                </table>
                <hr>
                <table class="center">
                    <tr>
                        <td><input type="submit" name="addproduct" value="Submit"></td>
                        <td class="error">
                            <?php if (isset($messages['success'])) : ?>
                                <span class="success"><?php echo $messages['success']; ?></span>

                            <?php elseif (isset($messages['unsuccess'])) : ?>
                                <span class="error"><?php echo $messages['unsuccess']; ?></span>

                            <?php endif; ?>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </fieldset>
    </form>
</body>

</html>