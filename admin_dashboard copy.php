<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<style>
.error {color: #FF0000;}
</style>
  <head>
    <!--***************************************************************-->
    <!--Developer Nikita Munjal of  Narrabundah Home page Website 2023 -->
    <!--***************************************************************-->
    <!-- <link rel="stylesheet" href="css/style1.css">-->
    <link rel="stylesheet" href="css/style2.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
        <!-- Self Reloading a page -->
        <meta http-equiv="refresh" content="600">
  </head>


  

  <body>
    <!--This is the header/ banner section of the web page-->
    <header>
    <img src="image/banner.jpg" alt="onlinebusiness Banner gif" />
    </header>


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


     <!--This is the main section of the web page where most of the information is provided-->
    
     <main>
    <table class="table">
        <tr>
            <th></th>
            <th>
                <h2>Admin Dashboard- Reports</h2>
                <hr>
                <h3>All Orders- List</h3>
            </th>
            <th>
                <?php
                // Return current date from the remote server
                $date = date('d-m-y');
                echo "Date: ";
                echo $date;
                ?>
            </th>
        </tr>
        <tr>
            <td></td>
            <td>
                <?php
                $dbtablename = "onlineshop";
                $dbuserid = $_SESSION['user_id'];
                // echo $dbuserid;
                // echo $dbtablename;
                //Step1
                $db = mysqli_connect('localhost', 'bob', 'down', 'onlineshop')
                or die('Error connecting to MySQL server.');

                $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'customer_name';
                $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';

                //Step2
                $query = "SELECT * FROM invoice_items ORDER BY $sortColumn $sortOrder";
                $result = mysqli_query($db, $query) or die('Error querying database.');

                echo "<table border='1' width='100%'>
                    <tr>
                        <th><a href='?sort=customer_name&order=" . ($sortColumn === 'customer_name' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Customer name</a></th>
                        <th><a href='?sort=invoice_id&order=" . ($sortColumn === 'invoice_id' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Invoice Id</a></th>
                        <th><a href='?sort=product_name&order=" . ($sortColumn === 'product_name' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Product Name</a></th>
                        <th><a href='?sort=quantity&order=" . ($sortColumn === 'quantity' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Quantity</a></th>
                    </tr>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
                        <td>" . $row['customer_name'] . "</td>
                        <td>" . $row['invoice_id'] . "</td>
                        <td>" . $row['product_name'] . "</td>
                        <td>" . $row['quantity'] . "</td>
                    </tr>";
                }

                echo "</table>";

                //Step 4
                mysqli_close($db);
                ?>
            </td>
        </tr>
    </table>
</main>


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

