<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Administrativo</title>
    <link href="<?php echo BASE;?>assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-inverse">
      <div class="container">
        <div id="navbar">
          <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="<?php echo BASE;?>">Home</a></li>
            <li><a href="<?php echo BASE;?>categorias">Categorias</a></li>
            <li><a href="<?php echo BASE;?>produtos">Produtos</a></li>            
            <li><a href="<?php echo BASE;?>vendas">Vendas</a></li>
            <li><a href="<?php echo BASE;?>usuarios">Usuários</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="<?php echo BASE;?>login/sair">Sair</a></li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="container">
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</div>
	<div class="rodape"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo BASE;?>assets/js/bootstrap.min.js"></script>
  </body>
</html>