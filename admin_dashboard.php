<?php
// Start the session
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'bob', 'down', 'onlineshop')
    or die('Error connecting to MySQL server.');

// Initialize variables
$errorMessage = "";
$deleteMessage = "";

// **** DELETE******* Handle record deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $invoiceIdToDelete = $_POST["delete"];
    $deleteQuery = "DELETE FROM `invoice_items` WHERE `invoice_id` = '$invoiceIdToDelete'";
    if (mysqli_query($db, $deleteQuery)) {
        $deleteMessage = "Record with Invoice ID $invoiceIdToDelete has been deleted.";
    } else {
        $errorMessage = "Error deleting record: " . mysqli_error($db);
    }
}

//  Query to retrieve records
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'customer_name';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';

$query = "SELECT A.customer_name, A.invoice_id, A.product_name, A.quantity, B.user_email, B.user_address 
          FROM `invoice_items` AS A JOIN `customers` AS B ON A.customer_name = B.user_name
          ORDER BY $sortColumn $sortOrder";
$result = mysqli_query($db, $query) or die('Error querying database.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style2.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- Self Reloading a page -->
    <meta http-equiv="refresh" content="6000">

</head>
<body>
    <!-- Header section -->
    <!--This is the header/ banner section of the web page-->
    <header>
      <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>


    <!-- Navigation section -->
    <nav>
          <ul>
            <li> <a href="index.php">Home</Details></a></li>
            
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
              <li><a href="update.php">Account Update</a></li>
              <li><a href="logout.php">log out</a></li>
          </ul>
        </nav>


    <!-- Main content section -->
    <main>
        <h2>Admin Dashboard - Reports</h2>
        <hr>
        <h3>All Orders - List</h3>

        <!-- Display delete message if any -->
        <p class="error"><?php echo $deleteMessage; ?></p>
        <p class="error"><?php echo $errorMessage; ?></p>

        <table border="1">
            <tr>
                <th><a href="?sort=customer_name&order=<?php echo ($sortColumn === 'customer_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">Customer Name</a></th>
                <th><a href="?sort=invoice_id&order=<?php echo ($sortColumn === 'invoice_id' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">Invoice ID</a></th>
                <th><a href="?sort=product_name&order=<?php echo ($sortColumn === 'product_name' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">Product Name</a></th>
                <th><a href="?sort=quantity&order=<?php echo ($sortColumn === 'quantity' && $sortOrder === 'asc') ? 'desc' : 'asc'; ?>">Quantity</a></th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>" . $row['customer_name'] . "</td>
                        <td>" . $row['invoice_id'] . "</td>
                        <td>" . $row['product_name'] . "</td>
                        <td>" . $row['quantity'] . "</td>
                        <td>" . $row['user_email'] . "</td>
                        <td>" . $row['user_address'] . "</td>
                        <td>
                            <form method='post'>
                                <button type='submit' name='delete' value='" . $row['invoice_id'] . "'>Delete</button>
                            </form>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </main>

    <!-- Debug area -->
    <hr>
    <aside id="debug">
        <hr>
        <h3>Debug Area</h3>
        <pre>
            GET Contains:
            <?php print_r($_GET); ?>
            POST Contains:
            <?php print_r($_POST); ?>
            SESSION Contains:
            <?php print_r($_SESSION); ?>
        </pre>
    </aside>

    <!-- Footer section -->
</body>
</html>
