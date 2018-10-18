<?php ob_start();
$mysql=new mysqli("localhost","id5864382_jaimearaujo","senhasitebd","id5864382_news");

if (!mysqli_connect_error()) {
	$sql="SELECT * FROM noticia WHERE id_noticia=".$_GET['noticiaid'];
	$resultado=$mysql->query($sql);
	$noticia=$resultado->fetch_array();

	echo "<div class='col-sm-8 text-left'>";
		echo "
		<div class='conteiner-fluid '>
			<h4><a href='?acao=noticia&noticiaid=".$noticia['id_noticia']."'>".$noticia['nome']."</a></h4></br>
			<h5>".$noticia['resumo']."</h5>
			<hr></hr>
			<div>
				<p>".$noticia['conteudo']."</p>
			</div>
		</div>
	 	";
	echo "</div>";
}
ob_end_flush();
?>