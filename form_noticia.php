<?php ob_start(); ?>
<div class="form form-check">
	<form action="./?acao=tobanco" method="post">
		<fieldset><legend>Criar notícia</legend>
			<input type="text" name="noticianome" placeholder="Título" required /></br></br>
			<textarea type="text" placeholder="Resumo" name="resumo" cols="30" rows="3" required></textarea></br></br>
			<textarea type="text" placeholder="Conteúdo" name="conteudo" cols="30" rows="5" required></textarea></br></br>
			<input class="btn btn-outline-primary" type="submit" name="salvar" value="Salvar"></br></br></br>
		</fieldset>
	</form>
</div>
<?php ob_end_flush(); ?>