<?php

	include 'utils.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Bem vindo à Pizzaria ABCD</title>
		<meta charset="utf8" />
		<link href="css/reset.css" type="text/css" rel="stylesheet" />
		<link href="css/styles.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php loadHeader( 4 ); ?>

		<div class="container">
			
			<form action="autentication.php" method="post">
				<table>
					<tr>
						<h2>Login</h2>
					</tr>
					<tr>
						<td><input type="text" placeholder="E-mail" name="txtUser"></td>
					</tr>
					<tr>
						<td><input type="password" placeholder="Senha" name="txtPass"></td>
					</tr>
					<tr>
						<td>
							<button type="Reset">Limpar</button>
							<button type="Submit">Login</button>
						</td>
					</tr>
				</table>
			</form>

			<br>
			Não possui uma conta? <br>
			<a href="register.php"><button>Cadastre-se</button></a>

		</div>

	</body>

</html>