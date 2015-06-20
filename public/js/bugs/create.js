$(function(){
    $("input[name='btn-create-bug']").click(createBug);

    $("input, textarea").keydown(function(){
        $(".message").html("");
    });
});

function createBug(){

    $(".message").html("Creating bug...");

    var data = $("#form-bug").serialize();

    $.ajax({
        url: root + 'save-bug',
        data: data,
        type: 'post',
        success: function(result){
            $(".message").html(result);
        }
    })
}