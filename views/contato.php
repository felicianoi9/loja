<h1>Contato</h1>

<form method="POST" class="contato">
	<?php if(!empty($msg)):?>
		<div class="aviso"><?php echo $msg;?></div> 	
	<?php endif;?>
	Nome:<br/>
	<input type="text" name="nome" require><br/><br/>

	E-mail:<br/>
	<input type="email" name="email" require><br/><br/>

	Mensagem:<br/>
	<textarea name="mensagem" require></textarea><br/><br/>
	
	<input type="submit" value="Enviar" class="botao" require><br/>
	
</form>

<div style="clear:both"></div>