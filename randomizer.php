<?php
require("login.php");
//required to make the marker page/.xml file
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

#Connection
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}

$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}
#Random Number generator based on entries
$count = "SELECT * FROM restaurants";
if($result = mysqli_query($connection, $count)){
  if(mysqli_num_rows($result) > 0){
    //this is where it gets the random resturant it basically uses a random function and uses the amount of rows as the limit
    $number = rand(1, mysqli_num_rows($result));
  }else {
    echo "No records found";
  }
}else {
  echo "error";
}

#Selects the random restaurant and generates a marker on the map.
#it uses that previously picked random number
$sql = "SELECT * FROM restaurants WHERE id = '$number'";
$result = mysqli_query($connection, $sql);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// it populates the xml file
while ($row = @mysqli_fetch_assoc($result)){
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'name="' . $row['name'] . '" ';
  echo 'address="' . $row['address'] . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo 'like="' . $row['liked'] . '" ';
  echo 'dislike="' . $row['disliked'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}
// End XML file
echo '</markers>';

?>
