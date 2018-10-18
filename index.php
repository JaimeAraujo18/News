<?php ob_start();
session_start(); ?>
<html lang="pt-br">
<head>
	<title>News</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="../">News</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="../">Home</a></li>
				<li><a href="../?acao=contato">Contato</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
				if (isset($_SESSION['user'])) {
					echo "<li><a href='../?acao=nova_noticia'>Nova</a></li>";
					echo "<li id='logout'><a href='?acao=logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
				}else{
					echo "<li id='login'><a href='../?acao=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";	
				}
				?>
			</ul>
		</div>
	</div>
</nav>
	
<div class="container-fluid text-center">
	<div class="row content">
		<div class='col-sm-2 sidenav auto'>
		<?php
		if (isset($_GET['acao'])) {
			}else{
				echo "
					<h5>Ordem das noticias: </h5>
					<p><a href='../?order=desc'>Recentes primeiro</a></p>
					<p><a href='../?order=asc'>Antigas primeiro</a></p>";
			}?>
			</div>
		<div class="col-sm-8 text-center auto"> 
			<?php
			$listar=0;
			if (isset($_GET['acao'])) {
				 switch ($_GET['acao']) {
						case 'login':
							include_once "login.php";
							$listar++;
						 break;
						case 'contato':
							include_once "contato.php";
							$listar++;
							break;
						case 'autenticar':
							$mysql=new mysqli("localhost","id5864382_jaimearaujo","senhasitebd","id5864382_news");
							if(!isset($_POST['user'])){
								echo "Usuário deve ser fornecido!";
							}
							if (!isset($_POST['senha'])){
								echo "Senha deve ser fornecida!";
							}
							if (!mysqli_connect_error()){
								$sql="SELECT * FROM usuario WHERE user='".$_POST['user']."'AND senha='".md5($_POST["senha"])."'";
								$resultado=$mysql->query($sql);
								if($resultado->num_rows>0){
									$user=$resultado->fetch_array();
									$_SESSION["user"]["nome"]=$user["nome"];
									$_SESSION["user"]["username"]=$user["user"];
									$_SESSION["user"]["status"]="logado";
									header("Location: ../?acao=sucesso");
								}else{ 
									header("Location: ../?acao=login&erro=1");
								}
							}else{
								echo "Erro com o banco!";
							}
							$listar++;
							break;
						case 'novo':
							include_once "form_noticia.php";
							$listar++;
							break;
						case 'sucesso':
							echo "<p class='alert alert-success'>Login efetuado com sucesso!</p>";
							header("refresh: 3, url=../");
							$listar++;
							break;
						case 'enviar':
							include_once 'mail.php';
							$listar++;
							break;
						case 'enviado':
							echo "<p class='alert alert-success'>Email enviado com sucesso!</p>";
							header("refresh: 3, url=../");
							$listar++;
							break;
						case 'logout':
							session_destroy();
							echo "<p class='alert alert-success'>Logout efetuado com sucesso!</p>";
							header("refresh: 3, url=../");
							$listar++;
							break;
						case 'noticia':
							include_once 'noticia.php';
							$listar++;
							break;
						case 'tobanco':
							$mysql=new mysqli("localhost","id5864382_jaimearaujo","senhasitebd","id5864382_news");
							if (!mysqli_connect_error()){
								$sql="INSERT INTO noticia (nome,resumo,conteudo) VALUES ('".$_POST['noticianome']."','".$_POST['resumo']."','".$_POST['conteudo']."')";
								$mysql->query($sql);
								header("location: ../?acao=criada");
								}else{ 
										echo "Erro com o banco!";
									}
							$listar++;
							break;
						case 'criada':
							echo "<p class='alert alert-success'>Noticia criada com sucesso!</p>";
							header("refresh: 3, url= ../");
							$listar++;
							break;
						case 'nova_noticia':
							include_once 'form_noticia.php';
							$listar++;
							break;
						default:
							echo "<div class='container-fluid text-center'>";
				 			include_once 'listar_noticia.php';
				 			echo "</div>";
				 			$listar++;
							break;
				 }
			}
			if ($listar==0) {
					echo "<div class='container-fluid text-center'>";
				 	include_once 'listar_noticia.php';
				 	echo "</div>";
				 }
		?>
		</div>
		<div class="col-sm-2 sidenav auto">
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
	<p><strong>Criação de Sites II</strong> 2018</p>
</footer>

</body>
</html>
<?php ob_end_flush(); ?>