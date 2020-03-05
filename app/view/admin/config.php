<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Configuração</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo URL; ?>admin">Admin</a></li>
                    <li class="breadcrumb-item active">Config</li>
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
                        <h4 class="card-title">Configuração do sistema</h4>
                        <!-- <p class="card-category">Instale o sistema de PHP - MVC</p> -->
                    </div>
                    <div class="card-body">
                        <?php if (isset($retorno)) { ?>
                            <div class="alert alert-info">
                                <span><?php echo $retorno; ?></span>
                            </div>
                        <?php } ?>
                        <form method="post" action="<?php echo URL; ?>admin/config">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nome do Site</label>
                                        <input name="site" type="text" class="form-control" id="site" value="<?php if (isset($this->cfg['site'])) { echo $this->cfg['site']; } else { echo 'PHP MVC'; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Endereço do Site</label>
                                        <input name="host" type="text" class="form-control" id="site" value="<?php if (isset($this->cfg['host'])) { echo $this->cfg['host']; } else { echo 'http://localhost'; } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nome completo</label>
                                        <input name="nome" type="text" class="form-control" id="nome" value="<?php if (isset($this->cfg['nome'])) { echo $this->cfg['nome']; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Usuário</label>
                                        <input name="usuario" type="text" class="form-control" id="usuario" value="<?php if (isset($this->cfg['usuario'])) { echo $this->cfg['usuario']; } else { echo 'admin'; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Senha</label>
                                        <input name="senha" type="password" class="form-control" id="senha" value="<?php if (isset($this->cfg['senha'])) { echo $this->cfg['senha']; } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">E-mail</label>
                                        <input name="email" type="email" class="form-control" id="email" value="<?php if (isset($this->cfg['email'])) { echo $this->cfg['email']; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Servidor de e-mail</label>
                                        <input name="email_host" type="text" class="form-control" id="emailHost" value="<?php if (isset($this->cfg['email_host'])) { echo $this->cfg['email_host']; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Senha do e-mail</label>
                                        <input name="email_senha" type="password" class="form-control" id="emailSenha"  value="<?php if (isset($this->cfg['email_senha'])) { echo $this->cfg['email_senha']; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Porta de saída de e-mail</label>
                                        <input name="email_porta" type="text" class="form-control" id="emailPorta" value="<?php if (isset($this->cfg['email_porta'])) { echo $this->cfg['email_porta']; } ?>">
                                    </div>
                                </div>
                            </div>
                            <button name="instalar" type="submit" class="btn btn-success pull-right">Atualizar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
