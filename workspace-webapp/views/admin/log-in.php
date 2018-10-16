<div class="body_login">
	<div class="login_container col-xs-10 col-sm-6 col-md-4 no-card">
		<div class="login_entry">
			<p><b>Legajo</b><span class="pull-right">(valores: admin/11009 o cualquier otro legajo)</span></p>
			<div class="ui left icon input">
				<input type="text" name="txtEmailLogin" id="txtEmailLogin" class="txtEmailLogin" placeholder="Usuario/E-mail">
				<i class="user icon"></i>
			</div>
			<p><b>Contraseña</b><span class="pull-right">(valores: 123456)</span></p>
			<div class="ui left icon input">
				<input type="password" name="txtPassLogin" id="txtPassLogin" class="txtPassLogin" placeholder="Contraseña">
				<i class="lock icon"></i>
			</div>
			<button class="btn btn-danger btnAdminLogIn" id="btnAdminLogIn">Ingresar</button>
		</div>
	</div>
</div>

<script>
var input = document.getElementById("txtPassLogin");
input.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("btnAdminLogIn").click();
    }
});
$(document).ready(function() {
	$(".btnAdminLogIn").on("click" , function(){
		var email = $(".txtEmailLogin").val().trim(),
			pass = $(".txtPassLogin").val().trim();


		$.ajax({
			type: "POST",
			url: '/res/php/admin_actions/login.php',
			data: {
				email: email,
				pass: pass
			},
			success: function(data){
				if(data == "true"){
					window.location.href = "/";
				}else if(data == "false"){
					alert("Sus credenciales no son válidas. Por favor intente nuevamente");
				}
			}
		});
	});
});
</script>
