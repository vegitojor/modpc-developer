<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Mod PC</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li >
                    <a href="nosotros.php">Así somos</a>
                </li>
                <li >
                    <a href="institucional.php">Institucional</a>
                </li>
                <li >
                    <a href="#" data-toggle="modal" data-target="#contactModal">Contacto</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right " ng-hide="<?= $id ?>">

                <li >
                    <a href="registro-de-usuario.php">registrarse</a>
                </li>
                <li>
                    <a href="login.php">Ingresar</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right " ng-show="<?= $id ?>">
                <li>
                    <a href="carrito.php" data-toggle="tooltip" data-placement="bottom" title="Mis compras"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                </li>
                <li class="dropdown">
                    <a href="" id="usuario" data-toggle="dropdown"><?= $username ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="usuario">
                        <li role="presentation"><a href="../controladores/cerrarSesionController.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.container -->
</nav>