<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<p><strong>Nombre:</strong>solomusica</p>
		<p><strong>Email:</strong>dgooo18@gmail.com</p>
		<h3>Sigue el siguien link para cambiar tu contraseña</h3>
		<p><strong>link:</strong>http://localhost:8000/reset-pass/{{ encrypt($email) }}</p>
	</body>
</html>
