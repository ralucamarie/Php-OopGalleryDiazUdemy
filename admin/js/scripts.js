$(document).ready(function(){
  var user_href;
  var user_href_splitted;
  var user_id;

  var image_src;
  var image_href_splitted;
  var image_title;
  var photo_id;



  $(".modal_thumbnails").click(function(){
    $("#set_user_image").prop('disabled',false);

      user_href= $("#user-id").prop('href');
      // alert(user_href);
      user_href_splitted=user_href.split("=");
      user_id=user_href_splitted[user_href_splitted.length-1];
      // alert(user_id);

      image_src=$(this).prop("src");
      image_href_splitted = image_src.split("/");
      image_title=image_href_splitted[image_href_splitted.length-1];
      
    //alert(image_title);

      photo_id =$(this).attr("data");

      $.ajax ({
        url:"includes/ajax_code.php",
        data:{photo_id:photo_id},
        type:"POST",
        success:function(data){
          if(!data.error){
            $("#modal_sidebar").html(data);
          }
        }
      });


  });

  $("#set_user_image").click(function(){

      $.ajax({
        url:"includes/ajax_code.php",
        data:{image_title:image_title,user_id:user_id},
        type:"POST",
        success:function(data){
          if(!data.error){
            $(".user-image-box a img").prop('src', data);
          }

        }
      })



  });


});




$(document).ready(function() {
$('#summernote').summernote({
  height:100
});
});




  /*****Edit photo sidebar */
$(".info-box-header").click(function(){
  
  $(".inside").slideToggle("fast");
  $("#toggle").toggleClass("glyphicon-menu-down glyphicon, glyphicon-menu-up glyphicon")

})

/**Delete event */
$(".delete_link").click(function(){
  return confirm("Are you sure you want to delete this item?");
})