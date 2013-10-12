<?php
include ("layouts/aheader.php");
?>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#wyslijTest").click(function(e) {
            var newDiv = document.createElement("div");
            newDiv.id = "shadowDiv";
            newDiv.style.width = "100%";
            newDiv.style.height = "100%";
            newDiv.style.position = "fixed";
            newDiv.style.top = 0;
            newDiv.style.left = 0;
            newDiv.style.background = "black";
            newDiv.style.opacity = "0.8";
            newDiv.style.zIndex = "5";
            newDiv.innerHTML = "&nbsp;";
            document.body.appendChild(newDiv);
            var dialog = document.getElementById("ddialog");
            dialog.parentNode.removeChild(dialog);
            document.body.appendChild(dialog);
            $("#ddialog").css("display", "block");
            $("#ddialog").css("position", "absolute");
            $("#ddialog").css("top", "300px");
            $("#ddialog").css("width", "100%");
            $("#ddialog").css("z-index", "10");
            
       });
       $("#sendTestMail").submit(function(e) {
            tinyMCE.triggerSave();    
            var oData = "title="+ encodeURIComponent($("#title").attr("value")) +"&body="+ encodeURIComponent(document.getElementById("text").value)
                    +"&mail="+ encodeURIComponent($("#testmail").attr("value"))+"&action=biuletyn";
            $.ajax({
                type: "POST",
                url: "/newsletter/admin/confirm",
                data: oData,
                success: function(data){
                    alert(data);
                    $("#ddialog").hide();
                    document.body.removeChild(document.getElementById("shadowDiv"));
                }
            });       
            e.preventDefault();
            return false;
       });
       
    });
</script>
<div id="ddialog" style="display: none;" title="Wyslij testowego maila">
	<form action="/newsletter/admin/confirm" method="post"
		id="sendTestMail">
		<table id="tab_edit" cellspacing="0"
			style="width: 400px; margin: 0 auto;">
			<tr>
				<th colspan="2">Utwórz nowy biuletyn</th>
			</tr>
			<tr>
				<td class="left">Testowy mail:</td>
				<td class="right"><input class="itext" type="text" id="testmail"
					name="testmail" value="" /></td>
			</tr>
			<tr>
				<td colspan="2" class="cntr"><input type="hidden" id="action"
					name="action" value="biuletyn" /> <input type="submit"
					id="sendTest" class="button" value="Wyślij" />
			
			</tr>
		</table>
	</form>
</div>
<form action="/newsletter/admin/confirm" method="post">
	<table id="tab_edit" cellspacing="0">
		<tr>
			<th colspan="2">Utwórz nowy biuletyn</th>
		</tr>
		<tr>
			<td class="left">Tytuł:</td>
			<td class="right"><input class="itext" type="text" id="title"
				name="title" value="" /></td>
		</tr>
		<tr>
			<td class="left">Treść:</td>
			<td class="right"><textarea id="text" name="body" cols="40" rows="15"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="cntr"><input type="hidden" id="action"
				name="action" value="biuletyn" /> <input type="submit" id="submit"
				name="submit" class="button" value="Wyślij" /> <input type="button"
				id="wyslijTest" class="button" value="Wyślij testowy" />
		
		</tr>
	</table>

</form>
<?php include ("layouts/afooter.php"); ?>
