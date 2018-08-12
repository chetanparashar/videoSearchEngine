<?php

?>
<form method="post" name="search">
    <div class="row">
	<div class="col-md-12">
	    <div class="form-group">
		<label for="video-search">videos</label>
		<input name="q" id="q" class="form-control" required="required" value="" type="text" />              
		<span class="material-input">    </span>
	    </div>
	</div>
    </div>
    <div class="row">
	<div class="col-md-12">
	    <input name="submit"  id='search' value="Search" type='button'>        
	</div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="ajax.js"></script>
<script src="redirect.js"></script>
<script>
    
    $("#search").click(function(){
	var response=ajaxRequest($('#q').val());
	alert(response);
	$.redirect('videoList.php', {'arg1': 'value1', 'arg2': 'value2'});
    });
 </script>

 
<!-- var data = [
	{key: searchkey, result: JSON.stringify(), creatred_at: time_stamp, pageToken:'' },
 ]
 -->