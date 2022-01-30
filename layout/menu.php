<nav class="navbar navbar-expand-lg navbar-dark menu bg-dark mb-3">
    <a class="navbar-brand" href="./home.php">
        <img src="../img/php_1.png" width="60" height="30" class="d-inline-block align-top" alt="">
        <?php echo "<b>User: " . $_SESSION['sessao']->txt_nome?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cadastros
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php $root = '/MATCH' ?>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/create_alunos.php">Alunos</a>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/create_cursos.php">Cursos</a>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/create_usuarios.php">Usuários</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/matricula.php">Matrícula</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Visualizar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/read_alunos.php">Alunos</a>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/read_cursos.php">Cursos</a>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/read_usuarios.php">Usuários</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ajuda
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/sobre_sistema.php">Sobre o Sistema</a>
                    <a class="dropdown-item" href="<?php echo $root ?>/pages/sobre_desenvolvedor.php">Sobre Desenvolvedor</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $root ?>/pages/sair.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
