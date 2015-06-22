$(function(){

    getBugComments();
});

function getBugComments(){

    $.ajax({
        url: root + 'data-list-bug-comments',
        type: 'get',
        dataType: 'json',
        success: function(data){

            var table = getBugTable(data);

            if(table!=null){

                $("#table-data").html(table);
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