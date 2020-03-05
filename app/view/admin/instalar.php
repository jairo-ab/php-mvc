<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Instalar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo URL; ?>admin">Admin</a></li>
                    <li class="breadcrumb-item active">Instalar</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Instalação do sistema</h4>
                        <!-- <p class="card-category">Instale o sistema de PHP - MVC</p> -->
                    </div>
                    <div class="card-body">
                        <?php if (isset($retorno)) { ?>
                            <div class="alert alert-info">
                                <span><?php echo $retorno; ?></span>
                            </div>
                        <?php } ?>
                        <form class="needs-validation" method="post" action="<?php echo URL; ?>admin/instalar" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nome do site</label>
                                        <input name="site" type="text" class="form-control" id="site" placeholder="Ex.: Portal de Notícias" value="PHP MVC" required>
                                        <div class="invalid-feedback">
                                            Insira um nome para o site.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Endereço do site</label>
                                        <input name="host" type="text" class="form-control" id="endsite" placeholder="Ex.: https://www.noticias.com.br" value="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']; ?>" required>
                                        <div class="invalid-feedback">
                                            Insira uma URL para o site.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nome completo</label>
                                        <input name="nome" type="text" class="form-control" id="nome" placeholder="Ex.: João da Silva" required>
                                        <div class="invalid-feedback">
                                            Insira seu nome.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Usuário</label>
                                        <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Ex.: admin" value="admin" required>
                                        <div class="invalid-feedback">
                                            Insira seu nome de usuário.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Senha</label>
                                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Ex.: senha-muito-dificil" required>
                                        <div class="invalid-feedback">
                                            Insira uma senha.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">E-mail</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Ex.: noticias@noticias.com.br" value="<?php echo "admin@" . $_SERVER['SERVER_NAME']; ?>" required>
                                        <div class="invalid-feedback">
                                            Insira um e-mail válido.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Senha do e-mail</label>
                                        <input name="email_senha" type="password" class="form-control" id="emailSenha" placeholder="Ex.: senha-muito-mais-dificil" required>
                                        <div class="invalid-feedback">
                                            Insira a senha do seu e-mail.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Servidor de e-mail</label>
                                        <input name="email_host" type="text" class="form-control" id="emailhost" placeholder="Ex.: mail.noticias.com.br" value="<?php echo "mail." . $_SERVER['SERVER_NAME']; ?>" required>
                                        <div class="invalid-feedback">
                                            Insira o servidor de e-mails.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Porta do e-mail</label>
                                        <input name="email_porta" type="text" class="form-control" id="emailPorta" placeholder="Ex.: 587" value="587">
                                    </div>
                                </div>
                            </div>
                            <button name="instalar" type="reset" class="btn btn-danger pull-right">Limpar</button>
                            <button name="instalar" type="submit" class="btn btn-primary pull-right">Instalar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
