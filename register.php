<?php

	include 'utils.php';

?>

<script src="js/utils.js"></script>
<script type="text/javascript">

  function validFields(){

    var pass = document.getElementById("txtPass").value;
    var confPass = document.getElementById("txtConfPass").value;
    var email = document.getElementById("txtEmail").value;
    var tel = document.getElementById("txtTel").value;
    var rua = document.getElementById("txtRua").value;
    var num = document.getElementById("txtNum").value;
    var bairro = document.getElementById("txtBairro").value;
    var inconsistentFields = [];
    var ret = true;

    if( email === "" ){
      inconsistentFields.push( "Campo de email vazio" );
    }else if( !validacaoEmail( email ) ){
      inconsistentFields.push( "Email inválido" );
    }
    if( pass === "" ){
      inconsistentFields.push( "Campo de senha vazio" );
    }else if( confPass !== pass ){
      inconsistentFields.push( "Confirmação de senha incorreta" );
    }
    if( pass === "" ){
      inconsistentFields.push( "Campo de telefone vazio" );
    }
    if( rua === "" ){
      inconsistentFields.push( "Campo de rua vazio" );
    }
    if( num === "" ){
      inconsistentFields.push( "Campo de número de residência vazio" );
    }
    if( bairro === "" ){
      inconsistentFields.push( "Campo de bairro vazio" );
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
		<link href="css/reset.css" type="text/css" rel="stylesheet" />
		<link href="css/styles.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php loadHeader( 4 ); ?>

		<div class="container">
			
			<form action="cliente/addCli.php" method="post" onsubmit="return validFields();">
				<table>
					<tr>
						<h2>Cadastro</h2>
                    </tr>
                    <tr>
						<td><input type="text" placeholder="E-mail" name="txtEmail" id="txtEmail"></td>
                    </tr>
					<tr>
						<td><input type="password" placeholder="Senha" name="txtPass" id="txtPass"></td>
                    </tr>
                    <tr>
						<td><input type="password" placeholder="Confirmar Senha" id="txtConfPass"></td>
                    </tr>
                    <tr>
						<td><input type="text" placeholder="Telefone" name="txtTel" id="txtTel"></td>
                    </tr>
                    <tr>
						<td>
                            Endereço
                            <input type="text" placeholder="Rua" name="txtRua" id="txtRua">
                            <input type="text" placeholder="Número" name="txtNum" id="txtNum">
                            <input type="text" placeholder="Bairro" name="txtBairro" id="txtBairro">
                            <input type="text" placeholder="Complemento" name="txtComp">
                        </td>
					</tr>
					<tr>
						<td>
							<button type="Reset">Limpar</button>
							<button type="Submit">Cadastrar</button>
						</td>
                    </tr>
                    <tr>
                        <td><?php printMsgForm(); ?></td>
                    </tr>
				</table>
			</form>

		</div>

	</body>

</html>