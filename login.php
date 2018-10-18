<?php ob_start();
if (isset($_GET['erro'])) {
	echo "<p class='alert alert-danger'><strong>ERRO: </strong>O usuário ou senha inválido(s)!</p>";
}
?>
<div class="form">
	<form action="?acao=autenticar" method="post">
		<fieldset><legend>Login</legend>
			<input type="text" name="user" placeholder="Usuário" required/></br>
			<input type="password" name="senha" placeholder="Senha" required /></br>
			</br>
			<input class="btn btn-outline-primary" type="submit" name="enviar" value="Entrar"></br>
			</br>
		</fieldset>
	</form>
</div>
<?php ob_end_flush(); ?>