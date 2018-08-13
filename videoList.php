<?php
$searchTerm=$_REQUEST['searchTerm'];
echo "Search Term   :    ".$searchTerm;
echo "<br>";

//echo  $_REQUEST['pagetoken'];
echo " <div class='row'>
	<div class='col-md-12'>
	    <input name='submit'  id='back' value='back to pervious page' type='button'>        
	</div>
    </div>";
echo "<br><br>";
echo "<div id='results'>";
$pageToken='';
$flag=1;

foreach ($_REQUEST['data'] as $searchResult) {
    ?>
<div>
    
	<div class="col-md-1">
	    
	</div>
	<div class="col-md-3">
	    <img src="<?= $searchResult['thumbnails']?>" height="180" width="320">	
	    <a href=<?php echo "http://www.youtube.com/watch?v=".$searchResult['videoId']?> target=_blank>   Watch This Video</a>    
	</div>
	<div class="col-md-8">
	    <h5><?= $searchResult['title']?> <h5>
	</div>
    
</div>
<br>
    
    
<?php
    
    }
echo "</div>";

?>

<div id="loader_message" style="display: block;"><button class="btn btn-default" type="button">click for more data...</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="ajax.js"></script>
<script>
     var page_token='';
    $(document).ready(function () {
	 var height = 0;
	 
	 var searchTerm='<?= $searchTerm ?>';	 
//	    busy=false;
	 $('#back').click(function (){	    
	    $.redirect('index.php');
	 });
	 $(window).on("scroll", function() {
	     height=window.innerHeight + window.scrollY;
	     if (height>= document.body.offsetHeight) {
		 page_token=localStorage.getItem('pageToken');
		 callServer(searchTerm,page_token, true);
	    }
	 });
         
    });
</script>