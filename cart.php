<?php
session_start();

// // Connect to the database
// $servername = "localhost";
// $username = "bob";
// $password = "down";
// $dbname = "onlineshop";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Assuming you have collected customer details in the session
$customerName = $_SESSION['user_name'];
$customerEmail = $_SESSION['user_email'];
$customerAddress = $_SESSION['user_address'];

// Code to retrieve product details based on POST submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['prod_name']) && isset($_POST['product_desription']) && isset($_POST['quantity']) && isset($_POST['price'])) {
        $productName = $_POST['prod_name'];
        $productDescription = $_POST['product_desription'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $totalPrice = $quantity * $price;
    } else {
        header('Location:shop.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>

<body>
    <h1>Your Shopping Cart</h1>
    <p><strong>Customer Name:</strong> <?php echo $customerName; ?></p>
    <p><strong>Customer Email:</strong> <?php echo $customerEmail; ?></p>
    <p><strong>Customer Address:</strong> <?php echo $customerAddress; ?></p>

    <h2>Product Details:</h2>
    <table border="1" style="width:80%">
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        <tr>
            <td><?php echo $productName; ?></td>
            <td><?php echo $productDescription; ?></td>
            <td><?php echo $quantity; ?></td>
            <td>$<?php echo $price; ?></td>
            <td>$<?php echo $totalPrice; ?></td>
        </tr>
    </table>

    <form method="post" action="insert_invoice_item.php">
      <input type="hidden" name="customer_name" value="<?php echo $customerName; ?>">
      <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
      <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
      <input type="submit" name="submit" value="Add to Invoice and Continue Shopping">
    </form>

    <p><a href="shop.php">Continue Shopping</a></p>


  <hr>
    <aside id="debug">
      <hr>
      <!-- ID for h3 is 'bottompage' so that floating button can reach to bottom of page. -->
      <h3 id="bottompage">Debug Area</h3>
      <pre>
        GET Contains:
        <?php print_r($_GET) ?>
        POST Contains:
        <?php print_r($_POST) ?>
        SESSION Contains:
        <?php print_r($_SESSION) ?>
        <?php clearButton(); ?>
      </pre>
      <hr>
      <h3>Code Area</h3>
        <?php //debugModule() ?>
        <?php printMyCode() ?>
  </aside>
</body>

</html>
