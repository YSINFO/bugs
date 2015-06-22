$(function(){
    $("input[name='btn-create-user']").click(createUser);

    $("input, textarea").keydown(function(){
        $(".message").html("");
    });
});

function createUser(){

    $(".message").html("Create user...");

    var data = $("#create-user").serialize();

    $.ajax({
        url: root + 'save-user',
        data: data,
        type: 'post',
        success: function(result){
            $(".message").html(result);
        }
    })
}