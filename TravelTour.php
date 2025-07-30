<?php
    $insert = false;
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "tour";

    $con = mysqli_connect($server, $username, $password, "tour");

    if(!$con){
        die("connection failed due to " .mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `tour`.`tour` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

    if($con -> query($sql) == true)
    {
        // echo "succesful inserted";
        $insert = true;
    }

    else
    {
        echo "ERROR: $sql <br>" . $con->error;
    }

    $con -> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelForm</title>
    <link rel="stylesheet" href="TravelForm.css">
</head>
<body>
    <img class= "TravelTour" src="TravelTour Image.jpg" alt ="Travel">
    <div class ="container">
        <h1> Trip Registration Form </h1>
        <?php
        if($insert == true){
        echo "<p class = 'SubmitMsg'>Thanku for Applying Form </p>";
        }

        ?>
        <form action = 'TravelTour.php' method = "post">

            <input type = "text" name = "name" id ="name" placeholder = "Enter your name">
            <input type = "text" name = "age" id ="age" placeholder = "Enter your age">  
            <input type = "text" name = "gender" id ="gender" placeholder = "Enter your gender"> 
            <input type = "email" name = "email" id ="email" placeholder = "Enter your email"> 
            <input type = "phone" name = "phone" id ="phone" placeholder = "Enter your phone"> 
            <textarea name ="other" id= "other" cols ="30" rows ="10" placeholder="Enter your Description"></textarea>
            <button class = "btn">Submit</button>
            

        </form>
    </div>
    

</body>
</html>
