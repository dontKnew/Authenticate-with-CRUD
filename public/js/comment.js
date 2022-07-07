function getComment(){
    $.ajax({
        method:'GET',
        url:'/getcomments',
        cache:false,
        success: function(response){
            console.warn(response.data.length);
            for(i=0; i < response.data.length; i++){
                console.warn(response.data[i].comments);
                document.getElementById("commentBody").innerHTML +='\
                <div class="media-block">\
                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>\
                    <div class="media-body">\
                        <div class="mar-btm">\
                        <a href="#" class="btn-link text-semibold media-heading box-inline">Lisa D.</a>\
                        <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 11 min ago</p>\
                        </div>\
                        <p>'+response.data[i].comments+'</p>\
                        <div class="pad-ver">\
                        <div class="btn-group">\
                            <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>\
                            <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>\
                        </div>\
                        <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>\
                        </div>\
                        </div>\
                    </div>\
                    </div>\
                ';
            }
        },
        error: function(err){
-            console.warn('errro '+err);
        }
    });    
}

$(document).ready(function(){
    getComment();
    $("#commentBtn").click(function(){
        let comments = $('#comments').val();        
        if(comments !== '' ){
            $.ajax({
                method:'POST',
                url:'/comment/',
                cache:false,
                data:{"comments":comments},
                success: function(response){
*/                        getComment();
                },
                error: function(err){
                    console.warn('errro '+err);
                }
            });    
        }else {
            alert("Please do not blank");
        }
      });
})

