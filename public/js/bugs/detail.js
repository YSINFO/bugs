$(function(){

    getBugComments();

    $(".add-file").click(addFile);

    $("#ifr").load(function(){
        getBugComments();
    });
});

function checkComment(){

    var comment = $("textarea[name='comment']").val();

    return comment.length>0;
}

function getBugComments(){

    $.ajax({
        url: root + 'data-list-bug-comments',
        type: 'get',
        dataType: 'json',
        success: function(result){

            if(result.message.indexOf('not logged')>-1) {
                window.location.replace = root;
                return;
            }

            var table = getBugTable(result);

            if(table!=null){

                $("#bug-comments").html(table);
            }
            else
                $("#bug-comments").html("No comments added");
        }
    });
}

function getBugTable(data){

    if(data==undefined || data.found==undefined || data.found==false || data.comments==undefined)
        return null;
    else{

        var str = '<table id="bug-table" class="display" cellspacing="0" width="100%">';

        str += '<thead>';

        str += '<tr>';
        str += '<td>S.No.</td>';
        str += '<td>By</td>';
        str += '<td>Content</td>';
        str += '</tr>';

        str += '</thead><tbody>';

        for(var i=0; i<data.comments.length;i++){

            var comment = data.comments[i];

            str += '<tr>';
            str += '<td>' + (i+1) + '</td>';
            str += '<td>' + comment.user.name + '</td>';
            str += '<td>' + comment.comment + '</td>';

            str += '</tr>';
        }

        str += '</tbody></table>';

        return str;
    }
}

function addFile(){

    var file = "<div class='single-file'>";
    file += "<input type='file' name='file[]'/>";
    file += "<img class='remove-file icon' src='" + root + "public/images/remove.png'/>";
    file += "</div>";

    $(".file-container").append(file);

    $(".remove-file").unbind('click');
    $(".remove-file").click(removeFile);
}

function removeFile(){
    $(this).parent().remove();
}
