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
			Alterar funcionário
			<form action="update.php" method="POST" onsubmit="return validFields();">
				<input type="text" placeholder="Usuário" name="txtUser" id="txtUser"> <br>
				<input type="password" placeholder="Senha" name="txtPass" id="txtPass"> <br>
				<input type="hidden" name="hidid" value="<?php echo $_GET['id']; ?>">
				<button type="Submit">Cadastrar</button>
			</form>
		</div>

	</body>

</html>