<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<title>GUA DESIGN</title>
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
  <style>
  .error {color: #FF0000;}
  </style>
  <link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php
    
    // define variables and set to empty values
    $nameErr = $emailErr = $serviceErr = $websiteErr = $commentErr="";
    $name = $email = $service = $comment = $website = $company= "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      if (empty($_POST["service"])) {
        $serviceErr = "Please select a service.";
      } else {
        $service = test_input($_POST["service"]);
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    include "insert.php";

  ?>
	<nav class="navbar navbar-default">
		<div class="container">
		    <div class="navbar-header">
				<a href="./index.html" class="navbar-brand">GUA DESIGN</a>
		    </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="w3-dropdown-hover">
                    <button class="w3-button w3-white ">
                      <li class = "w3-left"> Services </li>
                      <li class = "w3-right"> <img src="dropdown.png"> </li>
                    </button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="./product-strategy.php" class="w3-bar-item w3-button"> Product Strategy</a>
                    <a href="./visual-design.php" class="w3-bar-item w3-button">UI/Visual Design</a>
                    <a href="./user-research.php" class="w3-bar-item w3-button">User Research</a>
                    <a href="./allservices.php" class="w3-bar-item w3-button">All Services</a>

                    </div>   
                  </li>
                <li><a href="#">Contact</a></li>
        </ul>
		</div>
	</nav>
    <div class = "services">
        <h3 class = "service-title"> Let's Get In Touch! </h3>
        <p class = "service-content"> Feel free to contact us for more information!</p>
        <div class = "contact-info">
            <p class = "info-detail"> Tel: 1-800-000-000</p>
            <p class = "info-detail"> Email: info@guadesign.com</p>
            <p class = "info-detail"> Address: 500 Forbes Ave, City, State, ST 10000</p>
        </div>
        <div class="form-container">
          <p><span class="error">* required field</span></p>
          <form action="contact.php" method="post">  
            Name: <input type="text" name="name" id="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
            E-mail: <input type="text" name="email" id="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
            Your Company: <input type="text" name="company" id="company" value="<?php echo $company;?>">
            <br><br>
            Your Message: <textarea name="comment" id="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
            <br><br>
            Select the service you would like to get information:
            <br>
            <input type="radio" name="service" id="service"<?php if (isset($service) && $service=="Product Strategy") echo "checked";?> value="Product Strategy">Product Strategy<br>
            <input type="radio" name="service" id="service"<?php if (isset($service) && $service=="UI/Visual Design") echo "checked";?> value="UI/Visual Design">UI/Visual Design<br>
            <input type="radio" name="service" id="service"<?php if (isset($service) && $service=="User Research") echo "checked";?> value="User Research ">User Research <br>
            <span class="error">* <?php echo $serviceErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit" >  
          </form>
        </div>
    </div>


    <footer>Copyright @ 2022 GUA DESIGN, All Rights Reserved</footer>

    
    <script src="http://code.jquery.com/jquery-3.4.1.js"   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>

