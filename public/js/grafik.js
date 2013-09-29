/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
  $("a.dayLink").click(function(){
    var me = this;
    $.ajax({
        url: $(me).attr("href"),
        dataType: 'html',
        //   context: document.body
        success: function(data) {
            $("#dayPlan").html(data); 
            $("#dayPlan").show();  
        }
    });
   // $("#dayPlan").ht
    return false;
  });
  
  
  
}); 

