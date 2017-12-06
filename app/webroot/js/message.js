$(document).ready(function () {
    
    
 /************************************************************************************/
    $('#listusrModal').hide();
    $('#add_recipient').click(function () {
        $('.search_recipient').val('');
        $('.row-tr').show();
        $('#listusrModal').modal('show');  
    });
    
    $('.row-tr').click(function () {

        var root = $(this).find( ".row-td" );
        if(root.attr("checked")){
           root.attr('checked', false);
        }else{
            root.attr('checked', true);
        }
        
    });


 /***********************************************************************************/

 $('.search_recipient').keyup(function () {
    var id, input = ($(this).val()).toLowerCase();

    if(input.length == 0){
        $('.row-tr').show();
    }else{
        $('.row-tr').hide();
        $('.row-td2').each(function () {
            if( (($(this).text()).toLowerCase()).indexOf(input) != -1){
                //alert($(this).val());
                id = ($(this).attr('usr'));
                $('#usr_'+id).show();
            }
        });
    }
 });

 /*******************************************************************************************/
$('.k_error').hide();
 $('#k_add').click(function () {
     var val = [];
    $('.row-td').each(function () {
        if(this.checked){
            val[val.length] = $(this).val();
        }
    });

    if(val.length == 0){
        $('.k_error').show();
        return false;
    }else{
        $('.k_error').hide();
    }

    $('.k_ajaxfetch').val('');
    for(var i=0; i< val.length; i++){
        if(i == (val.length - 1)){
            $('.k_ajaxfetch').val($('.k_ajaxfetch').val() + val[i]);

        }else{
            $('.k_ajaxfetch').val($('.k_ajaxfetch').val() + val[i]+",");
        }
    }
 });

/**********************************************************************************************/
 /*
    $.post('http://112.196.42.180:4098/timmurigu/admin/messages/ajaxfetch', { input:input }, function (data) {
        var output = "", data = $.parseJSON(data);
        $.each(data , function(key, value) {
          output += "<li class=\"k_dynamic_1\">"+value['User']['email']+",</l1><br />";
          //output += "<option value="+ value['User']['email'] +\">";
        });
                //alert(output);
        $('#k_emails').text(""); 
        $('#k_emails').html(output); 
    });    
*/

/**************************************************************************************/
/*
    $('.k_ajaxfetch').keyup(function () {
        var input = $(this).val();
        //alert(input.length);
        if(input.indexOf(",") != -1){
            var temp = input.split(',');
            input = temp[temp.length - 1];

        }
       
        if(input.length != 0){

            $.post('http://112.196.42.180:4098/timmurigu/admin/messages/ajaxfetch', { input:input }, function (data) {
                var output = "", data = $.parseJSON(data);
                $.each(data , function(key, value) {
                    output += "<li class=\"k_dynamic_1\">"+value['User']['email']+",</l1><br />";
                    //output += "<option value="+ value['User']['email'] +\">";
                });
                //alert(output);
                $('#k_emails').text(""); 
                $('#k_emails').html(output);

                
            });
        }else{
            $('#k_emails').text("");
        }
    });
*/

/**************************************************************************************/

    $('#k_emails').on( 'click', '.k_dynamic_1', function () {
        var t = $(this).text();
        var inp = $('.k_ajaxfetch').val();
        if(inp.indexOf(t) != -1){
            $('.k_ajaxfetch').val(inp.replace(t, ''));
        }else{
            if(inp.indexOf(",") == -1){
                $('.k_ajaxfetch').val(t);
            }else{
                $('.k_ajaxfetch').val( (inp.substr(0, inp.lastIndexOf(",")+1)) +" " + t);
            }
        }

    });

/**************************************************************************************/
    
    $('.reply-box').hide();
    $('.reply-btn').click(function () {
        //alert('sss');
        $('.reply-box').fadeToggle();
    });

    

/**************************************************************************************/

    $('.bulk_select').click(function () {
        if($(this).is(':checked')){

            $('.bulk_select').each(function () {
                $(this).prop('checked', true); 
            });

            $('.delete_chkbox').each(function () {
                $(this).prop('checked', true); 
            });
        }else{


            $('.bulk_select').each(function () {
                $(this).prop('checked', false);   
            });

            $('.delete_chkbox').each(function () {
                $(this).prop('checked', false);   
            });
        }
        
    });
    
    $('.delete_bulk').click(function () {

        var ar = [];
        $('.delete_chkbox').each(function () {
            if($(this).is(':checked')){
                ar.push($(this).attr('group_id'));
            }           
               
        });

        if(ar.length >= 1) {

            if(confirm("Are you sure you wish to delete this Conversation?")){
                
                var input = (JSON.stringify(ar));
                $.post('http://112.196.42.180:4098/timmurigu/admin/messages/ajaxdelete', { input:input }, function (data) {
                    var i = 0;
                    for(i=0; i<ar.length; i++){
                        $('#group_'+ar[i]).fadeOut();
                    }

                });
            }
        }else{
            alert('No Group is Selected...');
        }
              

    });
    



});
