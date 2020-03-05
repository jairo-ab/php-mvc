<!doctype html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="php-mvc-sqlite-crud">
    <meta name="author" content="Lucas Saliés Brum">
    <title><?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?></title>
    <meta property="og:title" content="<?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://site.com" />
    <meta property="og:image" content="https://site.com/img/logotipo.jpg" />
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/fontawesome-5.11.2.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/principal.css">
    <link rel="shortcut icon" href="<?php echo URL; ?>img/favicon.ico">
</head>
<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="<?php echo URL; ?>" style="padding: 0; margin: 0 10px 0 0;">
                    <img src="<?php echo URL; ?>img/elephpant.svg" width="40" height="40" alt="<?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?>" style="margin: -6px 0 0 0">
                    <?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?>
                </a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar">
                    &#9776;
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>">Início</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>paginas/ajuda">Ajuda</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>paginas/creditos">Créditos</a></li>
                    </ul>
                    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                        <?php if (isset($_SESSION['logado'])) { ?>
                        <li class="nav-item order-2 order-md-1">
                            <a href="<?php echo (isset($_SESSION['role']) && $_SESSION['role'] == "admin") ? URL . 'admin' : URL . 'usuarios/perfil'; ?>" class="nav-link" title="settings">
                                <i class="fa fa-cog fa-fw fa-lg"></i>
                            </a>
                        </li>

                        <li class="dropdown order-1">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Conta
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right mt-2 bg-dark">
                                <li class="px-3 py-2">
                                    <a href="<?php echo URL; ?>usuarios/sair" class="btn btn-primary btn-block">Sair</a>
                                </li>
                            </ul>
                        </li>
                        <?php } else { ?>
                            <li class="dropdown order-1">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Conta
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right mt-2 bg-dark drop-cadastro">
                                    <li class="px-3 py-2">
                                        <form method="post" action="<?php echo URL; ?>usuarios/login" class="form needs-validation" role="form" novalidate>
                                            <div class="form-group">
                                                <input name="apelido" type="text" class="form-control form-control-sm" id="apelido" placeholder="Apelido" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="senha" type="password" class="form-control form-control-sm" id="senha" aria-describedby="senhaHelp" placeholder="Senha" required>
                                            </div>
                                            <div class="form-group">
                                                <button id="logar" name="logar" type="submit" class="btn btn-primary btn-block">Entrar</button>
                                            </div>
                                            <div class="form-group text-center">
                                                <small>
                                                    <a href="<?php echo URL; ?>usuarios/senha">Esqueceu a senha?</a><br />
                                                    <a href="<?php echo URL; ?>usuarios/cadastro">Ainda não tem conta?</a>
                                                </small>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>