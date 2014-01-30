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
    $("#kursantBtn").click(function(){
        $("fieldset legend").text("Kursant");
        $("#role").val("kursant");
        $("#nr_div").hide();
    });
    $("#instruktorBtn").click(function(){
        $("fieldset legend").text("Instruktor");
        $("#role").val("instruktor");
        $("#nr_div").show();
    });
    $("#oskBtn").click(function(){
        $("fieldset legend").text("OSK");
        $("#role").val("osk");
        $("#nr_div").show();
    });
    $("#register_form").submit(function(){
        if ($("#email_adr").val() == null || $("#email_adr").val() == "" || $("#pass").val() == null || $("#pass").val() == ""){
            alert ("Wypełnij pola e-mail oraz hasło!");
            return false;
        }
        if (($("#role").val() == "instruktor" || $("#role").val() == "osk") && ($("#nr").val() == null || $("#nr").val() == "")){
            alert ("Musisz podać numer!");
            return false;
        }
        return true;
    });

  
}); 

