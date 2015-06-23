$(function(){

    $(".add-file").click(addFile);

    $("input[name='btn-create-bug']").click(createBug);

    $("input, textarea").keydown(function(){
        $(".message").html("");
    });
});

function createBug(){

    $(".message").html("Creating bug...");

    $("#ifr").load(function(){

        var result = $(this).contents().find('body').html();

        $(".message").html(result);
    });

    return true;
}

function addFile(){

    var file = "<div class='single-file'>";
    file += "<input type='file' name='file[]'/>";
    file += "<img class='remove-file' src='" + root + "public/images/remove.png'/>";
    file += "</div>";

    $(".file-container").append(file);

    $(".remove-file").unbind('click');
    $(".remove-file").click(removeFile);
}

function removeFile(){
    $(this).parent().remove();
}
