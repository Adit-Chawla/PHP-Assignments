<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">    <!--HTML Metadata-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pizzas.com</title>
      <meta name="description" content="Webpage which stores and displays user input">
      <meta name="robots" content="noindex, nofollow">
      
      <link rel="stylesheet" href="./styles.css">   <!--Linking the stylesheet-->

      <link rel="preconnect" href="https://fonts.googleapis.com"> <!--Heading Font-->
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">

      <link rel="preconnect" href="https://fonts.googleapis.com">  <!--Links Font-->
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">

    </head>
    
    <body>      <!--Body starts-->
      <header>
        <img src="./images/Logo.jpg" alt="logo">        <!--Logo Image-->

        <h1>Firehouse Pizzas</h1>           <!--Main heading of the page-->

        <nav>       <!--navigation bar-->
          <a href="#">Home</a>
          <a href="view.php">View</a>       <!--View page for entered data-->
        </nav>

      </header>

      
      
      <div class="form-container">      <!--Form Container-->
        <h2>Pizza Order Form</h2>       <!--Form heading-->
        <form action="index.php" method="post">     <!--Form Action-->

          <label for="fname">First Name:</label>    <!--First Name Section-->
          <input type="text" id="fname" name="fname" required>
    
          <label for="lname">Last Name:</label>     <!--Last Name Section-->
          <input type="text" id="lname" name="lname" required>
    
          <label for="phone">Phone Number:</label>      <!--Phone Number Section-->
          <input type="tel" id="phone" name="phone" required>
    
          <label for="email">Email:</label>     <!--Email Section-->
          <input type="email" id="email" name="email" required>
    
          <label for="address_line">Address:</label>    <!--Address Section-->
          <textarea id="address_line" name="address_line" required></textarea>
    
          <label for="pizzaSize">Size:</label>      <!--Size Section-->
        <select id="pizzaSize" name="pizzaSize">

          <option value="Small">Small</option>      <!--'Small' option-->
          <option value="Medium">Medium</option>    <!--'Medium' option-->
          <option value="Large">Large</option>      <!--'Large' option-->
          <option value="Extra Large">Extra Large</option>      <!--'Extra Large option'-->
        </select>

          <label for="toppings">Toppings:</label>       <!--Topping container-->
          <div class="toppings-container">

          <label for="pepperoni">Pepperoni</label>      <!--'pepperoni' option-->
          <input type="checkbox" id="pepperoni" name="toppings[]" value="Pepperoni"> <!--'checkbox1'-->

          <label for="mushrooms">Mushrooms</label>      <!--'mushrooms' option-->
          <input type="checkbox" id="mushrooms" name="toppings[]" value="Mushrooms">  <!--'checkbox2'-->

          <label for="onions">Onions</label>            <!--'Onions' option-->
          <input type="checkbox" id="onions" name="toppings[]" value="Onions">  <!--checkbox3-->

          <label for="sausage">Sausage</label>          <!--'Sausage' option-->
          <input type="checkbox" id="sausage" name="toppings[]" value="Sausage">  <!--checkbox4-->
        </div>

        <label for="specialInstructions">Special Instructions:</label>
        <div class="special-instructions-container">

          <label for="wellDone">Well Done</label>
          <input type="checkbox" id="wellDone" name="specialInstructions[]" value="Well Done">

          <label for="extraSauce">Extra Sauce</label>
          <input type="checkbox" id="extraSauce" name="specialInstructions[]" value="Extra Sauce">
        </div>

          <input type="submit" value="Place Order">
        </form>

        <div class="form-data-submit-message">      <!--PHP section starts-->
        <?php
            if(isset($_POST['fname']) && !empty($_POST['fname'])){
                $fname = $database->sanitize($_POST['fname']);
                $lname = $database->sanitize($_POST['lname']);
                $phone = $database->sanitize($_POST['phone']);
                $email = $database->sanitize($_POST['email']);
                $address_line = $database->sanitize($_POST['address_line']);
                $size = $database->sanitize($_POST['pizzaSize']);

                $toppings = "";         //checkbox1
                foreach($toppings as $toppingValue){
                    $toppingResults .= $toppingValue;
                }

                $special ="";           //checkbox2
                foreach ($special as $specialValue){
                    $specialResult .= $specialValue;
                }

                $res   = $database->create($fname, $lname, $phone,$email,$address_line,$size,$toppings,$special);
                if($res){
                    echo "<p>Order Placed Successfully</p>";            //if the order was placed
                }
                if(!$res){
                    echo "<p>Sorry! Couldn't place the order.</p>";     //if the order couldn't be placed
                }
            }
          ?>

          </div>

      </div>
    </body>
  </html>
<!--End of Code-->