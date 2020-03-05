<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Usuários</h1>
        <div class="row m-0">
            <?php var_dump($retorno); ?>
            <?php if (isset($retorno) && !empty($retorno)) { ?>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>E-mail</th>
                            <th>Cargo</th>
                            <th>Acesso</th>
                            <th>Cadastro</th>
                            <th>Validado</th>
                            <?php if (isset($_SESSION["logado"]) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                                <th>Editar</th>
                                <th>Apagar</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($retorno as $usuario) { ?>
                        <tr>
                            <td><?php if (isset($usuario->id)) { echo $usuario->id; } ?></td>
                            <td><?php if (isset($usuario->nome)) { echo $usuario->nome; } ?></td>
                            <td><?php if (isset($usuario->apelido)) { echo $usuario->apelido; } ?></td>
                            <td><?php if (isset($usuario->email)) { echo $usuario->email; } ?></td>
                            <td><?php if (isset($usuario->role)) { echo $usuario->role; } ?></td>
                            <td class="timestamp"><?php if (isset($usuario->acesso)) { echo $usuario->acesso; } ?></td>
                            <td class="timestamp"><?php if (isset($usuario->cadastro)) { echo $usuario->cadastro; } ?></td>
                            <td><?php if (isset($usuario->validado) && $usuario->validado == true) { echo '<i class="fas fa-check"></i>'; } else { echo '<i class="fas fa-times"></i>'; } ?></td>
                            <?php if (isset($_SESSION["logado"]) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                                <td><a href="<?php echo URL . 'usuarios/editar/' . htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?>">editar</a></td>
                                <td><a href="<?php echo URL . 'usuarios/apagar/' . htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?>">apagar</a></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } else { ?>
                Nenhum usuário.
            <?php } ?>   
        </div>
    </div>
</main>