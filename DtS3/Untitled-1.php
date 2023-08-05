
<?php
  session_start();

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

  // Query to fetch data from the database
  $sql = "SELECT * FROM products ORDER BY category";

  $result = $conn->query($sql);

  if (!$result) {
    die("Database error: " . $conn->error);
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<style>
  .error { color: #FF0000; }
</style>

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
  <title>Astral Online Business Shop</title>

</head>

<body>
  <!--This is the header/ banner section of the web page-->
  <header>
      <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>

  <!--This is the navigation bar for the web site-->
    <nav>
          <ul>
            <li> <a href="index.php">Home</Details></a></li>
  
            <!-- <li><a href="shop.php">Shop</a></li>           -->
            
            <!-- <li><a href="items.php">Items</a></li> -->
            <li><a href="login.php">Login</a></li>   
            <li><a href="register.php">Register</a></li>
            
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
           <li><a href="contact.php">Contact</a></li>
            
          </ul>
        </nav>


  <main>
    
    <!-- Display products under different categories -->
    <?php
    $currentCategory = '';
    while ($row = $result->fetch_assoc()) {
      if ($currentCategory != $row['category']) {
        // Display category name as a heading
        echo '<h2>' . $row['category'] . '</h2>';
        $currentCategory = $row['category'];
      }

      // Display product details
      echo '<div>';
      echo '<p>Name: ' . $row['name'] . '</p>';
      echo '<p>Description: ' . $row['description'] . '</p>';
      echo '<p>Price: $' . $row['price'] . '</p>';

      // Quantity selection dropdown
      echo '<form method="post" action="">';
      echo '<label for="quantity">Select Quantity:</label>';
      echo '<select id="quantity" name="quantity">';
      echo '<option value="" disabled selected>select option</option>';
      echo '<option value="1">1</option>';
      echo '<option value="2">2</option>';
      echo '<option value="3">3</option>';
      echo '<option value="4">4</option>';
      echo '</select>';
      echo '<input type="submit" name="submit" value="Add to Cart">';
      echo '</form>';
      echo '</div>';
    }
    ?>
  </main>

  <?php
  // Handle form submission and save order data to the invoice_item table
  if (isset($_POST['submit']) && !empty($_POST['quantity'])) {
    $name = $_SESSION['user_name'];
    $invoice_id = uniqid(); // Generate a unique invoice ID
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];

    // Save the order to the invoice_item table
    $stmt = $conn->prepare("INSERT INTO invoice_item (user_name, invoice_id, product_name, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $invoice_id, $product_name, $quantity);
    $stmt->execute();
    $stmt->close();

    // Redirect the user to the shop page after placing the order
    header('Location: shop.php');
    exit();
  }

  // Close the database connection
  $conn->close();
  ?>
</body>

</html>


