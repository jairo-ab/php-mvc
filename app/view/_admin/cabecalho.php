<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?php if (isset($this->cfg['site'])) { echo $this->cfg['site'] . ' - Admin'; } else { echo 'PHP MVC - Admin'; } ?></title>
    
    <link rel="stylesheet" href="<?php echo URL; ?>css/fontawesome-5.11.2.min.css?v=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="<?php echo URL; ?>css/spur.min.css?v=<?php echo uniqid(); ?>">
    <link rel="stylesheet" href="<?php echo URL; ?>css/painel.css?v=<?php echo uniqid(); ?>">

    <link rel="shortcut icon" href="<?php echo URL; ?>img/favicon.ico">
</head>
<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="<?php echo URL; ?>admin" class="spur-logo">
                    <i class="fas fa-bolt"></i> 
                    <span class="truncate"><?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?></span>
                </a>
            </header>
            <nav class="dash-nav-list">
                <a href="<?php echo URL; ?>admin" class="dash-nav-item"><i class="fas fa-home"></i> Painel </a>
                <a href="<?php echo URL; ?>admin/config" class="dash-nav-item"><i class="fas fa-tools"></i> Config </a>
                <a href="<?php echo URL; ?>usuarios" class="dash-nav-item"><i class="fas fa-user"></i>Usuários</a>
                <a href="<?php echo URL; ?>posts" class="dash-nav-item"><i class="fas fa-newspaper"></i>Posts</a>
                <a href="<?php echo URL; ?>paginas/sobre" class="dash-nav-item"><i class="fas fa-info-circle"></i>Sobre</a>
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="digite para pesquisar">
                </form>
                <div class="tools">
                    <a href="<?php echo URL; ?>" class="tools-item">
                        <i class="fas fa-globe"></i>
                    </a>
                    <a href="https://github.com/sistematico/php-mvc" target="_blank" class="tools-item">
                        <i class="fab fa-github"></i>
                    </a>
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="<?php echo URL; ?>usuarios/perfil">Perfil</a>
                            <a class="dropdown-item" href="<?php echo URL; ?>usuarios/sair">Sair</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">