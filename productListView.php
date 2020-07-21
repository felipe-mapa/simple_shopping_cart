<?php
require_once('products.php');

$products_array = $products;

if (!empty($products_array)) {
    foreach ($products_array as $key => $value) {
        $name = $products_array[$key]["name"];
        $price = number_format($products_array[$key]["price"], 2);
?>
        <tr>
            <form>
                <td>
                    <p><?php echo $name ?></p>
                </td>
                <td>
                    <p>$<?php echo $price ?></p>
                </td>
                <td><button type="button" onClick="cartAction('add','<?php echo $key ?>')">ADD</button></td>
            </form>
        </tr>
<?php
    }
}

?>