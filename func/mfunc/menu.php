<?php

	include '../../utils.php';

?>

<script type="text/javascript">

  function validFields(){

    var user = document.getElementById("txtUser").value;
    var pass = document.getElementById("txtPass").value;
    var inconsistentFields = [];
    var ret = true;

    if( user === "" ){
      inconsistentFields.push( "Campo de usuário vazio" );
    }
    if( pass === "" ){
      inconsistentFields.push( "Campo de senha vazio" );
    }

    if( inconsistentFields.length > 0 ){
      ret = false;
      alert( "As seguintes inconsistências foram encontradas:\n" + inconsistentFields.join( "\n" ) );
    }

    return ret;

  }

</script>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Bem vindo à Pizzaria ABCD</title>
		<meta charset="utf8" />
		<link href="/css/reset.css" type="text/css" rel="stylesheet" />
		<link href="/css/styles.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php loadHeader( 4 ); ?>

		<div class="container">
			Adicionar funcionário
			<form action="create.php" method="POST" onsubmit="return validFields();">
				<input type="text" placeholder="Usuário" name="txtUser" id="txtUser"> <br>
				<input type="password" placeholder="Senha" name="txtPass" id="txtPass"> <br>
				<button type="Submit">Cadastrar</button>
			</form>
			<?php printMsgForm(); ?>
		</div>

		<?php 
			$link = mysqli_connect("localhost", "root", "", "pizza");
			$query = "SELECT * FROM funcionarios";
			$result = mysqli_query( $link, $query );
		?>

		<div class="container">
			<table class="readtable">
				<tr>
					<th> Usuário
					<th> Editar
					<th> Remover
				</tr>
				<?php 
					while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td> <?php echo $row['email']?>
							<td> <a href='updateform.php?id=<?php echo $row['id']?>'>Editar</a>
							<td> <a href='delete.php?id=<?php echo $row['id']?>'>Remover</a>
						</tr>
						<?php 
					}
				?>
			</table>
		</div>

	</body>

</html>