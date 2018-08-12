<?php
    print_r($_REQUEST);
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "videos";
    $conn = mysqli_connect($servername, $username, $password,$db);
    if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM videos where ";
    $result = $conn->query($sql);
    if ($result->num_rows<= 0) {
	
    }

?>
<script>
    console.log('<?= $_REQUEST?>');
    </script>