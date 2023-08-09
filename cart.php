<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_name'])) {
  header('Location: login.php');
  exit;
}

// Assuming you have collected customer details in the session
$customerName = $_SESSION['user_name'];
$customerEmail = $_SESSION['user_email'];
$customerAddress = $_SESSION['user_address'];
$product_name = $_POST['prod_name'];
$quantity = $_SESSION['quantity'];
$product_description = $_SESSION['product_description'];
$price = $_SESSION['price'];
$total_price = $price * $quantity;


  // Connect to the database
  $servername = "localhost";
  $username = "bob";
  $password = "down";
  $dbname = "onlineshop";
  $product_name = $_POST['prod_name'];
  $quantity = $_POST['quantity'];
  $product_description = $_POST['product_description'];
  $price = $_POST['price'];
  $total_price = $price * $quantity;

  if(!empty($product_name) && !empty($quantity) && !empty( $product_name) ) {

    // Open conncetion
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // //Build SQL and execute

    $stmt = $conn->prepare("INSERT INTO invoice_items (customer_name, product_name, quantity) VALUES 
    ('$customerName', '$product_name,','$quantity' )");
    $stmt->execute();

    //Close conncetion
    $stmt->close();
    $conn->close();

    //Once completed go to shop.php web page
    header('Location:shop.php');
  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--***************************************************************-->
    <!--Developer Nikita Munjal of  Astral Website 2023 -->
    <!--***************************************************************-->
    <!-- <link rel="stylesheet" href="css/style1.css">-->
    <link rel="stylesheet" href="css/style2.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="nikita" content="onlinebusiness">
    <meta name="cloths" content="HTML, CSS, PHP">
    <!-- Self Reloading a page -->
    <meta http-equiv="refresh" content="10000">
    <title>Shopping Cart</title>
</head>



<body>
    <!--This is the header/ banner section of the web page-->
    <header>
      <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>

    <nav>
          <ul>                       
            <?php
            // //These links below will appear if the user has global admin rights. 
            // //This is desidned by user_name but ideally should be used with a role defined and better to reflect this in the table 
              $user_name = $_SESSION['user_name'];
                // $user_name = "aaa"; 
                if ($user_name === "aaa") {
                  echo '<li><a href="addproduct.php">Add Product</a></li>';
                  echo '<li><a href="admin_dashboard.php">Admin Dashboard</a></li>';
                  echo "Logged in as admin to view 2 extra links";
                }
            ?>
          <li><a href="shop.php">Shop</a></li>
           <li><a href="update.php">Account Update</a></li>
           <li><a href="logout.php">log out</a></li>
          </ul>
        </nav>




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
            <td><?php echo $product_name; ?></td>
            <td><?php echo  $product_description; ?></td> 
            <td><?php echo $quantity; ?></td>
            <td>$<?php echo $price; ?></td>
            <td>$<?php echo $total_price; ?></td>
        </tr>
    </table>

    <form method="post" action="#">
      <input type="hidden" name="customer_name" value="<?php echo $customerName; ?>">
      <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
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
      </pre>
      <hr>
  </aside>
</body>

</html>





