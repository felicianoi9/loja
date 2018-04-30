<h1>Carrinho de compras</h1>
<table width="100%">
	<tr>
		<th align="left">Imagem</th>
		<th align="left">Nome do Produto</th>
		<th align="left">Preço</th>
		<th align="left">Ações</th>
		<th align="left"><a href="<?php echo BASE;?>carrinho/finalizar">Finalizar Compra</a></th>
	</tr>
	<?php $subtotal = 0;?>
	<?php foreach($produtos as $produto):?>
	<tr>
		<td><img src="<?php echo BASE;?>assets/images/produtos/<?php echo $produto['imagem']?>" border="0" width="60"></td>
		<td><?php echo $produto['nome'];?></td>
		<td><?php echo "R$ ".$produto['preco'];?></td>
		<td>
			<a href="<?php echo BASE;?>carrinho/del/<?php echo $produto['id'] ;?>">Remover</a>
		</td>
	</tr>
	<?php $subtotal += $produto['preco'];  ?>
	<?php endforeach; ?>
	<tr>
		<td></td>
		<td align="right">Sub-Total:</td>
		<td align="left" ><?php echo "<strong>R$ ".$subtotal."</strong>";  ?></td>
		<td align="left" >
			

		</td>
		
	</tr>
</table>