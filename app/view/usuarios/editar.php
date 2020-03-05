<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-8 col-md-8 col-lg-6 col-xl-4">
                <h1 class="mt-5">Editar</h1>
                <?php 
                    if (isset($retorno)) { 
                        $obj = json_decode($retorno);
                        echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . '" role="alert">' . $obj->msg . '</div>';
                    } 
                ?>
                <form method="post" action="<?php echo URL; ?>usuarios/editar">

                    <div class="form-group row">
                        <div class="col-2 pl-0">
                            <label for="id">ID</label>
                            <input id="id" name="id" class="form-control" type="text" placeholder="<?php if (isset($usuario->id)) { echo $usuario->id; } ?>" value="<?php if (isset($usuario->id)) { echo $usuario->id; } ?>" readonly>
                        </div>

                        <div class="col-5">
                            <label for="role">Cargo</label>
                            <select class="form-control" id="role" name="role">
                                <?php if (isset($usuario->role) && $usuario->role == 'admin') { ?>
                                    <option value="admin">Admin</option>
                                <?php } ?>
                                <option value="usuario">Usuário</option>
                            </select>
                        </div>
                        <div class="col-5 pr-0">
                            <label for="role">Validado</label>
                            <select class="form-control" id="validado" name="validado">
                                <?php if (isset($usuario->validado) && $usuario->validado == true) { ?>
                                    <option value="sim" selected>SIM</option>
                                    <option value="nao">NÃO</option>
                                <?php } else { ?>
                                    <option value="sim">SIM</option>
                                    <option value="nao" selected>NÃO</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" value="<?php if (isset($usuario->nome)) { echo $usuario->nome; } ?>">
                    </div>

                    <div class="form-group row">
                        <label for="apelido">Apelido</label>
                        <input name="apelido" type="text" class="form-control" id="apelido" placeholder="Apelido" value="<?php if (isset($usuario->apelido)) { echo $usuario->apelido; } ?>">
                    </div>

                    <div class="form-group row">
                        <label for="senha">Senha</label>
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" value="">
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail">E-mail</label>
                        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-mail" value="<?php if (isset($usuario->email)) { echo $usuario->email; } ?>">
                    </div>

                    <div class="form-group row">
                        <button name="editar" type="submit" class="btn btn-dark">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>