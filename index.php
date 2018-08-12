
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
<script>
   
    $("#search").click(function(){
	 var page_token='';
	if($('#q').val()==''){
	    alert('Please enter some text in search box');
	}else{	   
	    ajaxRequest($('#q').val(),page_token);
        }
	
	
    });
 </script>
