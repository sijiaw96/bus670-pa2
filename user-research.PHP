<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<title>GUA DESIGN</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
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
		            <li><a href="./contact.php">Contact</a></li>
		    </ul>
		    
		</div>
	</nav>
    <div class = "services">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bus670";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products where productname='User Research' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        echo "<h3> User Research </h3>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
           echo "<p>". $row["description"]."</p>" ;
            echo "<table><tr><th>Services</th><th>Quote($)</th></tr>";
            echo "<tr><td>" . $row["productname"]. "</td><td>" . $row["price"]. "</td></tr>";
            }
            echo "</table>";
        }
        else {
        echo "0 results";
        }
        $conn->close();
        ?>
        <br>
        <a href = "./contact.php"> Contact us for more information </a>
        <!-- <img class = "rotating-image" src="3.png"> -->

    </div>
    <footer>Copyright @ 2022 GUA DESIGN, All Rights Reserved</footer>
    <script src="http://code.jquery.com/jquery-3.4.1.js"   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>