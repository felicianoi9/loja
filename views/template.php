<html>
    <head>
        <meta charset="UTF-8">
        <title>Loja Virtual 1.0</title>
        <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/template.css" />
    </head>
    <body>
    	<div class="topo">
            <div  class="logo"><img height="100" src="<?php echo BASE; ?>assets/images/logo.png"></div>
            <a href="<?php echo BASE; ?>carrinho">
                <div class="topo carrinho">
                    Carrinho:<br/>
                    
                    <?php echo (isset($_SESSION['carrinho']))?count($_SESSION['carrinho']):'0';?> itens
                </div>
    		</a>
    	</div>

    	<div class="menu">
    		<div class="menuint">
                <strong>
	    		<ul>
	    			<a href="<?php echo BASE; ?>"><li>Home</li></a>
	    			<?php foreach($menu as $menuitem):?>
	    				<a href="<?php echo BASE; ?>categoria/ver/<?php echo $menuitem['id'];?>"><li><?php echo utf8_encode($menuitem['titulo']); ?></li></a>
	    			<?php endforeach;?>	
	    			<a href="<?php echo BASE; ?>empresa"><li>Empresa</li></a>
	    			<a href="<?php echo BASE; ?>contato"><li>Contato</li></a>
                    <a href="<?php echo BASE; ?>pedidos"><li>Pedidos</li></a>
	    		</ul>
                </strong>
                
                
    		</div>
    	</div>

    	<div class="container">
    		 <?php  $this->loadViewInTemplate($viewName, $viewData);?>
    	</div>

    	<div class="rodape">
    		
    	</div>
        
    </body>
</html>
