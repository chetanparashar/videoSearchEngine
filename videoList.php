<?php
$data = $_REQUEST;
echo "Search Term   :    ".$data['searchTerm'];
echo "<br><br>";
foreach ($data['data'] as $searchResult) {
    ?>
<div>
    <div class="row">
	<div class="col-md-1">
	    
	</div>
	<div class="col-md-3">
	    <img src="<?= $searchResult['thumbnails']?>" height="180" width="320">	
	    <a href=http://www.youtube.com/watch?v=".$searchResult['id']['videoId']." target=_blank>   Watch This Video</a>    
	</div>
	<div class="col-md-8">
	    <h5><?= $searchResult['title']?> <h5>
	<div>
    </div>
</div>
<br>
    
    
<?php }

echo $videos;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="ajax.js"></script>
<script>
    $(document).ready(function () {
        function displayRecords(lim, off) {
            $.ajax({
                type: "GET",
                async: false,
                url: "getrecords.php",
                data: "limit=" + lim + "&offset=" + off,
                cache: false,
                beforeSend: function () {
                    $("#loader_message").html("").hide();
                    $('#loader_image').show();
                },
                success: function (html) {
                    $("#results").append(html);
                    $('#loader_image').hide();
                    if (html == "") {
                        $("#loader_message").html('<button data-atr="nodata" class="btn btn-default" type="button">No more records.</button>').show()
                    } else {
                        $("#loader_message").html('<button class="btn btn-default" type="button">Loading please wait...</button>').show();
                    }
                    window.busy = false;

                }
            });
        }

        $(window).scroll(function () {
            // make sure u give the container id of the data to be loaded in.
            if ($(window).scrollTop() + $(window).height() > $("#results").height() && !busy) {
                busy = true;
                offset = limit + offset;

                displayRecords(limit, offset);

            }
        });

    });
</script>