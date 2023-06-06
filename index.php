<?php
$insert = false;
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database faild due to" .
        mysqli_connect_error());
    }
    // echo "Sucess";
    $name = $_POST['name'];
    $number= $_POST['number'];
    $slot= $_POST['slot'];
    $person= $_POST['person'];

    $sql = "INSERT INTO `book`.`noted` (`name`, `number`, `slot`, `person`, `dt`)
     VALUES ('$name', '$number', '$slot', '$person', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Sucessfully insertd";
        $insert=true; 
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book your Table </Table></title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <img class="bg" src="Cafeteria.jpg" alt="Cafeteria">
    <div class="container">
        <h1>Welcome to Hangout cafe table booking form</h1>
        <p>No more wait to get your desired table </p>
        <?php
        if($insert==true){
        echo "<p class='submitMsg' id='hj'>Your seat booked sucessfully</p>";
        }
        ?>
        <form action="index.php" method="post" class="formback">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="phone" name ="number"  id="number" placeholder="Enter your mobile number">
            <br>
         <h2>Select your preferable slot :</h2>
            <select name="slot" id="ch">
                <option value="">Choose me</option>
                <option value="morning">Morning</option>
                <option value="afternoon">Afternoon</option>
                <option value="evening">Evening</option>
                <option value="night">Night</option>
            </select>

         <h2>Select number of person :</h2>
         <select name="person" id="pr">
            <option value="">Select me</option>
            <option value="one">Table For One</option>
            <option value="two">Table For Two</option>
            <option value="three">Table For Three</option>
            <option value="four">Table for Four</option>
            <option value="five">Table for Five</option>
            <option value="six or more than six">Table for Six or More Than Six...</option>
         </select>
          

        
         <button class ="rst">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>













