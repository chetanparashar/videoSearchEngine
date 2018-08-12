
function ajaxRequest(q) {
    var responseData=[];
    $.ajax({
        method: 'GET',
        //	url: "videoList.php",
        url: "https://www.googleapis.com/youtube/v3/search",
        //	data:{videoName:$('#video-name').val()},
        data: {part: 'snippet', q: q, type: 'video', maxResults: 2, key: 'AIzaSyBAEQj2O24zCS_JeS2cdjkk2FUasNcaGgM'},
        dataType: 'jsonp',
        success: function (result) {
            responseData['searchTerm']=q;            
            responseData['nextPageToken'] = result.nextPageToken;
            $.each(result.items, function (key, val) {
                responseData['videoId']=val.id.videoId;
                responseData['title']=val.snippet.title;
                responseData['thumbnails']=val.snippet.thumbnails.medium.url;
            });
        }});
     console.log(responseData);
//     localStorage.setItem("key", "value");
//     localStorage.getItem("key");
//     localStorage.removeItem("key");
    return responseData;
}

