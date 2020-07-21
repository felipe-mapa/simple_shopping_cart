<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <title>Simple Cart</title>
</head>

<body>
    <h1>Product list</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php require_once 'productListView.php'; ?>
    </table>
    <div id="cartTable">
        <?php require_once 'cartActions.php'; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const cartAction = (action, index) => {
            const queryString = 'action=' + action + '&index=' + index

            jQuery.ajax({
                url: "cartActions.php",
                data: queryString,
                type: "POST",
                success: (data) => {
                    $("#cartTable").html(data);
                },
                error: () => {}
            });
        }
    </script>
</body>

</html>