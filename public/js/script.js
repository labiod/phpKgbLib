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
  /*  $("#nr_div").hide();
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
    });*/
    $("#register_form div").hide();
    $("#stepdiv_1").show();
    var nr = 1;
    changeStep = function(){
        switch(nr){
            case "1":
                $("#dalej").show();
                $("#wstecz").hide();
                $("#submit").hide();
                break;
             case "2":
                $("#dalej").show();
                $("#wstecz").show();
                $("#submit").hide();
                break;  
             case "3":
                $("#dalej").hide();
                $("#wstecz").show();
                $("#submit").show();
                break;  
        }
        $("#register_form div").hide();
        $("#stepdiv_"+nr).show();
    };
    $("#register_form legend").click(function(){
        nr = $(this).attr("id").split("_")[1];
        changeStep();
    });
    $("#dalej").click(function(){
        if(nr < 3){
            nr++;
            changeStep();
        }
        
    });
    $("#wstecz").click(function(){
        if(nr > 1){
            nr--;
            changeStep();
        }
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

