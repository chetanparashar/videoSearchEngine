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
//    if($flag<=12){
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
//       }
    $flag++;
    
    }
echo "</div>";

?>
<div id="loader_image" style="display: none;"><img src="loader.gif" alt="" width="24" height="24"> Loading...please wait</div>
<div id="loader_message" style="display: block;"><button class="btn btn-default" type="button">Loading please wait...</button></div>
<div id="loader_message" style="display: block;"><button class="btn btn-default" type="button">No more records.</button></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="ajax.js"></script>
<script>
     var page_token='';
    $(document).ready(function () {
	 var busy = false;
	 
	 var searchTerm='<?= $searchTerm ?>';	 
//	    busy=false;
	 $('#back').click(function (){	    
	    $.redirect('index.php');
	 });
	
	 $(window).on("scroll", function() {
	      busy=localStorage.getItem('busy');
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
		 busy=localStorage.getItem('busy');
		 page_token=localStorage.getItem('pageToken');
                 loadMore(searchTerm,page_token);
		 
            }
        });
	function loadMore(searchTerm,page_token){ 	    
	    page_token=callServer(searchTerm,page_token, true);	   
	};
       
    });
</script>