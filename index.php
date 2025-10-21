<?php
$submitted=False;
if(isset($_POST["name"])){
    $server="localhost";
    $username="root";
    $password="";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $con = new mysqli($server, $username,$password); 
        echo "Connected!";
    } catch (mysqli_sql_exception $e) {
        die("Connection failed: " . $e->getMessage());
    }

    $name=$_POST["name"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $desc=$_POST["desc"];

    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Desc`, `Date`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    if ($con->query($sql) === TRUE) {
        $submitted=True;
    } else {
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@200..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sriracha&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to IIT Guwahati Japan Trip Form</h1>
        <p>Enter your details and submit this form to
            confirm your participation in the trip</p>
        <?php
        if($submitted){
          echo "<p class='submit_msg'>
             Thanks for submitting your form. We are eagerly waiting for your presence there.
          </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone nmuber">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>

        </form>
        <p id="hero"></p>
    </div>





    <script src="index.js"></script>
</body>

</html>