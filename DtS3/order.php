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

if (isset($_POST['prod_description'])) {
  $description = $_POST['prod_description'];

  // Query to fetch products for the selected category
  $sql = "SELECT * FROM products WHERE prod_description = '$description'";
  $result = $conn->query($sql);
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




  <aside>
    <table>
       <tr>
          <td></td>
          <td><h1>Order Here</h1></td>
          <td></td>
        </tr>
      <tr>
      <?php
    // Display products for the selected category
    if (isset($result) && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<p>Name: ' . $row['name'] . '</p>';
        echo '<p>Description: ' . $row['prod_description'] . '</p>';
        echo '<p>Price: $' . $row['price'] . '</p>';
        echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" />';
        echo '<form method="post" action="cart.php">';
        echo '<input type="hidden" name="product_id" value="' . $row['id'] . '" />';
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
    } else {
      echo '<p>No products found in this category.</p>';
    }
    ?>

      </tr>

  </form>
  </table>
  </aside>








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





















































