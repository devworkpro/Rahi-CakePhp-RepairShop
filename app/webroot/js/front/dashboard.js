$(document).on('submit', '.dashboardForm', function(event) {  // add comment//
     var siteurl = $('#siteurl').val();
     var userPic = $('.user').attr('attr-pic');
     var userID = $('.user').attr('attr-id');
     var gpx_id = $(this).attr('attr-id');
     var cmt_id = $('.comments_list').attr('id');
      var comment = $('#form-control'+gpx_id).val();
      var user_id =$(this).attr('attr-uid');
      var current_date= $(this).attr('date');
      $.ajax({
          url : siteurl + 'pages/addComments',
           type: "POST",
           data: {
            user_id:user_id,
            comment:comment,
            gpx_id:gpx_id
                 
         },  

     })
        .done(function(e) {
             
             //console.log(e);

            var dashboard = jQuery.parseJSON(e);
            

          console.log(dashboard);
              //console.log(value);
              var date = new Date();
      
              if($(this).attr('attr-uid')== $('.user').attr('attr-id')) {

                   var dlt = "<i id='"+dashboard.comment_id+"' class='fa fa-trash-o'></i>";
                }

                else{

                  var dlt = "";
                }

             html = `<h4 class="comments_list" id="cmt_id_`+dashboard.comment_id+`">
              <span class="user_pic" style="width:45px">
              <img alt="" src=`+siteurl+`/img/user_image/small/`+dashboard.User.profile_pic+`></span> 
                <span class="user_cmnt">
                  <small> `+dashboard.User.first_name+` `+dashboard.User.surname+`: </small>`+ comment + `</span> 
                <br><span class="time">`+current_date+` `+date.getHours()+`:`+date.getMinutes()+`  `+dlt+`</span>  </h4>`;


            $('#comments_dash_'+gpx_id+' > p').after(html);
            $('#form-control'+gpx_id).val('');

        });
});

// delete comment//

$(document).on('click', '.fa-trash-o', function(event) {
          var siteurl = $('#siteurl').val();          
          var id= $(this).attr('id');
        //console.log(id);
          
        $.ajax({
           type: "POST",
           data: {lid:id},
           url: siteurl + "pages/deleteComments",
           success: function(result){
          console.log(result);
      
      var success = parseInt(result);
      
      if(success == 1){
          $('#cmt_id_'+id).remove();
      }
             

           }
     });
        
});

// like Gpx // 
$(document).one('click', '.kudos', function(event) {
          var siteurl = $('#siteurl').val();          
          var gpx_id= $(this).attr('attr-id');
          var user_id= $(this).attr('attr-uid');
        //console.log(gpx_id);
          
        $.ajax({
          url: siteurl + "pages/likeGpx",
           type: "POST",
           data: {
            gpx_id : gpx_id,
            user_id : user_id,

          },
     })

        .done(function(e) {
             
           // console.log(e);
            
            var likes = jQuery.parseJSON(e);

            if($(".like_number_"+gpx_id).text() == ""){

              var likes = 1;
            }else{
              var likes = parseInt($(".like_number_"+gpx_id).text()) + 1;
            }
          $('.kudos').children('.like_number_'+gpx_id).text(likes);
             
          });

        
});

//load more..//

$(document).on('click', '.load_more', function(event) { 
          var siteurl = $('#siteurl').val();
          var gpx_id=$('.dashboard_feed:last').attr('attr-id');
           var user_id=$('.info').attr('attr-uid');
          $.ajax({
          url: siteurl + 'pages/loadmoreGpx',
          type: 'POST',
          data: {
            id: gpx_id,
            user_id : user_id,
          },

      })

          .done(function(e) {
             
            console.log(e);

            if(e == ''){
        $('.load_more').text('No More Content');
      }

            var load_more = jQuery.parseJSON(e);
            console.log(load_more);
            var html= '';

             $.each(load_more,function(key,value){

              if(value.courses.type2==1){

                var score="<li><span>Score: </span>"+value.leaderboards.score+"</li>";
              }
              else{

                var score=" ";
              }
              if((value.leaderboards.distance).split('.')[0] == 0){
                 var meter ='M';
              }else{
                var meter ='KM';
              }



              html += `<div attr-id="`+value.Gpx.id+`" class="dashboard_feed">
<div class="col-sm-2">
<div class="dashboard_feed_image">

<img class="user-image" alt="CakePHP" src="/runningportal/img/user_image/`+value.users.profile_pic+`"><br><span>`+value.users.first_name+` `+value.users.surname+`</span>
</div><!-- dashboard_feed_image -->
</div>

<div class="col-sm-7">
  <div class="dashboard_feed_map">
      <h4>` +value.Gpx.activity_name+ ` <span class="pull-right"> `+moment(value.Gpx.created_at).format('dddd , DD MMMM, YYYY H:mm')+`</span></h4>
      <p><!-- <img src="img/dashboard_map.png" alt="img"> -->


 
<img alt="" src="https://maps.googleapis.com/maps/api/staticmap?center=-31.968282790031687,115.79345771111548&amp;size=461x272&amp;zoom=16&amp;maptype=roadmap&amp;markers=icon:http://112.196.42.180:4134/repairshopsaas/img/strt.png|color:red|-31.968282790031687,115.79345771111548">


       
        <span class="text-center">`+value.courses.Name+`</span>
        

        <button attr-uid="`+user_id+`" attr-id="`+value.Gpx.id+`" class="btn btn-primary kudos">
        <i aria-hidden="true" class="fa fa-thumbs-up"></i>
         <big class="like_number_`+value.Gpx.id+`">`+(value.Like).length+`</big> like
      </button>


      </p>
        
    <div id="comments_dash_`+value.Gpx.id+`" class="dshbrd_comment">
      
      <p>Comments: </p>`;


          $.each(value.Comment,function(commentKey,commentValue){     
     html +=  `<h4 id="cmt_id_`+commentValue.id+`" class="comments_list">
        <span style="width:45px;" class="user_pic"><img alt="" src="/runningportal/img/user_image/small/user-pic.png"></span> 
         <span class="user_cmnt">
          
          <small>`+ value.users.first_name+` `+value.users.surname+`: </small>
          
          `+commentValue.comment+`
         </span> 
      <br>   <span class="time">`+moment(commentValue.created_at).format('DD-MM-YYYY H:mm')+      
      ` <i class="fa fa-trash-o" id="`+commentValue.id+`"> </i> 
      </span>  
      </h4> `;});

      html +=`<form date="`+moment().format('DD-MM-YYYY')+`" attr-upic="`+value.users.profile_pic+`" attr-uid="`+user_id+`" attr-id="`+value.Gpx.id+`" class="dashboardForm" action="javascript: void(0)">
   
      <h4 class="comments_blck"><span style="width:45px;" class="user_pic"><img class="user-image" alt="CakePHP" src="/runningportal/img/user_image/small/`+value.users.profile_pic+`"></span> 

    
      <span class="user_cmnt">
        
        <input class="form-control" required="" placeholder="comments..." id="form-control`+value.Gpx.id+`">

        </span>
        <button type="submit" class="btn btn-primary">Send</button>
    

        </h4>
        </form>`;

        
    html += `</div><!-- dshbrd_comment -->
  </div><!-- dashboard_feed_map -->
</div>

<div class="col-sm-3">
<div class="dashboard_feed_table">
  <ul>
  <li><span>Time: </span>`+(value.leaderboards.time)+`</li>`
    +score+

    
      /*<li><span>Score: </span>`+value.leaderboards.score+`</li>*/

    
  `<li><span>Distance: </span>`+Math.round(value.leaderboards.distance*100)/100+meter+`</li>
        <li><span>With: </span>`+(value.Gpx.activity_with).split('"')[1]+`</li> <li><span>Type: </span>`+value.Gpx.activity_type+`</li>
  </ul>
  
    <p><a href="#">Blog Link  </a></p>
</div><!-- dashboard_feed_table -->

</div>

</div>`;

        });     
$('.dashboard_feed:last').after(html);
        
            });     
      
 });


// search...

$(document).on('submit', '#serach', function(event) {

var siteurl = $('#siteurl').val();
var first_name = $('#Serchfrnd').val();
  $.ajax({
    url: siteurl+'pages/search',
    type : 'POST',
    data: {
        first_name:first_name
      },
    
  })
  .done(function(e) {
             
           // console.log(e);
            
            var search = jQuery.parseJSON(e);
            
            $('#friendModal').modal('show');
            
            var html= '';
            console.log(search);
            $.each(search,function(key,value){

              html +=` <li><img alt="CakePHP" src="/runningportal/img/user_image/small/`+value.users.profile_pic+`"></li>
                          <li>`+value.users.first_name+` `+value.users.surname+`</li>`

            });
            console.log(html);

            $('.searchFriends').html(html);
          //  console.log(html);
      });


});
