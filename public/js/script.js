/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
  $("ul#main_tab_menu > li").mouseenter(function(){
    $(this).addClass("selected");
  }).mouseleave(function(){
    $(this).removeClass("selected");
  });
}); 

