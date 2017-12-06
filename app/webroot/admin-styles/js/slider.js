function slider_scroll(id) {
 // Find div to load content to
 var scrollkey = document.getElementById(id);
 if(!scrollkey) return false;
 $.ajax({ 
   url: "ajax/getsliders",
   type: "POST",
   success: function(data) {
    scrollkey.innerHTML = data;
   }
  });
 return true;
}
