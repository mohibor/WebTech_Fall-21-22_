<?php

session_start();

if (!isset($_GET['searchquery']) || empty($_GET['searchquery'])) {

    require_once "./controller/ConViewProduct.php";
}

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
    <title>Product Details | View Product</title>

    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        table,
        td,
        th {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
            border-collapse: collapse;
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
    <form action="./controller/ConSearchProduct.php" method="post">
        <fieldset>
            <legend class="center">View Product</legend>
            <table class="center">

                <tr>
                    <td colspan="4"><input type="text" name="searchquery" value="<?php echo isset($messages['searchquery']) ? $messages['searchquery'] : ""; ?>"></td>
                    <td><input type="submit" name="search" value="Search"></td>
                </tr>
                <?php if (count($messages['data']) > 0) : ?>


                    <?php if (isset($messages['errors']['searchquery']) && !empty($messages['errors']['searchquery'])) : ?>

                        <tr>
                            <td class="error" colspan="5"><?php echo $messages['errors']['searchquery']; ?></td>
                        </tr>

                    <?php endif; ?>

                    <tr>
                        <th>Name</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th colspan="2">Action</th>
                    </tr>

                <?php endif; ?>

                <?php foreach ($messages['data'] as $data) : ?>

                    <tr>
                        <td><?php echo $data['productName'] ?></td>
                        <td><?php echo $data['sellingPrice'] ?></td>
                        <td><?php echo $data['buyingPrice'] ?></td>
                        <td><a href="EditProduct.php?id=<?php echo $data['productId'] ?>">Edit</a></td>
                        <td><a href="DeleteProduct.php?id=<?php echo $data['productId'] ?>">Delete</a></td>
                    </tr>

                <?php endforeach; ?>

                <?php if (isset($messages['unsuccess']) && !empty($messages['unsuccess'])) : ?>

                    <tr>
                        <td class="error" colspan="5"><?php echo $messages['unsuccess']; ?></td>
                    </tr>

                <?php endif; ?>

            </table>
        </fieldset>
    </form>
</body>

</html>