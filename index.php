<!DOCTYPE html>
<?php
if(!session_id()){
//	session_destroy();
	session_start();
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <title>Bienvenida</title>        
    </head>
    <body>		
		<?php
			//echo("<p> Nombre:" . session_name() . "</p>");
			//echo("<p> ID:" . session_id() . "</p>");
		?>
		<h1>ACTIVIDAD PRACTICA UF3</h1>
		<h3>INICIO DE SESION</h3>
		<h4><u>Bienvendio</u></h4>
		<p>Elige una de las siguientes opciones:</p>
		<ul>
			<li>
			<a href="php/login.php">[INICIAR SESION]</a>				
			</li>
			<li>
			<a href="php/registro.php">[REGISTRO NUEVO USUARIO]</a>
			</li>
		</ul>
	</body>
</html>