<main role="main" class="flex-shrink-0">
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-4">
                <h2 class="mt-5">Confirmação de Cadastro</h2>
                <?php 
                    if (isset($retorno)) { 
                        $obj = json_decode($retorno);
                        echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . '" role="alert">' . $obj->msg . '</div>';
                    } 
                ?>
                <form method="post" action="<?php echo URL; ?>usuarios/confirma">
                    <div class="form-group">
                        <label for="hash">Código</label>
                        <input name="hash" type="text" class="form-control" id="hash" aria-describedby="hashHelp" placeholder="Código de confirmação">
                        <small id="hashHelp" class="form-text text-muted">Não tem um código? Clique <a href="<?php echo URL; ?>usuarios/senha">aqui</a>.</small>
                    </div>
                    <button id="okhash" name="okhash" type="submit" class="btn btn-dark">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</main>