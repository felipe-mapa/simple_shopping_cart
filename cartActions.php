<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('products.php');

$products_array = $products;

if (!empty($_POST["action"])) {
    switch ($_POST["action"]) {
        case "add":
            $newProduct = $products_array[$_POST["index"]];
            $itemArray = array($newProduct["name"] => array('name' => $newProduct["name"], 'quantity' => 1, 'price' => $newProduct["price"]));

            if (!empty($_SESSION["cart"])) {
                $cartCodeArray = array_keys($_SESSION["cart"]);
                if (isset($_SESSION["cart"][$newProduct["name"]])) {
                    $_SESSION["cart"][$newProduct["name"]]["quantity"] += 1;
                } else {
                    $_SESSION["cart"] = array_merge($_SESSION["cart"], $itemArray);
                }
            } else {
                $_SESSION["cart"] = $itemArray;
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $k => $v) {
                    if ($_POST["index"] == $k)
                        unset($_SESSION["cart"][$k]);
                    if (empty($_SESSION["cart"]))
                        unset($_SESSION["cart"]);
                }
            }
            break;
    }
}
?>

<?php require_once 'cartView.php'; ?>