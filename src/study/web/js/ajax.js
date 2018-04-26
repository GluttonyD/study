
var cuurent_note_id;
var last_comment_id=0;

$(document).on("click", ".post_mark", function (e) {
    e.preventDefault();
    var tmp = $(this);
    var id = $(tmp).data('id');
    var mark = $(tmp).data('mark');
    var type = $(tmp).data('type');
    var rate_div='#comment_rate'+id;
    $.ajax({
        url: '/blog/like', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {object_id: id, object_type: type, mark: mark}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        // contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            if(type==1) {
                $("#rate").html(data['rate']);
            }
            if(type==0) {
                $(rate_div).html(data['rate']);
            }
        }
    });
});


$(document).ready(function () {
    $(document).on("submit", "form.comment", function (e) {
        e.preventDefault();
        var form = $(e.target);
        // var data=new FormData(form);
        var url = '/blog/add-comment?id=' + $(form).attr('data-post_id');
        $.ajax({
            url: url, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            success: function (data)   // A function to be called if request succeeds
            {
                addComments();
                document.getElementById("comment-input").value = "";
            }
        });
    });
});

function updateComments() {
    var id=$('#post').data('post_id');
    cuurent_note_id=id;
    $.ajax({
        url: '/blog/update', // Url to which the request is send
        type: "GET",
        data:{note_id:id},
        dataType: 'json',// Type of request to be send, called as method
        cache: false,             // To unable request pages to be cached
        success: function (data)   // A function to be called if request succeeds
        {
            var comments="";
            for(var i=0;i<data.length;i++){
                var div_id='comment_rate'+data[i]['id'];
                // console.log(div_id);
                comments=comments+'<p><span>'+'От пользователя'+'<b>'+data[i]['author']+'</b></span><span>'+data[i]['text']+'</span></p><a id="like_comment" data-id="'+data[i]['id']+'" data-type="0" data-mark="1" class="post_mark glyphicon glyphicon-plus" href=""></a><div id="'+div_id+'">'+data[i]['rate']+'</div><a id="dislike_comment" data-id="'+data[i]['id']+'" data-type="0" data-mark="0" class="post_mark glyphicon glyphicon-minus" href=""></a>';
                $('#comment-block').html(comments);
            }
            last_comment_id=data[data.length-1]['id'];

        }
    });
}

function addComments() {
    cuurent_note_id=$('#post').data('post_id');
    $.ajax({
        url: '/blog/get-new-comments', // Url to which the request is send
        type: "GET",
        data:{note_id:cuurent_note_id,comment_id:last_comment_id},
        dataType: 'json',// Type of request to be send, called as method
        cache: false,             // To unable request pages to be cached
        success: function (data)   // A function to be called if request succeeds
        {
            var comments="";
            for(var i=0;i<data.length;i++){
                var div_id='comment_rate'+data[i]['id'];
                comments=comments+'<p><span>'+'От пользователя : '+'<b>'+data[i]['author_id']+' : '+'</b></span><span>'+data[i]['text']+'</span></p><a id="like_comment" data-id="'+data[i]['id']+'" data-type="0" data-mark="1" class="post_mark glyphicon glyphicon-plus" href=""></a><div id="'+div_id+'">'+data[i]['rate']+'</div><a id="dislike_comment" data-id="'+data[i]['id']+'" data-type="0" data-mark="0" class="post_mark glyphicon glyphicon-minus" href=""></a>';
                $('#comment-block').append(comments);
            }
        }
    });
}

function updateRating() {
    cuurent_note_id=$('#post').data('post_id');
    $.ajax({
        url: '/blog/update-rating', // Url to which the request is send
        type: "GET",
        data:{note_id:cuurent_note_id},
        dataType: 'json',// Type of request to be send, called as method
        cache: false,             // To unable request pages to be cached
        success: function (data)   // A function to be called if request succeeds
        {
            for(var i=0;i<data.length;i++){
                var id='#comment_rate'+data[i]['id'];
                $(id).html(data[i]['rate']);
            }
            // console.log(data);
        }
    });
}

function updatePosts() {
    $.ajax({

    });
}

$(document).ready(function () {
    if($('#post').data('post_id')) {
        updateComments();
        setInterval(addComments, 1000*3);
        setInterval(updateRating,1000);
    }
});