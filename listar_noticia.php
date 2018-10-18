<?php ob_start();
$mysql=new mysqli("localhost","id5864382_jaimearaujo","senhasitebd","id5864382_news");

if(!mysqli_connect_error()){
	if (!isset($_GET['order'])) {
		$_GET['order']="desc";
	}
	if ($_GET["order"]=="desc") {
		$sql="SELECT * FROM noticia ORDER BY id_noticia DESC";
	}else{
		$sql="SELECT * FROM noticia ORDER BY id_noticia ASC";
	}
	$resultado=$mysql->query($sql);

	echo "<div class='col-sm-12 text-left'>";
	while($noticia=$resultado->fetch_array()){
		echo "
		<div class='conteiner-fluid '>
			<h4><a href='?acao=noticia&noticiaid=".$noticia['id_noticia']."'>".$noticia['nome']."</a></h4></br>
			<h5>".$noticia['resumo']."</h5>
			<hr></hr>
		</div>
	 	";
	}
	echo "</div>";
}
ob_end_flush();
?>