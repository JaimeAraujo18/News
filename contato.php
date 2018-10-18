<?php ob_start(); ?>
<div class="form">
	<form action="./?acao=enviado" method="post">
		<fieldset><legend>Contato</legend>
			<input type="text" name="assunto" placeholder="Assunto" required/></br></br>
			<textarea type="text" placeholder="Mensagem" name="msg" cols="30" rows="5" required></textarea></br>
			</br>
			<input class="btn btn-outline-primary" type="submit" name="enviar" value="Enviar"></br>
			</br>
		</fieldset>
	</form>
</div>
<?php ob_end_flush(); ?>