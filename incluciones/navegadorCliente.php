<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 9/12/17
 * Time: 1:06
 */

echo ('<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Mod PC</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="#">About</a>
                    </li>
                    <li >
                        <a href="#">Services</a>
                    </li>
                    <li >
                        <a href="#">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right " ng-hide="<?= $id ?>">
                    
                    <li >
                        <a href="vistas/registro-de-usuario.php">registrarse</a>
                    </li>
                    <li>
                        <a href="vistas/login.php">Ingresar</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right " ng-show="<?= $id ?>">
                    <li>
                        <a href="controladores/cerrarSesionController.php">Salir</a>
                    </li>
                    <li>
                        <a href=""><?= $username ?></a>
</li>
</ul>
</div>
</div>
<!-- /.container -->
</nav>');