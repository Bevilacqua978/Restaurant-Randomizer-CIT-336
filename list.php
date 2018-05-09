<!DOCTYPE html>
<html lang="en">
  <head>
    <title>What should I Eat?</title>
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="icon" type="image/gif" href="./CSS/IMG/Food.png">

    <!--I found this neat datatable JQUERY plug-in this is whats required-->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  </head>
  <body class="bg2">
    <!-- Navigation Bar -->
    <br />
      <div>
        <a href="./index.html"><img id="headerpic" src="./CSS/IMG/restaurant-icon.png"></a>
        <button class="button" onclick="window.location.href='index.html'">Home</button>
        <button class="button" onclick="window.location.href='add.html'">Add</button>
        <button class="button" onclick="window.location.href='list.php'">List</button>
        <button class="button" onclick="window.location.href='random.html'">Randomize</button>
      </div>
      <br />
    <!-- Navigation Bar -->

    <!--Converts my table to a datatable-->
    <script>
      $(document).ready(function() {
        $('#list').DataTable();
      } );
    </script>
    <style>
      <?php include './CSS/style.css';?>
    </style>
    <div class="listdiv">
      <?php
        require("login.php");
    	$link = mysqli_connect("localhost", $username, $password, $database);
    	if($link === false){
    	    die("ERROR: Could not connect. " . mysqli_connect_error());
    	}
      //selects everything from the database
    	$sql = "SELECT * FROM restaurants";
    	if($result = mysqli_query($link, $sql)){
    	    if(mysqli_num_rows($result) > 0){
            //starts to write out the table via echo commands
    	        echo '<table id="list" class="display" style="width:100%">';
              //^ the ID that will be used by the datatable plug-in
              echo "<thead>";
    	            echo "<tr>";
    	                echo "<th>ID</th>";
    	                echo "<th>Name</th>";
    	                echo "<th>Address</th>";
                      echo "<th>Like</th>";
                      echo "<th>Dislike</th>";
                      echo "<th>Type</th>";
    	            echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                //populates the datatable
    	        while($row = mysqli_fetch_array($result)){
    	            echo "<tr>";
    	                echo "<td>" . $row['id'] . "</td>";
    	                echo "<td>" . $row['name'] . "</td>";
    	                echo "<td>" . $row['address'] . "</td>";
                      echo "<td>" . $row['liked'] . "</td>";
                      echo "<td>" . $row['disliked'] . "</td>";
                      echo "<td>" . $row['type'] . "</td>";
    	            echo "</tr>";
    	        }
              echo "</tbody>";
              echo "<tfoot>";
                  echo "<tr>";
                      echo "<th>ID</th>";
                      echo "<th>Name</th>";
                      echo "<th>Address</th>";
                      echo "<th>Like</th>";
                      echo "<th>Dislike</th>";
                      echo "<th>Type</th>";
                  echo "</tr>";
              echo  "</tfoot>";
    	        echo "</table>";
    	        mysqli_free_result($result);
    	    } else{
    	        echo "No records matching your query were found.";
    	    }
    	} else{
    	    echo "Error" . mysqli_error($link);
    	}
      //closes the connection
    	mysqli_close($link);
    	?>
    </div>
  </body>
</html>
