<?php
require("login.php");
$link = mysqli_connect("localhost", $username, $password, $database);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//gets the information
$id = mysqli_real_escape_string($link, $_GET['id']);
$like = mysqli_real_escape_string($link, $_GET['like']);
$dislike = mysqli_real_escape_string($link, $_GET['dislike']);


$sql = "SELECT * FROM restaurants where id ='$id'";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $currentlike = $row['liked'];
    $currentdislike = $row['disliked'];

    //adds the current likes with either the new like or dislike
    $updatedlike = $like + $currentlike;
    $updateddislike = $dislike + $currentdislike;

    //uses only one sql and just adjusts the like/dislike based on what the user picked
    $sql2 = "UPDATE restaurants SET liked = '$updatedlike', disliked = '$updateddislike' WHERE id = '$id'";
    $run = mysqli_query($link, $sql2);
  }else {
    echo "No records found";
  }
}else {
  echo "error";
}


mysqli_close($link);
?>
