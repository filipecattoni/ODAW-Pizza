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
			Adicionar produto
			<form action="create.php" method="POST" onsubmit="return validFields();">
				<input type="text" placeholder="Nome" name="txtName" id="txtNome"> <br>
				<input type="text" placeholder="Descrição" name="txtDesc" id="txtDesc"> <br>
				<input type="number" placeholder="Preço" name="txtPrice" id="txtPrice"> <br>
				<button type="Submit">Cadastrar</button>
			</form>
			<?php printMsgForm(); ?>
		</div>

		<?php 
			$link = mysqli_connect("localhost", "root", "", "pizza");
			$query = "SELECT * FROM produtos";
			$result = mysqli_query( $link, $query );
		?>

		<div class="container">
			<table class="readtable">
				<tr>
					<th> Nome
					<th> Descrição
					<th> Preço
					<th> Editar
					<th> Remover
				</tr>
				<?php 
					while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td> <?php echo $row['nome']?>
							<td> <?php echo $row['descricao']?>
							<td> <?php echo $row['preco']?>
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