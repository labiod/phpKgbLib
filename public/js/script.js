/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
  $("ul#main_tab_menu > li").click(function(){
    $("ul#main_tab_menu > li").removeClass("selected");
    $(this).addClass("selected");
    });
  
  
  
}); 

