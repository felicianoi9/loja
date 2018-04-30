<h1>Login</h1>

<form method="POST">

	<?php if($erro !='') :?>
		<div class="erro"><?php echo $erro; ?></div>

	<?php endif ;?>

	E-Mail:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<input  type="submit" class="botao" value="Logar" />


</form>