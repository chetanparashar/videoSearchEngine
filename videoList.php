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

foreach ($_REQUEST['data'] as $searchResult) {
    $pageToken=$searchResult['nextPageToken'];
    ?>
<div>
    <div class="row">
	<div class="col-md-1">
	    
	</div>
	<div class="col-md-3">
	    <img src="<?= $searchResult['thumbnails']?>" height="180" width="320">	
	    <a href=<?php echo "http://www.youtube.com/watch?v=".$searchResult['videoId']?> target=_blank>   Watch This Video</a>    
	</div>
	<div class="col-md-8">
	    <h5><?= $searchResult['title']?> <h5>
	<div>
    </div>
</div>
<br>
    
    
<?php }
echo "</div>";

?>
<div id="loader_image" style="display: none;"><img src="loader.gif" alt="" width="24" height="24"> Loading...please wait</div>
<div id="loader_message" style="display: block;"><button class="btn btn-default" type="button">Loading please wait...</button></div>
<div id="loader_message" style="display: block;"><button class="btn btn-default" type="button">No more records.</button></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="ajax.js"></script>
<script>
    $(document).ready(function () {
	 busy = false;
	 $('#back').click(function (){	    
	    $.redirect('index.php');
	 });
        $(window).scroll(function () {
            // make sure u give the container id of the data to be loaded in.
            if ($(window).scrollTop() + $(window).height() > $("#results").height()&& !busy) {
		 busy = true;
//                ajaxRequest(searchTerm,pageToken);

            }
        });
       
    });
</script>