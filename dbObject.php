<?php



//	$sql = "CREATE DATABASE $videosDb";
//	if ($conn->query($sql) === TRUE) {
//	    echo "Database created successfully";
//	} else {
//	    echo "Error creating database: " . $conn->error;
//	}
//
//	$conn->close();

function getVideoList()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "videosDb";
    $conn = mysqli_connect($servername, $username, $password);
    if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM videos";
    $result = $conn->query($sql);
    $data=[];
    if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
	    $data[]=$row;
	}
    }     
    return $data;
}

?>
