
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style.css">

<title>test</title>


</head>
<body>

 <?php

$conn = new mysqli("localhost", "root", "", "bus670");
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

  if(isset($_POST['submit'])&& $nameErr == "" && $emailErr=="" && $serviceErr =="")

{   $name =  $_REQUEST['name'];
    $company = $_REQUEST['company'];
    $comment =  $_REQUEST['comment'];
    $service = $_REQUEST['service'];
    $email = $_REQUEST['email'];
     
    // // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO userinput  VALUES ('$name',
        '$email','$company','$comment','$service')";

    function function_alert($message) {
    // Display the alert box 
        echo "<script>alert('$message');</script>";
    }

    // Function call
    if(mysqli_query($conn, $sql)){
        
        function_alert("Thank you for contacting us! We will get back to you soon.");
        $name = $email = $service = $comment = $website = $company= "";
    }
     else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
     

  
    // Close connection
    mysqli_close($conn);
}
?>

</body>
</html>