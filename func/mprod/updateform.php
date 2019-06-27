<?php

	include '../../utils.php';

?>

<script type="text/javascript">

  function validFields(){

    var name = document.getElementById("txtName").value;
    var descr = document.getElementById("txtDesc").value;
    var price = document.getElementById("txtPrice").value;
    var inconsistentFields = [];
    var ret = true;

    if( name === "" ){
      inconsistentFields.push( "Campo de nome vazio" );
    }
    if( descr === "" ){
      inconsistentFields.push( "Campo de descrição vazio" );
    }
    if( price === "" ){
      inconsistentFields.push( "Campo de preço vazio" );
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
			Alterar produto
			<form action="update.php" method="POST" onsubmit="return validFields();">
				<input type="text" placeholder="Nome" name="txtName" id="txtNome"> <br>
				<input type="text" placeholder="Descrição" name="txtDesc" id="txtDesc"> <br>
				<input type="number" placeholder="Preço" name="txtPrice" id="txtPrice"> <br>
				<input type="hidden" name="hidid" value="<?php echo $_GET['id']; ?>">
				<button type="Submit">Cadastrar</button>
			</form>
		</div>

	</body>

</html>