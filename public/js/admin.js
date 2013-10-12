/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    //potwierdzenie usunięcia
    $('.potwierdz').click(function(){
      var r = confirm("Czy na pewno usunąć ten element?");
      if (r)        
         return true;
      return false;    
    });
  
}); 




