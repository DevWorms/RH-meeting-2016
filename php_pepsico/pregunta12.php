<?php

// Create connection
$con=mysqli_connect("localhost","adria_adminpepsi","Prefiero_coca_2016!","adrian_pepsidb");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 mysqli_query($con, 'SET NAMES utf8');
// This SQL statement selects ALL from the program ''
$sql = "SELECT * FROM preguntas WHERE ip = '12' ORDER BY id";

// Check if there are results
if ($result = mysqli_query($con, $sql))
{
        // If so, then create a results array and a temporary one
        // to hold the data
        $resultArray = array();
        $tempArray = array();

        // Loop through each row in the result set
        while($row = $result->fetch_object())
        {
                // Add each row into our results array
                $tempArray = $row;
            array_push($resultArray, $tempArray);
        }

        // Finally, encode the array to JSON and output the results
        echo json_encode($resultArray);
}

// Close connections
mysqli_close($con);
?>
