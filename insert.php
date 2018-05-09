<?php
require("login.php");
$link = mysqli_connect("localhost", $username, $password, $database);
//retrieves the login info from login.php and logs into the database ^
//if it fails it will kill the php file
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//retrieves the GET request info
$name = mysqli_real_escape_string($link, $_GET['name']);
$address = mysqli_real_escape_string($link, $_GET['address']);
$lat= mysqli_real_escape_string($link, $_GET['lat']);
$lng= mysqli_real_escape_string($link, $_GET['lng']);
$type= mysqli_real_escape_string($link, $_GET['type']);

//enters the info into the database via an sql insert command
$sql = "INSERT INTO restaurants (name, address, lat, lng, type, liked, disliked) VALUES ('$name', '$address', '$lat', '$lng', '$type', 0, 0)";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
}
//closes the connection
mysqli_close($link);
?>
