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
					echo "<li><a href=''><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
				}else{
					echo "<li><a href=''><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";	
				}
				?>
			</ul>
		</div>
	</div>

<div class="container-fluid text-center">
	<div class="row content">
		<div class='col-sm-2 sidenav auto'>
		    <h5>Aside </h5>
		</div>
		<div class="col-sm-8 text-center auto"> 

	<div class="col-sm-2 sidenav auto">
	    
	</div>
</nav>
<footer class="container-fluid text-center">
	<p><strong>Criação de Sites II</strong> 2018</p>
</footer>

</body>
</html>