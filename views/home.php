<?php foreach($produtos as $p):?>
	<a href="<?php echo BASE;?>produto/ver/<?php echo $p['id'];?>">
		<div class = "produto">
			<img border="0" width="180" height="180" src="<?php echo BASE;?>assets/images/produtos/<?php echo $p['imagem'];?>">
			<strong><?php echo utf8_encode($p['nome']); ?></strong><br/>
			<?php echo "R$ ".$p['preco']; ?>

		</div>
	</a>
<?php endforeach;?>	
<div style="clear:both"></div>