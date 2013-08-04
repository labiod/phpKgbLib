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
  
  //rejestracja
  $("#nr_div").hide();
  $("input[name='role']").change(function(){
    if ($("input[name='role']:checked").val() == "osk" || $("input[name='role']:checked").val() == "instruktor"){
        $("#nr_div").show();
    }else{
        $("#nr_div").hide();
    }
  });
  $("#register_form").submit(function(){
    if ($("#email_adr").val() == null || $("#email_adr").val() == "" || $("#pass").val() == null || $("#pass").val() == ""){
        alert ("Wypełnij pola e-mail oraz hasło!");
        return false;
    }
    if (($("#osk").checked() == "checked" || $("#ins").checked() == "checked") && ($("#nr").val() == null || $("#nr").val() == "")){
        alert ("Musisz podać numer!");
        return false;
    }
        
    return true;
  });
  
}); 

