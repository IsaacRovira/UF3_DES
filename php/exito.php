<!DOCTYPE html>
<?php
if(!session_id()){session_start();}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>Exito</title>        
    </head>
    <body>
		<h1>FIN ACTIVIDAD PRACTICA UF3</h1>
		<h3>PROCESO DE REGISTRO E INICIO DE SESIÓN COMPLETADO CON EXITO.</h3>
		<?php
		session_destroy();
		?>
		<ul>
			<li>
				<a href="login.php">[VOLVER A INICIAR SESION]</a>
			</li>
			<li>
				<a href="registro.php">[REGISTRAR UN NUEVO USUARIO]</a>
			</li>
		</ul>
	</body>
</html>