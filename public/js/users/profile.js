$(function(){
    $("input[name='btn-update-profile']").click(updatingProfile);

    $("input, textarea").keydown(function(){
        $(".message").html("");
    });
});

function updatingProfile(){

    $(".message").html("Updating profile...");

    var data = $("#user-profile").serialize();

    $.ajax({
        url: root + 'update-profile',
        data: data,
        type: 'post',
        success: function(result){
            $(".message").html(result);
        }
    })
}