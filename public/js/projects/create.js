$(function(){
   $("input[name='btn-create-project']").click(createProject);

    $("input, textarea").keydown(function(){
        $(".message").html("");
    });
});

function createProject(){

    $(".message").html("Creating project...");

    var data = $("#form-project").serialize();

    $.ajax({
        url: root + 'save-project',
        data: data,
        type: 'post',
        success: function(result){
            $(".message").html(result);
        }
    })
}