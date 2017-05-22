<!DOCTYPE html>
<?php
if(!session_id()){session_start();}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>Registro</title>        
    </head>
    <body>
		<?php require_once("connection.php"); ?>
		<?php
		
		if(isset($_POST["usuario"])){			
			
			if(!empty($_POST['usuario']) && !empty($_POST['clave']) && !empty($_POST['email']) && !empty($_POST['apellidos']) && !empty($_POST['nombre'])){
				
				$nombre = $_POST['nombre'];
				$apellidos = $_POST['apellidos'];
				$email = $_POST['email'];
				$usuario = $_POST['usuario'];
				$clave = $_POST['clave'];
				
				$query_check = "SELECT * from users where username = '". $usuario."' or email ='".$email."'";
			
				try{

					$resultado = $connect->query($query_check);
					if(mysqli_num_rows($resultado)>0){
						$row = $resultado->fetch_array(MYSQLI_ASSOC);
						$dbusuario = $row['username'];
						$dbemail= $row['email'];
						
						if($dbusuario === $usuario && $dbemail === $email){
							print("<script>alert('Existe ya un usuario ".$dbusuario." con email ".$dbemail.". Registro cancelado.');</script>");							
						}elseif($dbusuario === $usuario){
							print("<script>alert('Ya existe un usuario  ".$dbusuario." en la base de datos');</script>");
						}else{
							print("<script>alert('El email ".$dbemail." ya está registrado para otro usuario.');</script>");
						}
						$resultado->free();
						
					}else{

						$query_insert="INSERT INTO users (username, name, surname, email, useractive, userpass, userlevel) values ('".$usuario."','".$nombre."','".$apellidos."','".$email."',true,'".md5($clave)."',4)";

						if($connect->query($query_insert)){							
							header("Location: login.php");
						}else{							
							print("<script>alert('Error insertando datos: ".$connect->error."');</script>");
						}
					}
				}catch(Exception $e){
					echo("<script>alert('Error de conexión: ".$e->getMessage()."');</script>");
				}
			}else{
				print("<script>alert('Es obligatorio rellenar todos los campos');</script>");
			}			
		}
		?>
		
		<div class="marco principal">
			<div class="marco_menu">
				<fieldset form="registro"><legend>Registro de usuarios</legend>
					<form id="registro" method="post" action="registro.php">
						<ul>
						<li>
						<label>Nombre</label>
						<br><input type="text" name="nombre">
						</li>
						<li>
						<label>Apellidos</label>
						<br><input type="text" name="apellidos">
						</li>
						<li>
						<label>e-Mail</label>
						<br><input type="email" name="email">
						</li>
						<li>
						<label>Nombre de usuario</label>
						<br><input type="text" name="usuario">
						</li>
						<li>
						<label>Clave</label>
						<br><input type="password" name="clave">
						</li>
						</ul>
						<input type="submit" name="Enviar">
						<input type="reset" name="borrar">
					</form>
				</fieldset>
				<ul>
				<li>
				<a href="login.php">[INICIAR SESION]</a>
				</li>
				</ul>
			</div>
		</div>
	</body>
</html>