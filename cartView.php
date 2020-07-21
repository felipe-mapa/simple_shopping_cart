<?php
if (isset($_SESSION["cart"])) {
    $total = 0;
?>
    <h1>CART</h1>
    <table>
        <tbody>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            <?php
            foreach ($_SESSION["cart"] as $prod) {
            ?>
                <tr>
                    <td><?php echo $prod["name"]; ?></td>
                    <td>$<?php echo number_format($prod["price"], 2); ?></td>
                    <td><?php echo $prod["quantity"]; ?></td>
                    <td>$<?php echo number_format($prod["price"] * $prod["quantity"], 2); ?></td>
                    <td><button type="button" onClick="cartAction('remove','<?php echo $prod["name"]; ?>')">Delete</button></td>
                </tr>
            <?php
                $total += ($prod["price"] * $prod["quantity"]);
            }
            ?>

            <tr>
                <td colspan="3"><strong>Total:</strong></td>
                <td>$<?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<?php
}
?>