<!DOCTYPE html>

<html>



 <lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" type="text/css" href="estilizar.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png">

    <script type="text/javascript" src="contato.js"></script>

    <title>Contato</title>  

 

</head>

<body>


   <div class="container-fluid px-0">
        <header>
        
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
                <a class="navbar-brand" href="index.html"> <img src="verao/imagens.png" class="img-fluid" alt=""> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                  <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                      <a class="nav-link" href="index.html"> <i class="fas fa-home"></i>
                        Home</a>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-images"></i>
                        Galeria
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="verao.html">Book De Verão</a>
                        <a class="dropdown-item" href="parque.html">Parque Cruzeiro</a>
                      </div>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link " href="#"><i class="fas fa-users"></i>
                        Sobre nos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="novo.php">
                            <i class="fas fa-envelope-square"></i></i>
                            contato</a>
                      </li>

                  </ul>
                </div>
              </nav>
            
        </header>



	<?php 

		include 'header.php';

		$aula_atual = 'valida-formularios';

    ?>

    

    <?php 

		function clean_input($data){

			$cleandata = trim($data);

			$cleandata = stripslashes($cleandata);

			$cleandata = htmlspecialchars($cleandata);



			return $cleandata;



        }

        



    ?>

    <h2>Entre em contato conosco</h2>



		<h3>Preencha os campos a baixo</h3>

		

        <?php

        

        if ($_SERVER['REQUEST_METHOD']=='POST'){

			$nome = $_POST['nome'];

			$email = $_POST['email'];

			$whats = $_POST['whats'];

			$cidade = $_POST['cidade'];

			$assunto = $_POST['assunto'];



			if ($nome == "") {

				$erro_nome = '*  nome é obrigatório';



			}elseif ($email == "") {

				$erro_email = '*  email é obrigatório';

			}elseif (filter_var($email)== false) {

				$erro_email ='*  O email é inválido!';

			}else  {

				$nome = clean_input ($nome);

				$email = clean_input ($email);



				$server = 'sql200.epizy.com';

				$user = 'epiz_27746252';

			    $password ='P4ZN2TnlHwnK';

			    $dbname = 'epiz_27746252_XXX';



			    $db_connect = new mysqli($server , $user , $password , $dbname , $port);



			    if ($db_connect ->connect_error == true ) {

			    	echo 'falha na conexao :' . $db_connect ->connect_error;}

			    	else{

			    		echo 'cadastrado com sucesso.'. '<br>';





			    		$sql = "INSERT INTO fotos (nome,email,whats,cidade,assunto)VALUES('$nome','$email','$whats','$cidade','$assunto')";

			    		$db_connect->query($sql);

			    	}



			}

		}



		?>



            <form action="novo.php" method="post">

			<div id="denun">

			Nome: *

			<br>

			<input type="text" name="nome" class="field">

			<br>

			<div class = "erro-form"><?php echo $erro_nome; ?></div>

			<br>

			

			E-mail: *

			<br>

			<input type="text" name="email" class="field">

			<br>

			<div class = "erro-form"><?php echo $erro_email; ?></div>

			<br>



			Whats: *

			<br>

			<input type="text" name="whats" class="field">

			<br><br>

			



			Cidade: *

			<br>

			<input type="text" name="cidade" class="field">

			<br><br>

			



			assunto: *

			<br>

			<input type="text" name="assunto" class="field" >

			<br><br>

			

				<div id="bot">

			<input type="submit" value="Enviar" class="submit"><br>

			<div class = "sucesso-form"></div>

				</div>

			</div>



		</form>

</body>

</html>