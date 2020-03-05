<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Usuários</h1>
        <?php 
            if (isset($msg)) { 
                $obj = json_decode($msg);
                echo '<div class="alert alert-dismissible fade show ' . $obj->tipo . '" role="alert">' . $obj->msg . '</div>';
            } 
        ?>
        <?php if (isset($retorno)) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>E-Mail</th>
                        <th>Role</th>
                        <th>Acesso</th>
                        <th>Cadastro</th>
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
                        <td><?php if (isset($usuario->acesso)) { echo $usuario->acesso; } ?></td>
                        <td><?php if (isset($usuario->cadastro)) { echo $usuario->cadastro; } ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
        Nenhum usuário.
        <?php } ?>
    </div>
</main>