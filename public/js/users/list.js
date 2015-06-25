$(function(){

    getUsers();
});

function getUsers(){

    $.ajax({
        url: root + 'data-list-users',
        type: 'get',
        dataType: 'json',
        success: function(result){

            if(result.message.indexOf('not logged')>-1) {
                window.location.replace(root);
                return;
            }

            var table = getUserTable(result);

            if(table!=null){

                $("#table-data").html(table);
                $('#user-table').DataTable();
            }
            else
                $("#table-data").html("No users found");
        }
    });
}

function getUserTable(data){

    if(data==undefined || data.found==undefined || data.found==false || data.users==undefined)
        return null;
    else{

        var str = '<table id="user-table" class="display" cellspacing="0" width="100%">';

        str += '<thead>';

        str += '<tr>';
        str += '<td>S.No.</td>';
        str += '<td>Name</td>';
        str += '<td>Email</td>';
        str += '<td>Type</td>';
        str += '<td>Action</td>';
        str += '</tr>';

        str += '</thead><tbody>';

        for(var i=0; i<data.users.length;i++){

            var user = data.users[i];

            str += '<tr>';
            str += '<td>' + (i+1) + '</td>';
            str += '<td>' + user.name + '</td>';
            str += '<td>' + user.email + '</td>';
            str += '<td>' + user.user_type + '</td>';

            str += '<td>';
            str += '<a href="' + root + 'edit-user/' + user.id + '" title="Edit user"><img class="icon" src="' + root + 'public/images/edit.png"/></a>';
            str += '&nbsp;&nbsp;&nbsp;';
            str += '&nbsp;&nbsp;&nbsp;';
            str += '<a href="#" title="Remove user"><img class="icon" src="' + root + 'public/images/remove.png"/></a>';
            str += '</td>';

            str += '</tr>';
        }

        str += '</tbody></table>';

        return str;
    }
}