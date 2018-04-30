<div class="produto_foto">
	<img src="<?php echo BASE;?>assets/images/produtos/<?php echo $produto['imagem'];?>" border="0" widht="300" height="300" />

</div>
<div class="produto_info">
	<h2><?php echo utf8_encode($produto['nome']);?></h2>
	<?php echo utf8_encode($produto['descricao']);?>
	<h3><?php echo utf8_encode("R$ ".$produto['preco']);?></h3>
	<a href="<?php echo BASE;?>carrinho/add/<?php echo $produto['id']; ?>">Adicionar ao Carrinho</a>
</div>
<div style="clear:both"></div>