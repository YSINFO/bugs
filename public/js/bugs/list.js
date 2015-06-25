$(function(){

    getBugs();
});

function getBugs(){

    $.ajax({
        url: root + 'data-list-bugs',
        type: 'get',
        dataType: 'json',
        success: function(result){

            if(result.message.indexOf('not logged')>-1) {
                //window.location.replace(root);
                //return;
            }

            var table = getBugTable(result);

            if(table!=null){

                $("#table-data").html(table);
                $('#bug-table').DataTable();
            }
            else
                $("#table-data").html("No bugs found");
        }
    });
}

function getBugTable(data){

    if(data==undefined || data.found==undefined || data.found==false || data.bugs==undefined)
        return null;
    else{

        var str = '<table id="bug-table" class="display" cellspacing="0" width="100%">';

        str += '<thead>';

        str += '<tr>';
        str += '<td>S.No.</td>';
        str += '<td>Name</td>';
        str += '<td>Description</td>';
        str += '<td>Severity</td>';
        str += '<td>Action</td>';
        str += '</tr>';

        str += '</thead><tbody>';

        for(var i=0; i<data.bugs.length;i++){

            var bug = data.bugs[i];

            str += '<tr>';
            str += '<td>' + (i+1) + '</td>';
            str += '<td>' + bug.title + '</td>';
            str += '<td>' + bug.description + '</td>';
            str += '<td class="' + bug.severity.toLowerCase() + '">' + bug.severity + '</td>';

            str += '<td>';
            str += '<a href="' + root + 'bug-detail/' + bug.id + '" title="View detail"><img class="icon" src="' + root + 'public/images/view-comments.png"/></a>';
            str += '&nbsp;&nbsp;&nbsp;';
            str += '&nbsp;&nbsp;&nbsp;';
            str += '<a href="' + root + 'list-bugs/' + bug.id + '" title="Change status"><img class="icon" src="' + root + 'public/images/change-status.jpg"/></a>';
            str += '</td>';

            str += '</tr>';
        }

        str += '</tbody></table>';

        return str;
    }
}