$(function(){

    getProjects();
});

function getProjects(){

    $.ajax({
        url: root + 'data-list-projects',
        type: 'get',
        dataType: 'json',
        success: function(result){

            if(result.message.indexOf('not logged')>-1) {
                window.location.replace(root);
                return;
            }

            var table = getProjectTable(result);

            if(table!=null){

                $("#table-data").html(table);
                $('#project-table').DataTable();
            }
            else
                $("#table-data").html("No projects found");
        }
    });
}

function getProjectTable(data){

    if(data==undefined || data.found==undefined || data.found==false || data.projects==undefined)
        return null;
    else{

        var str = '<table id="project-table" class="display" cellspacing="0" width="100%">';

        str += '<thead>';

        str += '<tr>';
        str += '<td>S.No.</td>';
        str += '<td>Name</td>';
        str += '<td>Description</td>';
        str += '<td>Action</td>';
        str += '</tr>';

        str += '</thead><tbody>';

        for(var i=0; i<data.projects.length;i++){

            var project = data.projects[i];

            str += '<tr>';
            str += '<td>' + (i+1) + '</td>';
            str += '<td>' + project.name + '</td>';
            str += '<td>' + project.description + '</td>';

            str += '<td>';
            str += '<a href="list-bugs/' + project.id + '">View bugs</a>';
            str += '</td>';

            str += '</tr>';
        }

        str += '</tbody></table>';

        return str;
    }
}