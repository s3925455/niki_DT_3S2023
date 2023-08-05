<?php
// Start the session or the variables from login page will not work
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<style>
.error {color: #FF0000;}
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
    <title>Astral Online Business Shop</title>
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
  
            <!-- <li><a href="shop.php">Shop</a></li>           -->
            
            <!-- <li><a href="items.php">Items</a></li> -->
            <!-- <li><a href="login.php">Login</a></li>    -->
            
            
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
           <li><a href="update.php">Account Update</a></li>
           <li><a href="logout.php">log out</a></li>
            
          </ul>
        </nav>

 
  <main>
         <!--This is the main section of the web page where most of the information is provided-->
        <table class="table">
          <tr>
            <th></th>
            <th><h2>Astral Shop</h2><hr></th>
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
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            
            <td>
         

          <form method="post" action="">


          <table style="text-align: left;">
            <tr>
              <td>Name:</td>
              <td><input type="text" name="user_name" value= "<?= $_SESSION['user_name'] ?>" readonly disabled></td>
            </tr>

            <tr>
              <td>Email :</td>
              <td><input type="email" name="user_email" value= "<?= $_SESSION['user_email'] ?>" readonly disabled> </td>
            </tr>
            
            <tr>
              <td>Address:</td>
              <td><input type="text" name="user_address" value= "<?= $_SESSION['user_address'] ?>" readonly disabled></td>
            </tr>           
            <td></td>
          </table>
          <br></br><br></br><br></br>
            <tr>
                <td><img src="image/hoodie3.jpg" alt="image of hoodie3"/></td></td>
         
            <td><img src="image/hoodie5.jpg" alt="image of hoodie5"/></td>
   
                <td><img src="image/hoodie8.jpg" alt="image of hoodie8"/></td></td>
            </td>
                <!-- </select> -->
            <!-- </td>  -->
    

            <tr>
            <td>
            <lable for="quanity">Select Quantity:</lable>
                <select id="quanity1" name="quanity1">
                <option value="" disabled selected>select option</option>
                  <option value="1">1 - $30</option>
                  <option value="2">2 - $60</option>
                  <option value="3">3 - $90</option>
                  <option value="4">4 - $120</option>
                </select>

            </td>  
            <td>
              <lable for="quanity">Select Quantity:</lable>
                <select id="quanity2" name="quanity2">
                <option value="" disabled selected>select option</option>
                  <option value="1">1 - $40</option>
                  <option value="2">2 - $80</option>
                  <option value="3">3 - $120</option>
                </select>
              </td>
              <td>
              <lable for="quanity">Select Quantity:</lable>
                <select id="quanity3" name="quanity3">
                <option value="" disabled selected>select option</option>
                  <option value="1">1 - $100</option>
                  <option value="2">2 - $200</option>

                </select>
            </td>
           </tr>
            <tr>
            <td>
            <br></br><br></br><br></br>
            <tr>
                <td><img src="image/hoodie6.jpg" alt="image of hoodie6"/></td></td>
        
            <td><img src="image/hoodie7.jpg" alt="image of hoodie7"/></td>
                <td><img src="image/hoodie9.jpg" alt="image of hoodie9"/></td></td>
            </td>
            
  
            
            
                </select>
        


              </td> 
    

            <tr>
            <td>
            <lable for="quanity">Select Quantity:</lable>
                <select id="quanity4" name="quanity4">
                <option value="" disabled selected>select option</option>
                  <option value="1">1 - $50</option>
                  <option value="2">2 - $100</option>
                  <option value="3">3 - $150</option>

                </select>

            </td>  
            <td>
              <lable for="quanity">Select Quantity:</lable>
                <select id="quanity5" name="quanity5">
                <option value="" disabled selected>select option</option>
                  <option value="1">1 - $150</option>
                  <option value="2">2 - $300</option>

                </select>
              </td>
              <td>
              <lable for="quanity">Select Quantity:</lable>
                <select id="quanity6" name="quanity6">
                <option value="" disabled selected>select option</option>
                <option value="1">1 - $40</option>
                  <option value="2">2 - $80</option>
                  <option value="3">3 - $120</option>
                </select>
            </td>

            <td></td>
            </tr>

            <tr>
            <td></td>
            <td> <input type="submit" name="submit" value="Submit"> </td>
            <td></td>
          </form>
          </tr>

          <tr>
            <td></td>
            <td>            
              <span class="error"><?php echo $$unitErr;?></span><br>
              <span class="error"><?php echo $teacherErr ;?></span><br>
              <span class="error"><?php echo $locationErr ;?></span> <br>
              <span class="error"><?php echo $sportErr ;?></span> </td>
            <td></td>
          </tr>
        </table>
 
  </main>

    <?php
        // session_start(); // Start the session

        // Connect to the database
        $servername = "localhost";
        $username = "admin";
        $password = "secret";
        $dbname = "narc";
        $user_id = $_SESSION['user_id'];
        $user_unit1 = $_POST['user_unit1'];
        $user_unit2 = $_POST['user_unit2'];
        $user_unit3 = $_POST['user_unit3'];
        $user_unit4 = $_POST['user_unit4'];
        $user_unit5 = $_POST['user_unit5'];
        $user_teacher1 = $_POST['user_teacher1'];
        $user_teacher2 = $_POST['user_teacher2'];
        $user_teacher3 = $_POST['user_teacher3'];
        $user_teacher4 = $_POST['user_teacher4'];
        $user_teacher5 = $_POST['user_teacher5'];
        $user_location1 = $_POST['user_location1'];
        $user_location2 = $_POST['user_location2'];
        $user_location3 = $_POST['user_location3'];
        $user_location4 = $_POST['user_location4'];
        $user_location5 = $_POST['user_location5'];
        $user_sport = $_POST['user_sport'];
        $result="";


// Make connection to DB
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        //Case3- SQL query to update the student record with enrolments
        $stmt = $conn->prepare("UPDATE student_enrol SET 
          user_unit1 = ?, user_unit2 = ?, user_unit3 = ?, user_unit4 = ?, user_unit5 = ?, 
          user_teacher1 = ?, user_teacher2 = ?, user_teacher3 = ?, user_teacher4 = ?, user_teacher5 = ?,
          user_location1 = ?, user_location2 = ?, user_location3 = ?, user_location4 = ?, user_location5 = ?,
          user_sport = ? WHERE user_id = ?");

        $stmt->bind_param("ssssssssssssssssi", 
          $user_unit1, $user_unit2, $user_unit3, $user_unit4, $user_unit5,
          $user_teacher1, $user_teacher2, $user_teacher3, $user_teacher4, $user_teacher5,
          $user_location1, $user_location2, $user_location3, $user_location4, $user_location5, 
          $user_sport, $user_id);
        $stmt->execute();
        $result = $stmt->execute();

        if ($result === false) {
          echo "Error updating data: " . $stmt->error;
        } else {
          echo "Data updated successfully";
        }


        // echo "--EXECUTED--";

        // Close the statement and connection
        $stmt->close();
        $conn->close();
        ?>


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
