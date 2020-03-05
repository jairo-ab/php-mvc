<main role="main" class="flex-shrink-0">
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <h1 class="mt-5">Re-envio de Senha</h1>
                <?php 
                    if (isset($retorno)) { 
                        $obj = json_decode($retorno);
                        echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . '" role="alert">' . $obj->msg . '</div>';
                    } 
                ?>
                <form method="post" action="<?php echo URL; ?>usuarios/senha">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="recoverHelp" placeholder="E-mail">
                        <small id="recoverHelp" class="form-text text-muted">Já tem um código? Clique <a href="<?php echo URL; ?>usuarios/confirma">aqui</a>.</small>
                    </div>
                    <button id="senha" name="senha" type="submit" class="btn btn-dark">Enviar Código</button>
                </form>
            </div>
        </div>
    </div>
</main>