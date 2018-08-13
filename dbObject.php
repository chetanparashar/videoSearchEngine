<?php

    include('dbCredentials.php');
    $db = "videos";
    $conn = mysqli_connect($servername, $username, $password,$db);
    if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
    }
     $search_term=$_REQUEST['search_term'];
    $pageToken=$_REQUEST['pagetoken'];
    $date=date('Y-m-d h:i:s');
    $sql = "SELECT * FROM search_video_log where page_token='$pageToken' and  search_term='$search_term'";
    $result = $conn->query($sql); 
    if ($result->num_rows<=0) {
	$sql='';
	foreach($_REQUEST['result'] as $val){
	     $sql=" insert into search_video_log values('','".$val['videoId']."','".$pageToken."','".$search_term."','".$val['title']."','".$val['thumbnails']."','".$date."'); ";
	     $conn->query($sql);	     
	}
	return true;
    }else{
	return false;
    }

?>
