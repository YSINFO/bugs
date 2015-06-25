$(function(){

    getBugComments();

    $("input[name='btn-add-comment']").click(addComment);
});

function getBugComments(){

    $.ajax({
        url: root + 'data-list-bug-comments',
        type: 'get',
        dataType: 'json',
        success: function(result){

            if(result.message.indexOf('not logged')) {
                window.location.replace = root;
                return;
            }

            var table = getBugTable(result);

            if(table!=null){

                $("#bug-comments").html(table);
                $('#bug-table').DataTable();
            }
            else
                $("#table-data").html("No comments added");
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

            var bug = data.comments[i];

            str += '<tr>';
            str += '<td>' + (i+1) + '</td>';
            str += '<td>' + comment.user.name + '</td>';
            str += '<td>' + comment.content + '</td>';

            str += '</tr>';
        }

        str += '</tbody></table>';

        return str;
    }
}

function addComment(){

    $(".message").html("Creating project...");

    var data = $("#form-project").serialize();

    $.ajax({
        url: root + 'save-project',
        data: data,
        type: 'post',
        success: function(result){

            if(result.indexOf('not logged')>-1) {
                window.location.replace(root);
                return;
            }

            if(result.indexOf('duplicate')>-1)
                $(".message").html('Project title is duplicate');
            else if(result.indexOf('done')>-1)
                $(".message").html('Project created successfully');
        }
    })
}