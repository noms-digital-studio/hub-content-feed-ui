$(document).ready(function() {
    $.ajax({
        url: "https://hub-content-feed.herokuapp.com/hub-content-feed/content-items"
    }).then(function(data) {
        $('.title').append(data.contentItems[0].title);
        $('.uri').append(data.contentItems[0].uri);
        $('.id').append(data.contentItems[0].id);
        $("imageId").attr("src", data.contentItems[0].uri);
    });
});