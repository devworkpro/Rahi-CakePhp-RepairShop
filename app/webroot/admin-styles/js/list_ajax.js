$(document).ready(function () {
    
    
    $('#user_search_id').keyup(function () {
        var input = $(this).val();
        
        $.post('http://112.196.42.180:4098/timmurigu/admin/users/ajaxfetch', { input:input }, function (data) {
    
            
        var data = $.parseJSON(data);        
            
            
        /*    $.post('http://112.196.42.180:4098/timmurigu/admin/users/userlist', { usersar: JSON.stringify(data) }, function (data) {
                
            }
          */  
        $('#ajax_data1').text('');
            $.each(data , function(key, value) {

                $('#ajax_data1').html('<tr><td>'+value['User']['first_name']+' '+value['User']['middle_name']+' '+value['User']['surname']+'</td><td>'+value['User']['email']+'</td><td>'+value['User']['role']+'</td><td>'+value['User']['created']+'</td><td> <a href="/timmurigu/admin/users/userlist/"'+value['User']['id']+'><i class="fa fa-edit"></i></a> <a href="/timmurigu/admin/users/deleteuser/"'+value['User']['id']+' onclick=return confirm("Are you sure?") ><i class="fa fa-remove"></i></a> </td></tr>');                   

            } );
        })
    });
});
