<?php

function addProduct(Product $product)
{
    $query = "INSERT INTO product_table (productName, buyingPrice, sellingPrice) VALUES (:productName, :buyingPrice, :sellingPrice)";

    return execute(
        $query,
        [
            ":productName"   => $product->getName(),
            ":buyingPrice"     => $product->getBuyingPrice(),
            ":sellingPrice"     => $product->getSellingPrice(),
        ]
    );
}

function editProduct(Product $product)
{
    $query = "UPDATE product_table SET productName = :productName, buyingPrice = :buyingPrice, sellingPrice = :sellingPrice WHERE productId = :productId";

    return execute(
        $query,
        [
            ":productName"   => $product->getName(),
            ":buyingPrice"     => $product->getBuyingPrice(),
            ":sellingPrice"     => $product->getSellingPrice(),
            ":productId"     => $product->getId(),
        ]
    );
}

function getAllProduct($search = "")
{
    $query = "SELECT * FROM product_table";

    if (!empty($search)) {

        $query .= " WHERE productName LIKE :search";

        return get($query, [
            ":search" => "%$search%",
        ]);
    }

    return get($query);
}

function getProduct(int $id)
{
    $query = "SELECT * FROM product_table WHERE productId = :productId";
    $results = get($query, [
        ":productId" => $id
    ]);

    if (count($results)) {
        return $results[0];
    }

    return false;
}

function deleteProduct(int $product_id)
{
    $query = "DELETE FROM product_table WHERE productId = :productId";

    return execute(
        $query,
        [
            ":productId"     => $product_id,
        ]
    );
}