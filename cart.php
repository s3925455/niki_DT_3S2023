<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_name'])) {
  header('Location: login.php');
  exit;
}

// Connect to the database
$servername = "localhost";
$username = "bob";
$password = "down";
$dbname = "onlineshop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['prod_name']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_name'];
    $quantity = $_POST['quantity'];

    // Validate the inputs (you can add more validation if needed)
    if (empty($product_id) || empty($quantity)) {
      echo "Product ID and quantity are required.";
    } else {
      // Get the product details from the database
      $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
      $result = $stmt->get_result();

      // Check if the product exists
      if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Insert the cart item into the database
        $user_name = $_SESSION['user_name'];
        $product_name = $product_id['prod_name'];
        $quantity = $quantity['price'];
        $total_price = $price * $quantity;

        $stmt = $conn->prepare("INSERT INTO invoice_items (customer_name, product_name, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("ssiid", $user_name, $product_name, $quantity);
        $stmt->execute();

        // Redirect back to shop.php
        header('Location: shop.php');
        exit;
      } else {
        echo "Product not found.";
      }
    }
  }
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
  <!-- Other meta tags and CSS styles here -->
  <title>Astral Online Business Shop:Cart</title>
</head>

<body>

  <!--This is the header/ banner section of the web page. ID 'toppage' so that the floating button reacts to scroll web page to top of page-->
  <header id="toppage">
    <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
  </header>

      <!--This is the navigation bar for the web site-->
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

  <!-- Your cart page content goes here -->
  <h2>Your Cart</h2>
  <p>Welcome, <?php echo $_SESSION['user_name']; ?>!</p>
  <p>Email : <?php echo $_SESSION['user_email']; ?>!</p>
  <p>Postal Address :  <?php echo $_SESSION['user_address']; ?>!</p>

  <?php
  // // Display cart items for the user
  // $user_name = $_SESSION['user_name'];
  // $sql = "SELECT * FROM cart_items WHERE user_name = '$user_name'";
  // $result = $conn->query($sql);

  // if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>';
    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $_POST['product_name'] . '</td>';
      echo '<td>' . $_POST['quantity'] . '</td>';
      echo '<td>' . $_POST['price'] . '</td>';
      echo '<td>' . $_POST['total_price'] . '</td>';
      echo '</tr>';
    }
    echo '</table>';
  // } else {
  //   echo '<p>Your cart is empty.</p>';
  // }
  ?>


<hr>

  <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
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





















































