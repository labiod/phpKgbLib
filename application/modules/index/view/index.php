<?php include ("layouts/".$this->header); 	?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#content').css('visibility','hidden');
    });
</script>
	    <div id="buttons">
                <a href="/register/register" id="register_butt">Rejestracja</a>
                <a href="/user/login" id="login_butt">Logowanie</a>
            </div>

<?php include ("layouts/footer.php"); ?>