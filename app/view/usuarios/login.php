<main role="main" class="flex-shrink-0">
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <h1 class="mt-5">Login</h1>
                <?php 
                    if (isset($retorno)) { 
                        $obj = json_decode($retorno);
                        echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . '" role="alert">' . $obj->msg . '</div>';
                    } 
                ?>
                <form method="post" action="<?php echo URL; ?>usuarios/login" class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label for="apelido" class="col-sm-2 col-form-label">Apelido</label>
                            <div class="col-sm-10">
                                <input name="apelido" type="text" class="form-control" id="apelido" placeholder="Apelido" required>
                                <div class="invalid-feedback">Por favor, escolha um apelido.</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                            <div class="col-sm-10">
								<input name="senha" type="password" class="form-control" id="senha" aria-describedby="senhaHelp" placeholder="Senha" required>
								<small id="senhaHelp" class="form-text text-muted">Esqueceu sua senha? Clique <a href="<?php echo URL; ?>usuarios/senha">aqui.</a></small>
                                <div class="invalid-feedback">Por favor, escolha uma senha.</div>
                            </div>
                        </div>
                        <button id="logar" name="logar" type="submit" class="btn btn-dark">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</main>