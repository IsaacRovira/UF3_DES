<!DOCTYPE html>
<?php
if(!session_id()){session_start();}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>LogIn</title>        
    </head>
    <body>
        <?php

		require_once 'connection.php';
				
		if(isset($_SESSION['info'])){
			print($_SESSION['info']);
		}
		
		if(isset($_POST["usuario"])){					
			$query = "select * from users where username ='".$_POST['usuario']."' and userpass = '".md5($_POST['password'])."'";
			try{				
				$resultado = $connect->query($query);				
				if(mysqli_num_rows($resultado)>0){				
					header("Location: exito.php");
				}else{					
					print("<script>alert('Usuario o contraseña incorrecto.');</script>");
				}
			}catch(Exception $e){
				print("<script>alert('Error de conexión: ".$e->getMessage()."');</script>");
			}
		}
		?>
		<div class="marco_principal">
			<div class="marco_formulario">
				<fieldset from="login"><legend>Inicio de sesion</legend>
				<form id="login" method="post" action="login.php">
					<ul>
						<li>
							<label class="etiqueta">Nombre de usuario</label>
							<br><input type="text" name="usuario">
						</li>
						<li>
							<label class="etiqueta">Clave</label>					
							<br><input type="Password" name="password">
						</li>
					</ul>
					<input type="Submit" value="Enviar">
					<input type="Reset" value="Borrar">
				</form>
				</fieldset>
				<ul>
				<li>
				<a href="registro.php">[NUEVO USUARIO]</a>
				</li>
				</ul>
			</div>		
		</div>
	</body>
</html>