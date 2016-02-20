<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fordelone - Admin</title>

    <meta name="description" content="">
    <meta name="author" content="Fordelone Solutions">

    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/admin/css/style.css" />

    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

</head>
<body>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 topo">
                <nav class="navbar navbar-default navbar-inverse menu" role="navigation">
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span><span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img class="logotipo" src="/admin/images/logotipo.png" alt="Fordelone" />
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('products.index') }}">Produtos Cadastrados</a></li>
                                    <li><a href="{{ route('product.new') }}">Cadastrar Novo Produto</a></li>

                                    <li class="divider"></li>

                                    <li><a href="{{ route('categories.index') }}">Categorias Cadastradas</a></li>
                                    <li><a href="{{ route('category.new') }}">Adicionar Nova Categoria</a></li>
                                </ul>
                            </li>

                            <li ><a href={{ route('orders.index') }}>Pedidos</a></li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}<strong class="caret"></strong>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Alterar Senha</a></li>
                                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<section id="conteudo">
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/scripts.js"></script>
<script src="/admin/js/jquery.dataTables.min.js"></script>

</body>
</html>